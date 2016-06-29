<?php

namespace Webschuppen\WsProducts\Tests\Unit\Domain\Model;

/***************************************************************
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
 * Test case for class \Webschuppen\WsProducts\Domain\Model\AdditionalLinkValue.
 *
 * @copyright Copyright belongs to the respective authors
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 *
 * @author Daniel Klessa <danielk@webschuppen.com>
 * @author Martin Hollmann <martin@webschuppen.com>
 */
class AdditionalLinkValueTest extends \TYPO3\CMS\Core\Tests\UnitTestCase {
	/**
	 * @var \Webschuppen\WsProducts\Domain\Model\AdditionalLinkValue
	 */
	protected $subject = NULL;

	protected function setUp() {
		$this->subject = new \Webschuppen\WsProducts\Domain\Model\AdditionalLinkValue();
	}

	protected function tearDown() {
		unset($this->subject);
	}

	/**
	 * @test
	 */
	public function getAdditionalLinkValueValueReturnsInitialValueForString() {
		$this->assertSame(
			'',
			$this->subject->getAdditionalLinkValueValue()
		);
	}

	/**
	 * @test
	 */
	public function setAdditionalLinkValueValueForStringSetsAdditionalLinkValueValue() {
		$this->subject->setAdditionalLinkValueValue('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'additionalLinkValueValue',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getAdditionalLinkReturnsInitialValueForAdditionalLink() {
		$this->assertEquals(
			NULL,
			$this->subject->getAdditionalLink()
		);
	}

	/**
	 * @test
	 */
	public function setAdditionalLinkForAdditionalLinkSetsAdditionalLink() {
		$additionalLinkFixture = new \Webschuppen\WsProducts\Domain\Model\AdditionalLink();
		$this->subject->setAdditionalLink($additionalLinkFixture);

		$this->assertAttributeEquals(
			$additionalLinkFixture,
			'additionalLink',
			$this->subject
		);
	}
}
