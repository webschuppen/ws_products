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
 * Test case for class \Webschuppen\WsProducts\Domain\Model\TeaserInfoPosition.
 *
 * @copyright Copyright belongs to the respective authors
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 *
 * @author Daniel Klessa <danielk@webschuppen.com>
 * @author Martin Hollmann <martin@webschuppen.com>
 */
class TeaserInfoPositionTest extends \TYPO3\CMS\Core\Tests\UnitTestCase {
	/**
	 * @var \Webschuppen\WsProducts\Domain\Model\TeaserInfoPosition
	 */
	protected $subject = NULL;

	protected function setUp() {
		$this->subject = new \Webschuppen\WsProducts\Domain\Model\TeaserInfoPosition();
	}

	protected function tearDown() {
		unset($this->subject);
	}

	/**
	 * @test
	 */
	public function getTeaserInfoPositionXReturnsInitialValueForFloat() {
		$this->assertSame(
			0.0,
			$this->subject->getTeaserInfoPositionX()
		);
	}

	/**
	 * @test
	 */
	public function setTeaserInfoPositionXForFloatSetsTeaserInfoPositionX() {
		$this->subject->setTeaserInfoPositionX(3.14159265);

		$this->assertAttributeEquals(
			3.14159265,
			'teaserInfoPositionX',
			$this->subject,
			'',
			0.000000001
		);
	}

	/**
	 * @test
	 */
	public function getTeaserInfoPositionYReturnsInitialValueForFloat() {
		$this->assertSame(
			0.0,
			$this->subject->getTeaserInfoPositionY()
		);
	}

	/**
	 * @test
	 */
	public function setTeaserInfoPositionYForFloatSetsTeaserInfoPositionY() {
		$this->subject->setTeaserInfoPositionY(3.14159265);

		$this->assertAttributeEquals(
			3.14159265,
			'teaserInfoPositionY',
			$this->subject,
			'',
			0.000000001
		);
	}

	/**
	 * @test
	 */
	public function getTeaserInfoReturnsInitialValueForTeaserInfo() {
		$this->assertEquals(
			NULL,
			$this->subject->getTeaserInfo()
		);
	}

	/**
	 * @test
	 */
	public function setTeaserInfoForTeaserInfoSetsTeaserInfo() {
		$teaserInfoFixture = new \Webschuppen\WsProducts\Domain\Model\TeaserInfo();
		$this->subject->setTeaserInfo($teaserInfoFixture);

		$this->assertAttributeEquals(
			$teaserInfoFixture,
			'teaserInfo',
			$this->subject
		);
	}
}
