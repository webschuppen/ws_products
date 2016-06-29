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
 * Test case for class \Webschuppen\WsProducts\Domain\Model\EMailRequest.
 *
 * @copyright Copyright belongs to the respective authors
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 *
 * @author Daniel Klessa <danielk@webschuppen.com>
 * @author Martin Hollmann <martin@webschuppen.com>
 */
class EMailRequestTest extends \TYPO3\CMS\Core\Tests\UnitTestCase {
	/**
	 * @var \Webschuppen\WsProducts\Domain\Model\EMailRequest
	 */
	protected $subject = NULL;

	protected function setUp() {
		$this->subject = new \Webschuppen\WsProducts\Domain\Model\EMailRequest();
	}

	protected function tearDown() {
		unset($this->subject);
	}

	/**
	 * @test
	 */
	public function getEMailRequestNameReturnsInitialValueForString() {
		$this->assertSame(
			'',
			$this->subject->getEMailRequestName()
		);
	}

	/**
	 * @test
	 */
	public function setEMailRequestNameForStringSetsEMailRequestName() {
		$this->subject->setEMailRequestName('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'eMailRequestName',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getEMailRequestLastNameReturnsInitialValueForString() {
		$this->assertSame(
			'',
			$this->subject->getEMailRequestLastName()
		);
	}

	/**
	 * @test
	 */
	public function setEMailRequestLastNameForStringSetsEMailRequestLastName() {
		$this->subject->setEMailRequestLastName('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'eMailRequestLastName',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getEMailRequestMailAddressReturnsInitialValueForString() {
		$this->assertSame(
			'',
			$this->subject->getEMailRequestMailAddress()
		);
	}

	/**
	 * @test
	 */
	public function setEMailRequestMailAddressForStringSetsEMailRequestMailAddress() {
		$this->subject->setEMailRequestMailAddress('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'eMailRequestMailAddress',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getEMailRequestCompanyReturnsInitialValueForString() {
		$this->assertSame(
			'',
			$this->subject->getEMailRequestCompany()
		);
	}

	/**
	 * @test
	 */
	public function setEMailRequestCompanyForStringSetsEMailRequestCompany() {
		$this->subject->setEMailRequestCompany('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'eMailRequestCompany',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getEMailRequestStreetNrReturnsInitialValueForString() {
		$this->assertSame(
			'',
			$this->subject->getEMailRequestStreetNr()
		);
	}

	/**
	 * @test
	 */
	public function setEMailRequestStreetNrForStringSetsEMailRequestStreetNr() {
		$this->subject->setEMailRequestStreetNr('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'eMailRequestStreetNr',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getEMailRequestPostalCodeReturnsInitialValueForString() {
		$this->assertSame(
			'',
			$this->subject->getEMailRequestPostalCode()
		);
	}

	/**
	 * @test
	 */
	public function setEMailRequestPostalCodeForStringSetsEMailRequestPostalCode() {
		$this->subject->setEMailRequestPostalCode('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'eMailRequestPostalCode',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getEMailRequestCityReturnsInitialValueForString() {
		$this->assertSame(
			'',
			$this->subject->getEMailRequestCity()
		);
	}

	/**
	 * @test
	 */
	public function setEMailRequestCityForStringSetsEMailRequestCity() {
		$this->subject->setEMailRequestCity('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'eMailRequestCity',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getEMailRequestPhoneReturnsInitialValueForString() {
		$this->assertSame(
			'',
			$this->subject->getEMailRequestPhone()
		);
	}

	/**
	 * @test
	 */
	public function setEMailRequestPhoneForStringSetsEMailRequestPhone() {
		$this->subject->setEMailRequestPhone('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'eMailRequestPhone',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getEMailRequestFaxReturnsInitialValueForString() {
		$this->assertSame(
			'',
			$this->subject->getEMailRequestFax()
		);
	}

	/**
	 * @test
	 */
	public function setEMailRequestFaxForStringSetsEMailRequestFax() {
		$this->subject->setEMailRequestFax('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'eMailRequestFax',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getEMailRequestMessageReturnsInitialValueForString() {
		$this->assertSame(
			'',
			$this->subject->getEMailRequestMessage()
		);
	}

	/**
	 * @test
	 */
	public function setEMailRequestMessageForStringSetsEMailRequestMessage() {
		$this->subject->setEMailRequestMessage('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'eMailRequestMessage',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getEMailRequestFilterXMLReturnsInitialValueForString() {
		$this->assertSame(
			'',
			$this->subject->getEMailRequestFilterXML()
		);
	}

	/**
	 * @test
	 */
	public function setEMailRequestFilterXMLForStringSetsEMailRequestFilterXML() {
		$this->subject->setEMailRequestFilterXML('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'eMailRequestFilterXML',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getProductReturnsInitialValueForProduct() {
		$newObjectStorage = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
		$this->assertEquals(
			$newObjectStorage,
			$this->subject->getProduct()
		);
	}

	/**
	 * @test
	 */
	public function setProductForObjectStorageContainingProductSetsProduct() {
		$product = new \Webschuppen\WsProducts\Domain\Model\Product();
		$objectStorageHoldingExactlyOneProduct = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
		$objectStorageHoldingExactlyOneProduct->attach($product);
		$this->subject->setProduct($objectStorageHoldingExactlyOneProduct);

		$this->assertAttributeEquals(
			$objectStorageHoldingExactlyOneProduct,
			'product',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function addProductToObjectStorageHoldingProduct() {
		$product = new \Webschuppen\WsProducts\Domain\Model\Product();
		$productObjectStorageMock = $this->getMock('TYPO3\\CMS\\Extbase\\Persistence\\ObjectStorage', array('attach'), array(), '', FALSE);
		$productObjectStorageMock->expects($this->once())->method('attach')->with($this->equalTo($product));
		$this->inject($this->subject, 'product', $productObjectStorageMock);

		$this->subject->addProduct($product);
	}

	/**
	 * @test
	 */
	public function removeProductFromObjectStorageHoldingProduct() {
		$product = new \Webschuppen\WsProducts\Domain\Model\Product();
		$productObjectStorageMock = $this->getMock('TYPO3\\CMS\\Extbase\\Persistence\\ObjectStorage', array('detach'), array(), '', FALSE);
		$productObjectStorageMock->expects($this->once())->method('detach')->with($this->equalTo($product));
		$this->inject($this->subject, 'product', $productObjectStorageMock);

		$this->subject->removeProduct($product);

	}
}
