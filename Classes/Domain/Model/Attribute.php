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
 * Attribute
 */
class Attribute extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity {

	/**
	 * attributeName
	 *
	 * @var string
	 * @validate NotEmpty
	 */
	protected $attributeName = '';

	/**
	 * attributeDescription
	 *
	 * @var string
	 */
	protected $attributeDescription = '';

	/**
	 * sorting
	 *
	 * @var integer
	 */
	protected $sorting = 0;

	/**
	 * attributeImage
	 *
	 * @var \TYPO3\CMS\Extbase\Domain\Model\FileReference
	 */
	protected $attributeImage = NULL;

	/**
	 * Returns the attributeName
	 *
	 * @return string $attributeName
	 */
	public function getAttributeName() {
		return $this->attributeName;
	}

	/**
	 * Sets the attributeName
	 *
	 * @param string $attributeName
	 * @return void
	 */
	public function setAttributeName($attributeName) {
		$this->attributeName = $attributeName;
	}

	/**
	 * Returns the attributeDescription
	 *
	 * @return string $attributeDescription
	 */
	public function getAttributeDescription() {
		return $this->attributeDescription;
	}

	/**
	 * Sets the attributeDescription
	 *
	 * @param string $attributeDescription
	 * @return void
	 */
	public function setAttributeDescription($attributeDescription) {
		$this->attributeDescription = $attributeDescription;
	}

	/**
	 * Returns the sorting
	 *
	 * @return integer $attributeDescription
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

	/**
	 * Returns the attributeImage
	 *
	 * @return \TYPO3\CMS\Extbase\Domain\Model\FileReference $attributeImage
	 */
	public function getAttributeImage() {
		return $this->attributeImage;
	}

	/**
	 * Sets the attributeImage
	 *
	 * @param \TYPO3\CMS\Extbase\Domain\Model\FileReference $attributeImage
	 * @return void
	 */
	public function setAttributeImage(\TYPO3\CMS\Extbase\Domain\Model\FileReference $attributeImage) {
		$this->attributeImage = $attributeImage;
	}

}