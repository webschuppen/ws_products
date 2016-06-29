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
 * Test case for class \Webschuppen\WsProducts\Domain\Model\Product.
 *
 * @copyright Copyright belongs to the respective authors
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 *
 * @author Daniel Klessa <danielk@webschuppen.com>
 * @author Martin Hollmann <martin@webschuppen.com>
 */
class ProductTest extends \TYPO3\CMS\Core\Tests\UnitTestCase {
	/**
	 * @var \Webschuppen\WsProducts\Domain\Model\Product
	 */
	protected $subject = NULL;

	protected function setUp() {
		$this->subject = new \Webschuppen\WsProducts\Domain\Model\Product();
	}

	protected function tearDown() {
		unset($this->subject);
	}

	/**
	 * @test
	 */
	public function getProductNameReturnsInitialValueForString() {
		$this->assertSame(
			'',
			$this->subject->getProductName()
		);
	}

	/**
	 * @test
	 */
	public function setProductNameForStringSetsProductName() {
		$this->subject->setProductName('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'productName',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getProductShortNameReturnsInitialValueForString() {
		$this->assertSame(
			'',
			$this->subject->getProductShortName()
		);
	}

	/**
	 * @test
	 */
	public function setProductShortNameForStringSetsProductShortName() {
		$this->subject->setProductShortName('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'productShortName',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getProductPreviewImageReturnsInitialValueForFileReference() {
		$this->assertEquals(
			NULL,
			$this->subject->getProductPreviewImage()
		);
	}

	/**
	 * @test
	 */
	public function setProductPreviewImageForFileReferenceSetsProductPreviewImage() {
		$fileReferenceFixture = new \TYPO3\CMS\Extbase\Domain\Model\FileReference();
		$this->subject->setProductPreviewImage($fileReferenceFixture);

		$this->assertAttributeEquals(
			$fileReferenceFixture,
			'productPreviewImage',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getProductImageReturnsInitialValueForFileReference() {
		$newObjectStorage = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
		$this->assertEquals(
			$newObjectStorage,
			$this->subject->getProductImage()
		);
	}

	/**
	 * @test
	 */
	public function setProductImageForFileReferenceSetsProductImage() {
		$productImage = new \TYPO3\CMS\Extbase\Domain\Model\FileReference();
		$objectStorageHoldingExactlyOneProductImage = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
		$objectStorageHoldingExactlyOneProductImage->attach($productImage);
		$this->subject->setProductImage($objectStorageHoldingExactlyOneProductImage);

		$this->assertAttributeEquals(
			$objectStorageHoldingExactlyOneProductImage,
			'productImage',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function addProductImageToObjectStorageHoldingProductImage() {
		$productImage = new \TYPO3\CMS\Extbase\Domain\Model\FileReference();
		$productImageObjectStorageMock = $this->getMock('TYPO3\\CMS\\Extbase\\Persistence\\ObjectStorage', array('attach'), array(), '', FALSE);
		$productImageObjectStorageMock->expects($this->once())->method('attach')->with($this->equalTo($productImage));
		$this->inject($this->subject, 'productImage', $productImageObjectStorageMock);

		$this->subject->addProductImage($productImage);
	}

	/**
	 * @test
	 */
	public function removeProductImageFromObjectStorageHoldingProductImage() {
		$productImage = new \TYPO3\CMS\Extbase\Domain\Model\FileReference();
		$productImageObjectStorageMock = $this->getMock('TYPO3\\CMS\\Extbase\\Persistence\\ObjectStorage', array('detach'), array(), '', FALSE);
		$productImageObjectStorageMock->expects($this->once())->method('detach')->with($this->equalTo($productImage));
		$this->inject($this->subject, 'productImage', $productImageObjectStorageMock);

		$this->subject->removeProductImage($productImage);

	}

	/**
	 * @test
	 */
	public function getProductDescriptionReturnsInitialValueForString() {
		$this->assertSame(
			'',
			$this->subject->getProductDescription()
		);
	}

	/**
	 * @test
	 */
	public function setProductDescriptionForStringSetsProductDescription() {
		$this->subject->setProductDescription('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'productDescription',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getProductTeaserImageReturnsInitialValueForFileReference() {
		$this->assertEquals(
			NULL,
			$this->subject->getProductTeaserImage()
		);
	}

	/**
	 * @test
	 */
	public function setProductTeaserImageForFileReferenceSetsProductTeaserImage() {
		$fileReferenceFixture = new \TYPO3\CMS\Extbase\Domain\Model\FileReference();
		$this->subject->setProductTeaserImage($fileReferenceFixture);

		$this->assertAttributeEquals(
			$fileReferenceFixture,
			'productTeaserImage',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getAttributeReturnsInitialValueForAttribute() {
		$newObjectStorage = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
		$this->assertEquals(
			$newObjectStorage,
			$this->subject->getAttribute()
		);
	}

	/**
	 * @test
	 */
	public function setAttributeForObjectStorageContainingAttributeSetsAttribute() {
		$attribute = new \Webschuppen\WsProducts\Domain\Model\Attribute();
		$objectStorageHoldingExactlyOneAttribute = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
		$objectStorageHoldingExactlyOneAttribute->attach($attribute);
		$this->subject->setAttribute($objectStorageHoldingExactlyOneAttribute);

		$this->assertAttributeEquals(
			$objectStorageHoldingExactlyOneAttribute,
			'attribute',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function addAttributeToObjectStorageHoldingAttribute() {
		$attribute = new \Webschuppen\WsProducts\Domain\Model\Attribute();
		$attributeObjectStorageMock = $this->getMock('TYPO3\\CMS\\Extbase\\Persistence\\ObjectStorage', array('attach'), array(), '', FALSE);
		$attributeObjectStorageMock->expects($this->once())->method('attach')->with($this->equalTo($attribute));
		$this->inject($this->subject, 'attribute', $attributeObjectStorageMock);

		$this->subject->addAttribute($attribute);
	}

	/**
	 * @test
	 */
	public function removeAttributeFromObjectStorageHoldingAttribute() {
		$attribute = new \Webschuppen\WsProducts\Domain\Model\Attribute();
		$attributeObjectStorageMock = $this->getMock('TYPO3\\CMS\\Extbase\\Persistence\\ObjectStorage', array('detach'), array(), '', FALSE);
		$attributeObjectStorageMock->expects($this->once())->method('detach')->with($this->equalTo($attribute));
		$this->inject($this->subject, 'attribute', $attributeObjectStorageMock);

		$this->subject->removeAttribute($attribute);

	}

	/**
	 * @test
	 */
	public function getTechnicalDataReturnsInitialValueForTechnicalDataValue() {
		$newObjectStorage = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
		$this->assertEquals(
			$newObjectStorage,
			$this->subject->getTechnicalData()
		);
	}

	/**
	 * @test
	 */
	public function setTechnicalDataForObjectStorageContainingTechnicalDataValueSetsTechnicalData() {
		$technicalDatum = new \Webschuppen\WsProducts\Domain\Model\TechnicalDataValue();
		$objectStorageHoldingExactlyOneTechnicalData = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
		$objectStorageHoldingExactlyOneTechnicalData->attach($technicalDatum);
		$this->subject->setTechnicalData($objectStorageHoldingExactlyOneTechnicalData);

		$this->assertAttributeEquals(
			$objectStorageHoldingExactlyOneTechnicalData,
			'technicalData',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function addTechnicalDatumToObjectStorageHoldingTechnicalData() {
		$technicalDatum = new \Webschuppen\WsProducts\Domain\Model\TechnicalDataValue();
		$technicalDataObjectStorageMock = $this->getMock('TYPO3\\CMS\\Extbase\\Persistence\\ObjectStorage', array('attach'), array(), '', FALSE);
		$technicalDataObjectStorageMock->expects($this->once())->method('attach')->with($this->equalTo($technicalDatum));
		$this->inject($this->subject, 'technicalData', $technicalDataObjectStorageMock);

		$this->subject->addTechnicalDatum($technicalDatum);
	}

	/**
	 * @test
	 */
	public function removeTechnicalDatumFromObjectStorageHoldingTechnicalData() {
		$technicalDatum = new \Webschuppen\WsProducts\Domain\Model\TechnicalDataValue();
		$technicalDataObjectStorageMock = $this->getMock('TYPO3\\CMS\\Extbase\\Persistence\\ObjectStorage', array('detach'), array(), '', FALSE);
		$technicalDataObjectStorageMock->expects($this->once())->method('detach')->with($this->equalTo($technicalDatum));
		$this->inject($this->subject, 'technicalData', $technicalDataObjectStorageMock);

		$this->subject->removeTechnicalDatum($technicalDatum);

	}

	/**
	 * @test
	 */
	public function getCategoryReturnsInitialValueForCategory() {
		$newObjectStorage = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
		$this->assertEquals(
			$newObjectStorage,
			$this->subject->getCategory()
		);
	}

	/**
	 * @test
	 */
	public function setCategoryForObjectStorageContainingCategorySetsCategory() {
		$category = new \Webschuppen\WsProducts\Domain\Model\Category();
		$objectStorageHoldingExactlyOneCategory = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
		$objectStorageHoldingExactlyOneCategory->attach($category);
		$this->subject->setCategory($objectStorageHoldingExactlyOneCategory);

		$this->assertAttributeEquals(
			$objectStorageHoldingExactlyOneCategory,
			'category',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function addCategoryToObjectStorageHoldingCategory() {
		$category = new \Webschuppen\WsProducts\Domain\Model\Category();
		$categoryObjectStorageMock = $this->getMock('TYPO3\\CMS\\Extbase\\Persistence\\ObjectStorage', array('attach'), array(), '', FALSE);
		$categoryObjectStorageMock->expects($this->once())->method('attach')->with($this->equalTo($category));
		$this->inject($this->subject, 'category', $categoryObjectStorageMock);

		$this->subject->addCategory($category);
	}

	/**
	 * @test
	 */
	public function removeCategoryFromObjectStorageHoldingCategory() {
		$category = new \Webschuppen\WsProducts\Domain\Model\Category();
		$categoryObjectStorageMock = $this->getMock('TYPO3\\CMS\\Extbase\\Persistence\\ObjectStorage', array('detach'), array(), '', FALSE);
		$categoryObjectStorageMock->expects($this->once())->method('detach')->with($this->equalTo($category));
		$this->inject($this->subject, 'category', $categoryObjectStorageMock);

		$this->subject->removeCategory($category);

	}

	/**
	 * @test
	 */
	public function getApplicationReturnsInitialValueForApplicationDescription() {
		$newObjectStorage = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
		$this->assertEquals(
			$newObjectStorage,
			$this->subject->getApplication()
		);
	}

	/**
	 * @test
	 */
	public function setApplicationForObjectStorageContainingApplicationDescriptionSetsApplication() {
		$application = new \Webschuppen\WsProducts\Domain\Model\ApplicationDescription();
		$objectStorageHoldingExactlyOneApplication = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
		$objectStorageHoldingExactlyOneApplication->attach($application);
		$this->subject->setApplication($objectStorageHoldingExactlyOneApplication);

		$this->assertAttributeEquals(
			$objectStorageHoldingExactlyOneApplication,
			'application',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function addApplicationToObjectStorageHoldingApplication() {
		$application = new \Webschuppen\WsProducts\Domain\Model\ApplicationDescription();
		$applicationObjectStorageMock = $this->getMock('TYPO3\\CMS\\Extbase\\Persistence\\ObjectStorage', array('attach'), array(), '', FALSE);
		$applicationObjectStorageMock->expects($this->once())->method('attach')->with($this->equalTo($application));
		$this->inject($this->subject, 'application', $applicationObjectStorageMock);

		$this->subject->addApplication($application);
	}

	/**
	 * @test
	 */
	public function removeApplicationFromObjectStorageHoldingApplication() {
		$application = new \Webschuppen\WsProducts\Domain\Model\ApplicationDescription();
		$applicationObjectStorageMock = $this->getMock('TYPO3\\CMS\\Extbase\\Persistence\\ObjectStorage', array('detach'), array(), '', FALSE);
		$applicationObjectStorageMock->expects($this->once())->method('detach')->with($this->equalTo($application));
		$this->inject($this->subject, 'application', $applicationObjectStorageMock);

		$this->subject->removeApplication($application);

	}

	/**
	 * @test
	 */
	public function getAccessoryReturnsInitialValueForProduct() {
		$newObjectStorage = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
		$this->assertEquals(
			$newObjectStorage,
			$this->subject->getAccessory()
		);
	}

	/**
	 * @test
	 */
	public function setAccessoryForObjectStorageContainingProductSetsAccessory() {
		$accessory = new \Webschuppen\WsProducts\Domain\Model\Product();
		$objectStorageHoldingExactlyOneAccessory = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
		$objectStorageHoldingExactlyOneAccessory->attach($accessory);
		$this->subject->setAccessory($objectStorageHoldingExactlyOneAccessory);

		$this->assertAttributeEquals(
			$objectStorageHoldingExactlyOneAccessory,
			'accessory',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function addAccessoryToObjectStorageHoldingAccessory() {
		$accessory = new \Webschuppen\WsProducts\Domain\Model\Product();
		$accessoryObjectStorageMock = $this->getMock('TYPO3\\CMS\\Extbase\\Persistence\\ObjectStorage', array('attach'), array(), '', FALSE);
		$accessoryObjectStorageMock->expects($this->once())->method('attach')->with($this->equalTo($accessory));
		$this->inject($this->subject, 'accessory', $accessoryObjectStorageMock);

		$this->subject->addAccessory($accessory);
	}

	/**
	 * @test
	 */
	public function removeAccessoryFromObjectStorageHoldingAccessory() {
		$accessory = new \Webschuppen\WsProducts\Domain\Model\Product();
		$accessoryObjectStorageMock = $this->getMock('TYPO3\\CMS\\Extbase\\Persistence\\ObjectStorage', array('detach'), array(), '', FALSE);
		$accessoryObjectStorageMock->expects($this->once())->method('detach')->with($this->equalTo($accessory));
		$this->inject($this->subject, 'accessory', $accessoryObjectStorageMock);

		$this->subject->removeAccessory($accessory);

	}

	/**
	 * @test
	 */
	public function getTeaserInfoReturnsInitialValueForTeaserInfoPosition() {
		$newObjectStorage = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
		$this->assertEquals(
			$newObjectStorage,
			$this->subject->getTeaserInfo()
		);
	}

	/**
	 * @test
	 */
	public function setTeaserInfoForObjectStorageContainingTeaserInfoPositionSetsTeaserInfo() {
		$teaserInfo = new \Webschuppen\WsProducts\Domain\Model\TeaserInfoPosition();
		$objectStorageHoldingExactlyOneTeaserInfo = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
		$objectStorageHoldingExactlyOneTeaserInfo->attach($teaserInfo);
		$this->subject->setTeaserInfo($objectStorageHoldingExactlyOneTeaserInfo);

		$this->assertAttributeEquals(
			$objectStorageHoldingExactlyOneTeaserInfo,
			'teaserInfo',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function addTeaserInfoToObjectStorageHoldingTeaserInfo() {
		$teaserInfo = new \Webschuppen\WsProducts\Domain\Model\TeaserInfoPosition();
		$teaserInfoObjectStorageMock = $this->getMock('TYPO3\\CMS\\Extbase\\Persistence\\ObjectStorage', array('attach'), array(), '', FALSE);
		$teaserInfoObjectStorageMock->expects($this->once())->method('attach')->with($this->equalTo($teaserInfo));
		$this->inject($this->subject, 'teaserInfo', $teaserInfoObjectStorageMock);

		$this->subject->addTeaserInfo($teaserInfo);
	}

	/**
	 * @test
	 */
	public function removeTeaserInfoFromObjectStorageHoldingTeaserInfo() {
		$teaserInfo = new \Webschuppen\WsProducts\Domain\Model\TeaserInfoPosition();
		$teaserInfoObjectStorageMock = $this->getMock('TYPO3\\CMS\\Extbase\\Persistence\\ObjectStorage', array('detach'), array(), '', FALSE);
		$teaserInfoObjectStorageMock->expects($this->once())->method('detach')->with($this->equalTo($teaserInfo));
		$this->inject($this->subject, 'teaserInfo', $teaserInfoObjectStorageMock);

		$this->subject->removeTeaserInfo($teaserInfo);

	}

	/**
	 * @test
	 */
	public function getAdditionalLinkReturnsInitialValueForAdditionalLinkValue() {
		$newObjectStorage = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
		$this->assertEquals(
			$newObjectStorage,
			$this->subject->getAdditionalLink()
		);
	}

	/**
	 * @test
	 */
	public function setAdditionalLinkForObjectStorageContainingAdditionalLinkValueSetsAdditionalLink() {
		$additionalLink = new \Webschuppen\WsProducts\Domain\Model\AdditionalLinkValue();
		$objectStorageHoldingExactlyOneAdditionalLink = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
		$objectStorageHoldingExactlyOneAdditionalLink->attach($additionalLink);
		$this->subject->setAdditionalLink($objectStorageHoldingExactlyOneAdditionalLink);

		$this->assertAttributeEquals(
			$objectStorageHoldingExactlyOneAdditionalLink,
			'additionalLink',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function addAdditionalLinkToObjectStorageHoldingAdditionalLink() {
		$additionalLink = new \Webschuppen\WsProducts\Domain\Model\AdditionalLinkValue();
		$additionalLinkObjectStorageMock = $this->getMock('TYPO3\\CMS\\Extbase\\Persistence\\ObjectStorage', array('attach'), array(), '', FALSE);
		$additionalLinkObjectStorageMock->expects($this->once())->method('attach')->with($this->equalTo($additionalLink));
		$this->inject($this->subject, 'additionalLink', $additionalLinkObjectStorageMock);

		$this->subject->addAdditionalLink($additionalLink);
	}

	/**
	 * @test
	 */
	public function removeAdditionalLinkFromObjectStorageHoldingAdditionalLink() {
		$additionalLink = new \Webschuppen\WsProducts\Domain\Model\AdditionalLinkValue();
		$additionalLinkObjectStorageMock = $this->getMock('TYPO3\\CMS\\Extbase\\Persistence\\ObjectStorage', array('detach'), array(), '', FALSE);
		$additionalLinkObjectStorageMock->expects($this->once())->method('detach')->with($this->equalTo($additionalLink));
		$this->inject($this->subject, 'additionalLink', $additionalLinkObjectStorageMock);

		$this->subject->removeAdditionalLink($additionalLink);

	}
}
