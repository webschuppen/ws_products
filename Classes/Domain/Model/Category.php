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
 * Category
 */
class Category extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity {

	/**
	 * categoryName
	 *
	 * @var string
	 * @validate NotEmpty
	 */
	protected $categoryName = '';

	/**
	 * categoryDescription
	 *
	 * @var string
	 */
	protected $categoryDescription = '';

	/**
	 * noFilter
	 *
	 * @var boolean
	 */
	protected $noFilter = FALSE;

	/**
	 * backendOnly
	 *
	 * @var boolean
	 */
	protected $backendOnly = FALSE;

	/**
	 * Returns the categoryName
	 *
	 * @return string $categoryName
	 */
	public function getCategoryName() {
		return $this->categoryName;
	}

	/**
	 * Sets the categoryName
	 *
	 * @param string $categoryName
	 * @return void
	 */
	public function setCategoryName($categoryName) {
		$this->categoryName = $categoryName;
	}

	/**
	 * Returns the categoryDescription
	 *
	 * @return string $categoryDescription
	 */
	public function getCategoryDescription() {
		return $this->categoryDescription;
	}

	/**
	 * Sets the categoryDescription
	 *
	 * @param string $categoryDescription
	 * @return void
	 */
	public function setCategoryDescription($categoryDescription) {
		$this->categoryDescription = $categoryDescription;
	}

	/**
	 * Returns the noFilter
	 *
	 * @return boolean $noFilter
	 */
	public function getNoFilter() {
		return $this->noFilter;
	}

	/**
	 * Sets the noFilter
	 *
	 * @param boolean $noFilter
	 * @return void
	 */
	public function setNoFilter($noFilter) {
		$this->noFilter = $noFilter;
	}

	/**
	 * Returns the boolean state of noFilter
	 *
	 * @return boolean
	 */
	public function isNoFilter() {
		return $this->noFilter;
	}

	/**
	 * Returns the backendOnly
	 *
	 * @return boolean $backendOnly
	 */
	public function getBackendOnly() {
		return $this->backendOnly;
	}

	/**
	 * Sets the backendOnly
	 *
	 * @param boolean $backendOnly
	 * @return void
	 */
	public function setBackendOnly($backendOnly) {
		$this->backendOnly = $backendOnly;
	}

	/**
	 * Returns the boolean state of backendOnly
	 *
	 * @return boolean
	 */
	public function isBackendOnly() {
		return $this->backendOnly;
	}

}