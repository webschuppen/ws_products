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
 * EMailRequest
 */
class EMailRequest extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity {

	/**
	 * eMailRequestName
	 *
	 * @var string
	 * @validate NotEmpty
	 */
	protected $eMailRequestName = '';

	/**
	 * eMailRequestLastName
	 *
	 * @var string
	 * @validate NotEmpty
	 */
	protected $eMailRequestLastName = '';

	/**
	 * eMailRequestMailAddress
	 *
	 * @var string
	 * @validate NotEmpty
	 */
	protected $eMailRequestMailAddress = '';

	/**
	 * eMailRequestCompany
	 *
	 * @var string
	 */
	protected $eMailRequestCompany = '';

	/**
	 * eMailRequestStreetNr
	 *
	 * @var string
     * @validate NotEmpty
	 */
	protected $eMailRequestStreetNr = '';

	/**
	 * eMailRequestPostalCode
	 *
	 * @var string
     * @validate NotEmpty
	 */
	protected $eMailRequestPostalCode = '';

	/**
	 * eMailRequestCity
	 *
	 * @var string
     * @validate NotEmpty
	 */
	protected $eMailRequestCity = '';

	/**
	 * eMailRequestPhone
	 *
	 * @var string
	 */
	protected $eMailRequestPhone = '';

	/**
	 * eMailRequestFax
	 *
	 * @var string
	 */
	protected $eMailRequestFax = '';

	/**
	 * eMailRequestMessage
	 *
	 * @var string
	 */
	protected $eMailRequestMessage = '';

	/**
	 * eMailRequestFilterXML
	 *
	 * @var string
	 */
	protected $eMailRequestFilterXML = '';

	/**
	 * product
	 *
	 * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Webschuppen\WsProducts\Domain\Model\Product>
	 * @cascade remove
	 */
	protected $product = NULL;

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
		$this->product = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
	}

	/**
	 * Returns the eMailRequestName
	 *
	 * @return string $eMailRequestName
	 */
	public function getEMailRequestName() {
		return $this->eMailRequestName;
	}

	/**
	 * Sets the eMailRequestName
	 *
	 * @param string $eMailRequestName
	 * @return void
	 */
	public function setEMailRequestName($eMailRequestName) {
		$this->eMailRequestName = $eMailRequestName;
	}

	/**
	 * Returns the eMailRequestLastName
	 *
	 * @return string $eMailRequestLastName
	 */
	public function getEMailRequestLastName() {
		return $this->eMailRequestLastName;
	}

	/**
	 * Sets the eMailRequestLastName
	 *
	 * @param string $eMailRequestLastName
	 * @return void
	 */
	public function setEMailRequestLastName($eMailRequestLastName) {
		$this->eMailRequestLastName = $eMailRequestLastName;
	}

	/**
	 * Returns the eMailRequestMailAddress
	 *
	 * @return string $eMailRequestMailAddress
	 */
	public function getEMailRequestMailAddress() {
		return $this->eMailRequestMailAddress;
	}

	/**
	 * Sets the eMailRequestMailAddress
	 *
	 * @param string $eMailRequestMailAddress
	 * @return void
	 */
	public function setEMailRequestMailAddress($eMailRequestMailAddress) {
		$this->eMailRequestMailAddress = $eMailRequestMailAddress;
	}

	/**
	 * Returns the eMailRequestCompany
	 *
	 * @return string $eMailRequestCompany
	 */
	public function getEMailRequestCompany() {
		return $this->eMailRequestCompany;
	}

	/**
	 * Sets the eMailRequestCompany
	 *
	 * @param string $eMailRequestCompany
	 * @return void
	 */
	public function setEMailRequestCompany($eMailRequestCompany) {
		$this->eMailRequestCompany = $eMailRequestCompany;
	}

	/**
	 * Returns the eMailRequestStreetNr
	 *
	 * @return string $eMailRequestStreetNr
	 */
	public function getEMailRequestStreetNr() {
		return $this->eMailRequestStreetNr;
	}

	/**
	 * Sets the eMailRequestStreetNr
	 *
	 * @param string $eMailRequestStreetNr
	 * @return void
	 */
	public function setEMailRequestStreetNr($eMailRequestStreetNr) {
		$this->eMailRequestStreetNr = $eMailRequestStreetNr;
	}

	/**
	 * Returns the eMailRequestPostalCode
	 *
	 * @return string $eMailRequestPostalCode
	 */
	public function getEMailRequestPostalCode() {
		return $this->eMailRequestPostalCode;
	}

	/**
	 * Sets the eMailRequestPostalCode
	 *
	 * @param string $eMailRequestPostalCode
	 * @return void
	 */
	public function setEMailRequestPostalCode($eMailRequestPostalCode) {
		$this->eMailRequestPostalCode = $eMailRequestPostalCode;
	}

	/**
	 * Returns the eMailRequestCity
	 *
	 * @return string $eMailRequestCity
	 */
	public function getEMailRequestCity() {
		return $this->eMailRequestCity;
	}

	/**
	 * Sets the eMailRequestCity
	 *
	 * @param string $eMailRequestCity
	 * @return void
	 */
	public function setEMailRequestCity($eMailRequestCity) {
		$this->eMailRequestCity = $eMailRequestCity;
	}

	/**
	 * Returns the eMailRequestPhone
	 *
	 * @return string $eMailRequestPhone
	 */
	public function getEMailRequestPhone() {
		return $this->eMailRequestPhone;
	}

	/**
	 * Sets the eMailRequestPhone
	 *
	 * @param string $eMailRequestPhone
	 * @return void
	 */
	public function setEMailRequestPhone($eMailRequestPhone) {
		$this->eMailRequestPhone = $eMailRequestPhone;
	}

	/**
	 * Returns the eMailRequestFax
	 *
	 * @return string $eMailRequestFax
	 */
	public function getEMailRequestFax() {
		return $this->eMailRequestFax;
	}

	/**
	 * Sets the eMailRequestFax
	 *
	 * @param string $eMailRequestFax
	 * @return void
	 */
	public function setEMailRequestFax($eMailRequestFax) {
		$this->eMailRequestFax = $eMailRequestFax;
	}

	/**
	 * Returns the eMailRequestMessage
	 *
	 * @return string $eMailRequestMessage
	 */
	public function getEMailRequestMessage() {
		return $this->eMailRequestMessage;
	}

	/**
	 * Sets the eMailRequestMessage
	 *
	 * @param string $eMailRequestMessage
	 * @return void
	 */
	public function setEMailRequestMessage($eMailRequestMessage) {
		$this->eMailRequestMessage = $eMailRequestMessage;
	}

	/**
	 * Returns the eMailRequestFilterXML
	 *
	 * @return string $eMailRequestFilterXML
	 */
	public function getEMailRequestFilterXML() {
		return $this->eMailRequestFilterXML;
	}

	/**
	 * Sets the eMailRequestFilterXML
	 *
	 * @param string $eMailRequestFilterXML
	 * @return void
	 */
	public function setEMailRequestFilterXML($eMailRequestFilterXML) {
		$this->eMailRequestFilterXML = $eMailRequestFilterXML;
	}

	/**
	 * Adds a Product
	 *
	 * @param \Webschuppen\WsProducts\Domain\Model\Product $product
	 * @return void
	 */
	public function addProduct(\Webschuppen\WsProducts\Domain\Model\Product $product) {
		$this->product->attach($product);
	}

	/**
	 * Removes a Product
	 *
	 * @param \Webschuppen\WsProducts\Domain\Model\Product $productToRemove The Product to be removed
	 * @return void
	 */
	public function removeProduct(\Webschuppen\WsProducts\Domain\Model\Product $productToRemove) {
		$this->product->detach($productToRemove);
	}

	/**
	 * Returns the product
	 *
	 * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Webschuppen\WsProducts\Domain\Model\Product> $product
	 */
	public function getProduct() {
		return $this->product;
	}

	/**
	 * Sets the product
	 *
	 * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Webschuppen\WsProducts\Domain\Model\Product> $product
	 * @return void
	 */
	public function setProduct(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $product) {
		$this->product = $product;
	}

}