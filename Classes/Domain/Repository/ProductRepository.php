<?php
namespace Webschuppen\WsProducts\Domain\Repository;


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
use Webschuppen\WsProducts\Domain\Model\Category;
use Webschuppen\WsProducts\Domain\Model\Product;
use Webschuppen\WsProducts\Domain\Model\TechnicalData;
use Webschuppen\WsProducts\Domain\Model\TechnicalDataValue;

/**
 * The repository for Products
 */


class ProductRepository extends \TYPO3\CMS\Extbase\Persistence\Repository {

    /**
     * @param \TYPO3\CMS\Extbase\Persistence\QueryResultInterface $backenOnlyCategories
     * @return array|\TYPO3\CMS\Extbase\Persistence\QueryResultInterface
     */
    public function findAllFrontend(\TYPO3\CMS\Extbase\Persistence\QueryResultInterface $backenOnlyCategories, $isCategory = false) {
        $constraints = array();
        $query = $this->createQuery();

        $query->setQuerySettings($query->getQuerySettings()->setStoragePageIds(array($GLOBALS['TSFE']->id)));

        /** @var Category $Category */
        foreach ($backenOnlyCategories as $Category) {
            $constraints[] = $query->logicalNot($query->contains('category', $Category));
        }

        if($isCategory !== false) {
            $constraints[] = $query->logicalAnd($query->contains('category', $isCategory));
        }

        if(count($constraints) > 0) {
            $query->matching($query->logicalAnd($constraints));
        }

        return $query->execute();
    }

    /**
     * @param $products
     * @param Category|boolean $category
     * @return array| json Array for Frontend
     */
    public function findAllFilter($products, $category = false) {
        //\TYPO3\CMS\Extbase\Utility\DebuggerUtility::var_dump('here');
        $applicationsArray = array();
        $returnArray = array();
        $technicalFilters = array();

        /** @var Product $product */
        foreach($products as $product) {
            /** @var TechnicalDataValue $technicalData */
            foreach($product->getTechnicalData() as $technicalData) {
                if($technicalData->getTechnicalDataName()->getIsFilter() && !in_array($technicalData->getTechnicalDataName()->getTechnicalDataName(), $technicalFilters)) {
                    $technicalFilters[] = $technicalData->getTechnicalDataName()->getTechnicalDataName();
                }
            }
        }

        if(count($technicalFilters) <= 1) {

            /** @var Product $product */
            foreach ($products as $product) {
                /** @var TechnicalDataValue $technicalData */
                foreach ($product->getTechnicalData() as $technicalData) {
                    //\TYPO3\CMS\Extbase\Utility\DebuggerUtility::var_dump($technicalData);
                    if ($technicalData->getTechnicalDataName()->getIsFilter() && ($category && $product->getCategory($category))) {
                        $appUid = $technicalData->getTechnicalDataName()->getApplication()->getUid();
                        $techValue = $technicalData->getTechnicalDataValueValue();
                        if (!array_key_exists($appUid, $applicationsArray)) {
                            $applicationsArray['filtertext'] = $technicalData->getTechnicalDataName()->getTechnicalDataName();
                            $applicationsArray[$appUid] = array();
                            $applicationsArray[$appUid]['data'] = array();
                            $applicationsArray[$appUid]['data']['name'] = $technicalData->getTechnicalDataName()->getApplication()->getApplicationName();
                            $applicationsArray[$appUid]['data']['icon'] = $technicalData->getTechnicalDataName()->getApplication()->getApplicationIcon()->getOriginalResource()->getPublicUrl();
                            $applicationsArray[$appUid]['data']['uid'] = $appUid;
                            $applicationsArray[$appUid]['data']['filtertext'] = $applicationsArray['filtertext'];
                        }

                        if (!array_key_exists($techValue, $applicationsArray[$appUid])) {
                            $applicationsArray[$appUid][$techValue] = array();
                        }

                        if (!in_array($product->getUid(), $applicationsArray[$appUid][$techValue])) {
                            $applicationsArray[$appUid][$techValue][] = $product->getUid();
                        }
                    }
                }
            }

            foreach ($applicationsArray as $applicationId => $applicationValues) {
                if (is_array($applicationValues)) {
                    ksort($applicationValues);
                }
                $returnArray[$applicationId] = $applicationValues;
            }
        } else {
            //\TYPO3\CMS\Extbase\Utility\DebuggerUtility::var_dump('here');
            $productsToSectionLength = array();

            /** @var Product $product */
            foreach ($products as $product) {
                $sectionLengths = $this->getSectionLength($product);
                asort($sectionLengths);
                unset($sectionLengths[17]);

                //\TYPO3\CMS\Extbase\Utility\DebuggerUtility::var_dump($sectionLengths);
                //exit;
                foreach($sectionLengths as $key => $sectionLength) {
                    $productsToSectionLength[$key]['data']['name'] = $sectionLength['technicalData']->getTechnicalDataName()->getApplication()->getApplicationName();
                    $productsToSectionLength[$key]['data']['icon'] = $sectionLength['technicalData']->getTechnicalDataName()->getApplication()->getApplicationIcon()->getOriginalResource()->getPublicUrl();
                    $productsToSectionLength[$key]['data']['uid'] = $key;
                    foreach($sectionLength as $capKey => $capacity) {
                        if($capKey != 'technicalData') {
                            $productsToSectionLength[$key][$capacity][] = $product->getUid();
                        }
                    }
                }
                //\TYPO3\CMS\Extbase\Utility\DebuggerUtility::var_dump('here');
                foreach ($product->getTechnicalData() as $technicalData) {
                    //\TYPO3\CMS\Extbase\Utility\DebuggerUtility::var_dump($technicalData);
                    if ($technicalData->getTechnicalDataName()->getIsFilter()) {
                        $appUid = $technicalData->getTechnicalDataName()->getApplication()->getUid();
                        $techValue = $technicalData->getTechnicalDataValueValue();
                        //\TYPO3\CMS\Extbase\Utility\DebuggerUtility::var_dump($technicalData);
                        if (!array_key_exists($appUid, $applicationsArray) && ($technicalData->getTechnicalDataName()->getTechnicalDataName() == 'Kapazität (kg/h)' || $technicalData->getTechnicalDataName()->getTechnicalDataName() == 'Capacity (kg/h)')) {
                            $applicationsArray['filtertext'] = $technicalData->getTechnicalDataName()->getTechnicalDataName();
                            $applicationsArray[$appUid] = array();
                            $applicationsArray[$appUid]['data'] = array();
                            $applicationsArray[$appUid]['data']['name'] = $technicalData->getTechnicalDataName()->getApplication()->getApplicationName();
                            $applicationsArray[$appUid]['data']['icon'] = $technicalData->getTechnicalDataName()->getApplication()->getApplicationIcon()->getOriginalResource()->getPublicUrl();
                            $applicationsArray[$appUid]['data']['uid'] = $appUid;
                            $applicationsArray[$appUid]['data']['filtertext'] = $applicationsArray['filtertext'];
                        }

                        if (!array_key_exists($techValue, $applicationsArray[$appUid]) && ($technicalData->getTechnicalDataName()->getTechnicalDataName() == 'Kapazität (kg/h)' || $technicalData->getTechnicalDataName()->getTechnicalDataName() == 'Capacity (kg/h)')) {
                            $applicationsArray[$appUid][$techValue] = array();
                        }

                        if (!in_array($product->getUid(), $applicationsArray[$appUid][$techValue]) && ($technicalData->getTechnicalDataName()->getTechnicalDataName() == 'Kapazität (kg/h)' || $technicalData->getTechnicalDataName()->getTechnicalDataName() == 'Capacity (kg/h)')) {
                            $applicationsArray[$appUid][$techValue][] = $product->getUid();
                        }
                    }
                }
            }
            //\TYPO3\CMS\Extbase\Utility\DebuggerUtility::var_dump($applicationsArray);
            foreach ($applicationsArray as $applicationId => $applicationValues) {
                if (is_array($applicationValues)) {
                    ksort($applicationValues);
                }
                $returnArray[$applicationId] = $applicationValues;
            }
        }

        $returnArray['SectionLength'] = $productsToSectionLength;
        //\TYPO3\CMS\Extbase\Utility\DebuggerUtility::var_dump($returnArray);
        return $returnArray;
    }

    /**
     * @param $product
     * @return string
     */
    public function getSelectedAppDescription($product) {
        $applicationDescription = '';
        $applicationCookie = json_decode($_COOKIE['filter'], true);
        foreach($product->getApplication() as $application) {
    
            if($application->getApplication()->isDefaultApplication()) {
                $applicationDescription = $application->getApplicationDescriptionText();
            }
            
            // TODO: Make a difference between diffrent product categories.
            // $_COOKIE['filter'] is too general and produce wrong output
            // See Ticket 4506: Wrong text for MPR 150
//            if($application->getApplication()->getUid() == (int)key($applicationCookie) ) {
//                $applicationDescription = $application->getApplicationDescriptionText();
//                break;
//            }
        }
        return $applicationDescription;
    }

    /**
     * @param $product $application
     * @return string
     */
    public function getSelectedAppDescriptionUrl($product, $givenApplication) {
        $applicationDescription = '';
        foreach($product->getApplication() as $application) {

            if($application->getApplication()->isDefaultApplication()) {
                $applicationDescription = $application->getApplicationDescriptionText();
            }

            if($application->getApplication()->getUid() == $givenApplication ) {
                $applicationDescription = $application->getApplicationDescriptionText();
                break;
            }
        }
        return $applicationDescription;
    }

    /**
     * @param $product
     * @return array
     */
    public function getAjaxProductArray($product){
        $returnArray = array();

        $returnArray['uid'] = $product->getUid();
        if($product->getProductName()) {
            $returnArray['productName'] = $product->getProductName();
        } else {
            $returnArray['productName'] = '';
        }
        if($product->getProductShortName()) {
            $returnArray['productShortName'] = $product->getProductShortName();
        } else {
            $returnArray['productShortName'] = '';
        }
        if($product->getProductPreviewImage()->getOriginalResource()->getPublicUrl()) {
            $returnArray['productPreviewImage'] = $product->getProductPreviewImage()->getOriginalResource()->getPublicUrl();
        } else {
            $returnArray['productPreviewImage'] = '';
        }

        return $returnArray;
    }

    public function getProductCompareItems($productUid, $attributesArray, $technicalDataArray, $accessoryArray) {
        $product = $this->findByUid($productUid);
        $productAttributes = $product->getAttribute();
        $productTechnicalData = $product->getTechnicalData();
        $productAccessory = $product->getAccessory();

        $attributesArray = $this->createNewAttributeArray($attributesArray, $productAttributes);
        $technicalDataArray = $this->createNewTechnicalDataArray($technicalDataArray, $productTechnicalData);
        $accessoryArray = $this->createNewAccessoryArray($accessoryArray, $productAccessory);

        $newProduct = array(
            'uid' => $product->getUid(),
            'productName' => $product->getProductName(),
            'productShortName' => $product->getProductShortName(),
            'attribute' => $attributesArray,
            'productPreviewImage' => $product->getProductPreviewImage(),
            'technicalData' => $technicalDataArray,
            'accessory' => $accessoryArray
        );

        return $newProduct;
    }

    protected function createNewAttributeArray($listArray, $valueArray) {
        foreach($listArray as $attribute => $sorting) {
            $listArray[$attribute] = 0;
            foreach($valueArray as $arrayKey => $attributeValues) {
                if($attribute == $attributeValues->getAttributeName()) {
                    $listArray[$attribute] = 1;
                }
            }
        }
        return $listArray;
    }

    protected function createNewAccessoryArray($listArray, $valueArray) {
        foreach($listArray as $attribute => $sorting) {
            $listArray[$attribute] = 0;
            foreach($valueArray as $arrayKey => $attributeValues) {
                if($attribute == $attributeValues->getProductName()) {
                    $listArray[$attribute] = 1;
                }
            }
        }
        return $listArray;
    }

    protected function createNewTechnicalDataArray($listArray, $valueArray) {
        foreach($listArray as $name => $sorting) {
            $listArray[$name] = '';
            foreach($valueArray as $arrayKey => $technicalDataValues) {
                if($name == $technicalDataValues->getTechnicalDataName()->getTechnicalDataName()) {
                    $listArray[$name] = $technicalDataValues->getTechnicalDataValueValue();
                }
            }
        }
        return $listArray;
    }

    protected function getSectionLength($product) {
        $sectionLengths = array();

        foreach($product->getTechnicalData() as $technicalData) {
            //\TYPO3\CMS\Extbase\Utility\DebuggerUtility::var_dump($technicalData->getTechnicalDataName()->getTechnicalDataName());
            if(
                $technicalData->getTechnicalDataName()->getTechnicalDataName() == 'Abschnittlänge' ||
                $technicalData->getTechnicalDataName()->getTechnicalDataName() == 'Section length'
            ) {
                //\TYPO3\CMS\Extbase\Utility\DebuggerUtility::var_dump($technicalData->getTechnicalDataName()->getTechnicalDataName());
                $sectionLengths[$technicalData->getTechnicalDataName()->getApplication()->getUid()]['technicalData'] = $technicalData;
                $sectionLengths[$technicalData->getTechnicalDataName()->getApplication()->getUid()][$technicalData->getTechnicalDataValueValue()] = $technicalData->getTechnicalDataValueValue();
            }
        }

        asort($sectionLengths);
        return $sectionLengths;
    }
}