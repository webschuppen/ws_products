<?php
namespace Webschuppen\WsProducts\Domain\Model;


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
 * Product
 */
class Product extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity {

	/**
	 * productName
	 *
	 * @var string
	 * @validate NotEmpty
	 */
	protected $productName = '';

	/**
	 * productShortName
	 *
	 * @var string
	 */
	protected $productShortName = '';

	/**
	 * productPreviewImage
	 *
	 * @var \TYPO3\CMS\Extbase\Domain\Model\FileReference
	 */
	protected $productPreviewImage = NULL;

	/**
	 * productImage
	 *
	 * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\TYPO3\CMS\Extbase\Domain\Model\FileReference>
	 * @cascade remove
	 */
	protected $productImage = NULL;

	/**
	 * productDescription
	 *
	 * @var string
	 */
	protected $productDescription = '';

	/**
	 * productTeaserImage
	 *
	 * @var \TYPO3\CMS\Extbase\Domain\Model\FileReference
	 */
	protected $productTeaserImage = NULL;

	/**
	 * attribute(s) that clarify this product.
	 *
	 * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Webschuppen\WsProducts\Domain\Model\Attribute>
	 */
	protected $attribute = NULL;

	/**
	 * technical enhancement(s) of this product
	 *
	 * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Webschuppen\WsProducts\Domain\Model\TechnicalDataValue>
	 * @cascade remove
	 */
	protected $technicalData = NULL;

	/**
	 * categorie(s) this product belongs to
	 *
	 * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Webschuppen\WsProducts\Domain\Model\Category>
	 */
	protected $category = NULL;

	/**
	 * application(s) this product belongs to
	 *
	 * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Webschuppen\WsProducts\Domain\Model\ApplicationDescription>
	 * @cascade remove
	 */
	protected $application = NULL;

	/**
	 * other product(s), wich are accessories for this product
	 *
	 * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Webschuppen\WsProducts\Domain\Model\Product>
	 */
	protected $accessory = NULL;

	/**
	 * teaserInfo
	 *
	 * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Webschuppen\WsProducts\Domain\Model\TeaserInfoPosition>
	 * @cascade remove
	 */
	protected $teaserInfo = NULL;

	/**
	 * additionalLink
	 *
	 * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Webschuppen\WsProducts\Domain\Model\AdditionalLinkValue>
	 * @cascade remove
	 */
	protected $additionalLink = NULL;

    /**
     * sorting
     *
     * @var integer
     */
    protected $sorting = 0;

	/**
	 * __construct
	 */
	public function __construct() {
		//Do not remove the next line: It would break the functionality
		$this->initStorageObjects();
	}

	/**
	 * Initializes all ObjectStorage properties
	 * Do not modify this method!
	 * It will be rewritten on each save in the extension builder
	 * You may modify the constructor of this class instead
	 *
	 * @return void
	 */
	protected function initStorageObjects() {
		$this->productImage = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
		$this->attribute = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
		$this->technicalData = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
		$this->category = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
		$this->application = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
		$this->accessory = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
		$this->teaserInfo = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
		$this->additionalLink = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
	}

	/**
	 * Returns the productName
	 *
	 * @return string $productName
	 */
	public function getProductName() {
		return $this->productName;
	}

	/**
	 * Sets the productName
	 *
	 * @param string $productName
	 * @return void
	 */
	public function setProductName($productName) {
		$this->productName = $productName;
	}

	/**
	 * Returns the productShortName
	 *
	 * @return string $productShortName
	 */
	public function getProductShortName() {
		return $this->productShortName;
	}

	/**
	 * Sets the productShortName
	 *
	 * @param string $productShortName
	 * @return void
	 */
	public function setProductShortName($productShortName) {
		$this->productShortName = $productShortName;
	}

	/**
	 * Returns the productPreviewImage
	 *
	 * @return \TYPO3\CMS\Extbase\Domain\Model\FileReference $productPreviewImage
	 */
	public function getProductPreviewImage() {
		return $this->productPreviewImage;
	}

	/**
	 * Sets the productPreviewImage
	 *
	 * @param \TYPO3\CMS\Extbase\Domain\Model\FileReference $productPreviewImage
	 * @return void
	 */
	public function setProductPreviewImage(\TYPO3\CMS\Extbase\Domain\Model\FileReference $productPreviewImage) {
		$this->productPreviewImage = $productPreviewImage;
	}

	/**
	 * Adds a FileReference
	 *
	 * @param \TYPO3\CMS\Extbase\Domain\Model\FileReference $productImage
	 * @return void
	 */
	public function addProductImage(\TYPO3\CMS\Extbase\Domain\Model\FileReference $productImage) {
		$this->productImage->attach($productImage);
	}

	/**
	 * Removes a FileReference
	 *
	 * @param \TYPO3\CMS\Extbase\Domain\Model\FileReference $productImageToRemove The FileReference to be removed
	 * @return void
	 */
	public function removeProductImage(\TYPO3\CMS\Extbase\Domain\Model\FileReference $productImageToRemove) {
		$this->productImage->detach($productImageToRemove);
	}

	/**
	 * Returns the productImage
	 *
	 * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\TYPO3\CMS\Extbase\Domain\Model\FileReference> $productImage
	 */
	public function getProductImage() {
		return $this->productImage;
	}

	/**
	 * Sets the productImage
	 *
	 * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\TYPO3\CMS\Extbase\Domain\Model\FileReference> $productImage
	 * @return void
	 */
	public function setProductImage(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $productImage) {
		$this->productImage = $productImage;
	}

	/**
	 * Returns the productDescription
	 *
	 * @return string $productDescription
	 */
	public function getProductDescription() {
		return $this->productDescription;
	}

	/**
	 * Sets the productDescription
	 *
	 * @param string $productDescription
	 * @return void
	 */
	public function setProductDescription($productDescription) {
		$this->productDescription = $productDescription;
	}

	/**
	 * Returns the productTeaserImage
	 *
	 * @return \TYPO3\CMS\Extbase\Domain\Model\FileReference $productTeaserImage
	 */
	public function getProductTeaserImage() {
		return $this->productTeaserImage;
	}

	/**
	 * Sets the productTeaserImage
	 *
	 * @param \TYPO3\CMS\Extbase\Domain\Model\FileReference $productTeaserImage
	 * @return void
	 */
	public function setProductTeaserImage(\TYPO3\CMS\Extbase\Domain\Model\FileReference $productTeaserImage) {
		$this->productTeaserImage = $productTeaserImage;
	}

	/**
	 * Adds a Attribute
	 *
	 * @param \Webschuppen\WsProducts\Domain\Model\Attribute $attribute
	 * @return void
	 */
	public function addAttribute(\Webschuppen\WsProducts\Domain\Model\Attribute $attribute) {
		$this->attribute->attach($attribute);
	}

	/**
	 * Removes a Attribute
	 *
	 * @param \Webschuppen\WsProducts\Domain\Model\Attribute $attributeToRemove The Attribute to be removed
	 * @return void
	 */
	public function removeAttribute(\Webschuppen\WsProducts\Domain\Model\Attribute $attributeToRemove) {
		$this->attribute->detach($attributeToRemove);
	}

	/**
	 * Returns the attribute
	 *
	 * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Webschuppen\WsProducts\Domain\Model\Attribute> $attribute
	 */
	public function getAttribute() {
		return $this->attribute;
	}

	/**
	 * Sets the attribute
	 *
	 * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Webschuppen\WsProducts\Domain\Model\Attribute> $attribute
	 * @return void
	 */
	public function setAttribute(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $attribute) {
		$this->attribute = $attribute;
	}

	/**
	 * Adds a TechnicalDataValue
	 *
	 * @param \Webschuppen\WsProducts\Domain\Model\TechnicalDataValue $technicalDatum
	 * @return void
	 */
	public function addTechnicalDatum(\Webschuppen\WsProducts\Domain\Model\TechnicalDataValue $technicalDatum) {
		$this->technicalData->attach($technicalDatum);
	}

	/**
	 * Removes a TechnicalDataValue
	 *
	 * @param \Webschuppen\WsProducts\Domain\Model\TechnicalDataValue $technicalDatumToRemove The TechnicalDataValue to be removed
	 * @return void
	 */
	public function removeTechnicalDatum(\Webschuppen\WsProducts\Domain\Model\TechnicalDataValue $technicalDatumToRemove) {
		$this->technicalData->detach($technicalDatumToRemove);
	}

	/**
	 * Returns the technicalData
	 *
	 * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Webschuppen\WsProducts\Domain\Model\TechnicalDataValue> $technicalData
	 */
	public function getTechnicalData() {
		return $this->technicalData;
	}

	/**
	 * Sets the technicalData
	 *
	 * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Webschuppen\WsProducts\Domain\Model\TechnicalDataValue> $technicalData
	 * @return void
	 */
	public function setTechnicalData(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $technicalData) {
		$this->technicalData = $technicalData;
	}

	/**
	 * Adds a Category
	 *
	 * @param \Webschuppen\WsProducts\Domain\Model\Category $category
	 * @return void
	 */
	public function addCategory(\Webschuppen\WsProducts\Domain\Model\Category $category) {
		$this->category->attach($category);
	}

	/**
	 * Removes a Category
	 *
	 * @param \Webschuppen\WsProducts\Domain\Model\Category $categoryToRemove The Category to be removed
	 * @return void
	 */
	public function removeCategory(\Webschuppen\WsProducts\Domain\Model\Category $categoryToRemove) {
		$this->category->detach($categoryToRemove);
	}

	/**
	 * Returns the category
	 *
	 * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Webschuppen\WsProducts\Domain\Model\Category> $category
	 */
	public function getCategory() {
		return $this->category;
	}

	/**
	 * Sets the category
	 *
	 * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Webschuppen\WsProducts\Domain\Model\Category> $category
	 * @return void
	 */
	public function setCategory(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $category) {
		$this->category = $category;
	}

	/**
	 * Adds a ApplicationDescription
	 *
	 * @param \Webschuppen\WsProducts\Domain\Model\ApplicationDescription $application
	 * @return void
	 */
	public function addApplication(\Webschuppen\WsProducts\Domain\Model\ApplicationDescription $application) {
		$this->application->attach($application);
	}

	/**
	 * Removes a ApplicationDescription
	 *
	 * @param \Webschuppen\WsProducts\Domain\Model\ApplicationDescription $applicationToRemove The ApplicationDescription to be removed
	 * @return void
	 */
	public function removeApplication(\Webschuppen\WsProducts\Domain\Model\ApplicationDescription $applicationToRemove) {
		$this->application->detach($applicationToRemove);
	}

	/**
	 * Returns the application
	 *
	 * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Webschuppen\WsProducts\Domain\Model\ApplicationDescription> $application
	 */
	public function getApplication() {
		return $this->application;
	}

	/**
	 * Sets the application
	 *
	 * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Webschuppen\WsProducts\Domain\Model\ApplicationDescription> $application
	 * @return void
	 */
	public function setApplication(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $application) {
		$this->application = $application;
	}

	/**
	 * Adds a Product
	 *
	 * @param \Webschuppen\WsProducts\Domain\Model\Product $accessory
	 * @return void
	 */
	public function addAccessory(\Webschuppen\WsProducts\Domain\Model\Product $accessory) {
		$this->accessory->attach($accessory);
	}

	/**
	 * Removes a Product
	 *
	 * @param \Webschuppen\WsProducts\Domain\Model\Product $accessoryToRemove The Product to be removed
	 * @return void
	 */
	public function removeAccessory(\Webschuppen\WsProducts\Domain\Model\Product $accessoryToRemove) {
		$this->accessory->detach($accessoryToRemove);
	}

	/**
	 * Returns the accessory
	 *
	 * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Webschuppen\WsProducts\Domain\Model\Product> $accessory
	 */
	public function getAccessory() {
		return $this->accessory;
	}

	/**
	 * Sets the accessory
	 *
	 * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Webschuppen\WsProducts\Domain\Model\Product> $accessory
	 * @return void
	 */
	public function setAccessory(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $accessory) {
		$this->accessory = $accessory;
	}

	/**
	 * Adds a TeaserInfoPosition
	 *
	 * @param \Webschuppen\WsProducts\Domain\Model\TeaserInfoPosition $teaserInfo
	 * @return void
	 */
	public function addTeaserInfo(\Webschuppen\WsProducts\Domain\Model\TeaserInfoPosition $teaserInfo) {
		$this->teaserInfo->attach($teaserInfo);
	}

	/**
	 * Removes a TeaserInfoPosition
	 *
	 * @param \Webschuppen\WsProducts\Domain\Model\TeaserInfoPosition $teaserInfoToRemove The TeaserInfoPosition to be removed
	 * @return void
	 */
	public function removeTeaserInfo(\Webschuppen\WsProducts\Domain\Model\TeaserInfoPosition $teaserInfoToRemove) {
		$this->teaserInfo->detach($teaserInfoToRemove);
	}

	/**
	 * Returns the teaserInfo
	 *
	 * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Webschuppen\WsProducts\Domain\Model\TeaserInfoPosition> $teaserInfo
	 */
	public function getTeaserInfo() {
		return $this->teaserInfo;
	}

	/**
	 * Sets the teaserInfo
	 *
	 * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Webschuppen\WsProducts\Domain\Model\TeaserInfoPosition> $teaserInfo
	 * @return void
	 */
	public function setTeaserInfo(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $teaserInfo) {
		$this->teaserInfo = $teaserInfo;
	}

	/**
	 * Adds a AdditionalLinkValue
	 *
	 * @param \Webschuppen\WsProducts\Domain\Model\AdditionalLinkValue $additionalLink
	 * @return void
	 */
	public function addAdditionalLink(\Webschuppen\WsProducts\Domain\Model\AdditionalLinkValue $additionalLink) {
		$this->additionalLink->attach($additionalLink);
	}

	/**
	 * Removes a AdditionalLinkValue
	 *
	 * @param \Webschuppen\WsProducts\Domain\Model\AdditionalLinkValue $additionalLinkToRemove The AdditionalLinkValue to be removed
	 * @return void
	 */
	public function removeAdditionalLink(\Webschuppen\WsProducts\Domain\Model\AdditionalLinkValue $additionalLinkToRemove) {
		$this->additionalLink->detach($additionalLinkToRemove);
	}

	/**
	 * Returns the additionalLink
	 *
	 * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Webschuppen\WsProducts\Domain\Model\AdditionalLinkValue> $additionalLink
	 */
	public function getAdditionalLink() {
		return $this->additionalLink;
	}

	/**
	 * Sets the additionalLink
	 *
	 * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Webschuppen\WsProducts\Domain\Model\AdditionalLinkValue> $additionalLink
	 * @return void
	 */
	public function setAdditionalLink(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $additionalLink) {
		$this->additionalLink = $additionalLink;
	}

    /**
     * Returns the sorting
     *
     * @return integer $sorting
     */
    public function getSorting() {
        return $this->sorting;
    }

    /**
     * Sets the sorting
     *
     * @param integer $sorting
     * @return void
     */
    public function setSorting($sorting) {
        $this->sorting = $sorting;
    }

}