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
 * Test case for class Webschuppen\WsProducts\Controller\AttributeController.
 *
 * @author Daniel Klessa <danielk@webschuppen.com>
 * @author Martin Hollmann <martin@webschuppen.com>
 */
class AttributeControllerTest extends \TYPO3\CMS\Core\Tests\UnitTestCase {

	/**
	 * @var \Webschuppen\WsProducts\Controller\AttributeController
	 */
	protected $subject = NULL;

	protected function setUp() {
		$this->subject = $this->getMock('Webschuppen\\WsProducts\\Controller\\AttributeController', array('redirect', 'forward', 'addFlashMessage'), array(), '', FALSE);
	}

	protected function tearDown() {
		unset($this->subject);
	}

	/**
	 * @test
	 */
	public function listActionFetchesAllAttributesFromRepositoryAndAssignsThemToView() {

		$allAttributes = $this->getMock('TYPO3\\CMS\\Extbase\\Persistence\\ObjectStorage', array(), array(), '', FALSE);

		$attributeRepository = $this->getMock('Webschuppen\\WsProducts\\Domain\\Repository\\AttributeRepository', array('findAll'), array(), '', FALSE);
		$attributeRepository->expects($this->once())->method('findAll')->will($this->returnValue($allAttributes));
		$this->inject($this->subject, 'attributeRepository', $attributeRepository);

		$view = $this->getMock('TYPO3\\CMS\\Extbase\\Mvc\\View\\ViewInterface');
		$view->expects($this->once())->method('assign')->with('attributes', $allAttributes);
		$this->inject($this->subject, 'view', $view);

		$this->subject->listAction();
	}
}
