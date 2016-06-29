<?php
namespace Webschuppen\WsProducts\Tests\Unit\Controller;
/***************************************************************
 *  Copyright notice
 *
 *  (c) 2015 Daniel Klessa <danielk@webschuppen.com>, webschuppen GmbH
 *  			Martin Hollmann <martin@webschuppen.com>, webschuppen GmbH
 *  			
 *  All rights reserved
 *
 *  This script is part of the TYPO3 project. The TYPO3 project is
 *  free software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation; either version 2 of the License, or
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
 * Test case for class Webschuppen\WsProducts\Controller\ProductController.
 *
 * @author Daniel Klessa <danielk@webschuppen.com>
 * @author Martin Hollmann <martin@webschuppen.com>
 */
class ProductControllerTest extends \TYPO3\CMS\Core\Tests\UnitTestCase {

	/**
	 * @var \Webschuppen\WsProducts\Controller\ProductController
	 */
	protected $subject = NULL;

	protected function setUp() {
		$this->subject = $this->getMock('Webschuppen\\WsProducts\\Controller\\ProductController', array('redirect', 'forward', 'addFlashMessage'), array(), '', FALSE);
	}

	protected function tearDown() {
		unset($this->subject);
	}

	/**
	 * @test
	 */
	public function listActionFetchesAllProductsFromRepositoryAndAssignsThemToView() {

		$allProducts = $this->getMock('TYPO3\\CMS\\Extbase\\Persistence\\ObjectStorage', array(), array(), '', FALSE);

		$productRepository = $this->getMock('Webschuppen\\WsProducts\\Domain\\Repository\\ProductRepository', array('findAll'), array(), '', FALSE);
		$productRepository->expects($this->once())->method('findAll')->will($this->returnValue($allProducts));
		$this->inject($this->subject, 'productRepository', $productRepository);

		$view = $this->getMock('TYPO3\\CMS\\Extbase\\Mvc\\View\\ViewInterface');
		$view->expects($this->once())->method('assign')->with('products', $allProducts);
		$this->inject($this->subject, 'view', $view);

		$this->subject->listAction();
	}

	/**
	 * @test
	 */
	public function showActionAssignsTheGivenProductToView() {
		$product = new \Webschuppen\WsProducts\Domain\Model\Product();

		$view = $this->getMock('TYPO3\\CMS\\Extbase\\Mvc\\View\\ViewInterface');
		$this->inject($this->subject, 'view', $view);
		$view->expects($this->once())->method('assign')->with('product', $product);

		$this->subject->showAction($product);
	}
}
