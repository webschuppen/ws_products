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
 * Test case for class Webschuppen\WsProducts\Controller\EMailRequestController.
 *
 * @author Daniel Klessa <danielk@webschuppen.com>
 * @author Martin Hollmann <martin@webschuppen.com>
 */
class EMailRequestControllerTest extends \TYPO3\CMS\Core\Tests\UnitTestCase {

	/**
	 * @var \Webschuppen\WsProducts\Controller\EMailRequestController
	 */
	protected $subject = NULL;

	protected function setUp() {
		$this->subject = $this->getMock('Webschuppen\\WsProducts\\Controller\\EMailRequestController', array('redirect', 'forward', 'addFlashMessage'), array(), '', FALSE);
	}

	protected function tearDown() {
		unset($this->subject);
	}

	/**
	 * @test
	 */
	public function newActionAssignsTheGivenEMailRequestToView() {
		$eMailRequest = new \Webschuppen\WsProducts\Domain\Model\EMailRequest();

		$view = $this->getMock('TYPO3\\CMS\\Extbase\\Mvc\\View\\ViewInterface');
		$view->expects($this->once())->method('assign')->with('newEMailRequest', $eMailRequest);
		$this->inject($this->subject, 'view', $view);

		$this->subject->newAction($eMailRequest);
	}

	/**
	 * @test
	 */
	public function createActionAddsTheGivenEMailRequestToEMailRequestRepository() {
		$eMailRequest = new \Webschuppen\WsProducts\Domain\Model\EMailRequest();

		$eMailRequestRepository = $this->getMock('Webschuppen\\WsProducts\\Domain\\Repository\\EMailRequestRepository', array('add'), array(), '', FALSE);
		$eMailRequestRepository->expects($this->once())->method('add')->with($eMailRequest);
		$this->inject($this->subject, 'eMailRequestRepository', $eMailRequestRepository);

		$this->subject->createAction($eMailRequest);
	}
}
