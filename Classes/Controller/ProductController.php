<?php
namespace Webschuppen\WsProducts\Controller;


/***************************************************************
 *
 *  Copyright notice
 *
 *  (c) 2015 Daniel Klessa <danielk@webschuppen.com>, webschuppen GmbH
 *           Martin Hollmann <martin@webschuppen.com>, webschuppen GmbH
 *
 *  All rights reserved
 *
 *  This script is part of the TYPO3 project. The TYPO3 project is
 *  free software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation; either version 3 of the License, or
 *  (at your option) any later version.
 *
 *  The GNU General Public License can be found at
 *  http://www.gnu.org/copyleft/gpl.html.
 *
 *  This script is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU General Public License for more details.
 *
 *  This copyright notice MUST APPEAR in all copies of the script!
 ***************************************************************/

/**
 * ProductController
 */
class ProductController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController {

	/**
	 * productRepository
	 * 
	 * @var \Webschuppen\WsProducts\Domain\Repository\ProductRepository
	 * @inject
	 */
	protected $productRepository = NULL;

	/**
	 * categoryRepository
	 *
	 * @var \Webschuppen\WsProducts\Domain\Repository\CategoryRepository
	 * @inject
	 */
	protected $categoryRepository = NULL;

	/**
	 * applicationRepository
	 *
	 * @var \Webschuppen\WsProducts\Domain\Repository\ApplicationRepository
	 * @inject
	 */
	protected $applicationRepository = NULL;

	/**
	 * action list
	 * 
	 * @return void
	 */
	public function listAction() {
        //store list page to session
        $GLOBALS['TSFE']->fe_user->setKey('ses', 'tx_wsproductsProductListPage' , $GLOBALS['TSFE']->id);
        $GLOBALS['TSFE']->fe_user->storeSessionData();

        // set query defaults on product
        $productQuerySettings = $this->productRepository->createQuery()->getQuerySettings();
        $productQuerySettings->setRespectStoragePage(false);
        $this->productRepository->setDefaultQuerySettings($productQuerySettings);

        // set query defaults on category
        $categoryQuerySettings = $this->categoryRepository->createQuery()->getQuerySettings();
        $categoryQuerySettings->setStoragePageIds(array($this->settings['storagepage']));
        $this->categoryRepository->setDefaultQuerySettings($categoryQuerySettings);

        // get categories and check backend only categories
        $backendOnlyCategories = $this->categoryRepository->findByBackendOnly(TRUE);
        if(is_null($backendOnlyCategories)) {
            $backendOnlyCategories = array();
        }
        $selectedCat = $this->categoryRepository->findByUid($this->settings['category']);

        if(empty($selectedCat)) {
            $selectedCat = false;
        }

        // get all products from Repository
        $this->productRepository->setDefaultOrderings(array('sorting' => \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_ASCENDING));
        $products = $this->productRepository->findAllFrontend($backendOnlyCategories, $selectedCat);

        //DEBUG
        //\TYPO3\CMS\Extbase\Utility\DebuggerUtility::var_dump($this->settings);
        //\TYPO3\CMS\Extbase\Utility\DebuggerUtility::var_dump($this->settings['category']);
        if(!is_null($products)) {
            $filterArray = $this->productRepository->findAllFilter($products, $selectedCat);

            $showFilter = true;
            if ($selectedCat->getNoFilter()) {
                $showFilter = false;
            }
        }

        // assign vars to view
        $this->view->assign('selectedCategory', $this->settings['category']);
        $this->view->assign('showFilter', $showFilter);
        $this->view->assign('filterArray', $filterArray);
        $this->view->assign('filterArrayJson', json_encode($filterArray));
		$this->view->assign('products', $products);
        $this->view->assign('pid', $this->configurationManager->getContentObject()->data['pid']);
	}

	/**
	 * action show
	 * 
	 * @param \Webschuppen\WsProducts\Domain\Model\Product $product
	 * @return void
	 */
	public function showAction(\Webschuppen\WsProducts\Domain\Model\Product $product) {
        // get product detail with application specific text, if no application use default
        if($this->request->hasArgument('application')) {
            $this->view->assign('applicationDescription', $this->productRepository->getSelectedAppDescriptionUrl($product, $this->request->getArgument('application')));
            $GLOBALS['TSFE']->page['title'] = str_replace(array('<br />', '<br/>'), '', $product->getProductName()) . ' (' . $this->applicationRepository->findByUid($this->request->getArgument('application'))->getApplicationName() . ') - ' . $GLOBALS['TSFE']->page['title'] . ' » Rühle';
            $GLOBALS['TSFE']->indexedDocTitle = $GLOBALS['TSFE']->page['title'];
            //\TYPO3\CMS\Extbase\Utility\DebuggerUtility::var_dump($GLOBALS['TSFE']->page['title']);
        } else {
            $this->view->assign('applicationDescription', $this->productRepository->getSelectedAppDescription($product));
            $GLOBALS['TSFE']->page['title'] = str_replace(array('<br />', '<br/>'), '', $product->getProductName()) . ' - ' . $GLOBALS['TSFE']->page['title'] . ' » Rühle';
            $GLOBALS['TSFE']->indexedDocTitle = $GLOBALS['TSFE']->page['title'];
        }

        // assign vars to view
		$this->view->assign('product', $product);
        $this->view->assign('productListPage', $GLOBALS['TSFE']->fe_user->getKey('ses', 'tx_wsproductsProductListPage'));
    }

    /**
     * action ajaxcompare
     *
     * @param \Webschuppen\WsProducts\Domain\Model\Product $product
     * @return void
     */
    public function ajaxcompareAction(\Webschuppen\WsProducts\Domain\Model\Product $product) {
        // get product for compare tool
        $this->view->assign('product', json_encode($this->productRepository->getAjaxProductArray($product)));
    }

    /**
     * action ajaxlink
     *
     * @param \Webschuppen\WsProducts\Domain\Model\Product $product
     * @return void
     */
    public function ajaxlinkAction(\Webschuppen\WsProducts\Domain\Model\Product $product, \Webschuppen\WsProducts\Domain\Model\Application $application) {
        // create new link for product using application settings
        $this->view->assign('product', $product);
        $this->view->assign('application', $application);
    }


    /**
     * action compare
     *
     * @return void
     */
    public function compareAction()
    {
        $compareItemsDataArr = array();
        $tempAttributesArray = array();
        $tempTechnicalDataArray = array();
        $tempAccessoryArray = array();

        // get products from compare cookie
        $compareCookieArr = json_decode($_COOKIE['compare'], true);

        // create tables for view
        $xMax = count($compareCookieArr);
        for ($x = 0; $x < $xMax; $x++) {
            $compareItemsDataArr[$x] = $this->productRepository->findByUid($compareCookieArr[$x]);
            foreach ($compareItemsDataArr[$x]->getAttribute() as $attributeId => $attributeData) {
                if (!array_key_exists($attributeData->getAttributeName(), $tempAttributesArray)) {
                    $tempAttributesArray[$attributeData->getAttributeName()] = $attributeData->getSorting();
                }
            }

            foreach($compareItemsDataArr[$x]->getTechnicalData() as $technicalData => $technicalDataData) {
                if(!array_key_exists($technicalDataData->getTechnicalDataName()->getTechnicalDataName, $tempTechnicalDataArray) && $technicalDataData->getTechnicalDataName()->getOnlyBackend() !== true) {
                    $tempTechnicalDataArray[$technicalDataData->getTechnicalDataName()->getTechnicalDataName()] = $technicalDataData->getTechnicalDataName()->getSorting();
                }
            }

            foreach($compareItemsDataArr[$x]->getAccessory() as $accessory => $accessoryData) {
                if(!array_key_exists($accessoryData->getProductName(), $tempAccessoryArray)) {
                    $tempAccessoryArray[$accessoryData->getProductName()] = $accessoryData->getSorting();
                }
            }
        }

        // sort products
        asort($tempAttributesArray);
        asort($tempTechnicalDataArray);
        asort($tempAccessoryArray);

        for($x=0; $x<$xMax; $x++) {
            $compareItemsDataArr[$x] = $this->productRepository->getProductCompareItems($compareCookieArr[$x], $tempAttributesArray, $tempTechnicalDataArray, $tempAccessoryArray);
        }

        // assign vars to view
        $this->view->assign('attributes', $tempAttributesArray);
        $this->view->assign('technicalData', $tempTechnicalDataArray);
        $this->view->assign('accessory', $tempAccessoryArray);
        $this->view->assign('compareItemsDataArr', $compareItemsDataArr);
    }

}