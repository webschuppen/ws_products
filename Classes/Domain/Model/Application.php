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
 * Application
 */
class Application extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity {

	/**
	 * applicationName
	 *
	 * @var string
	 * @validate NotEmpty
	 */
	protected $applicationName = '';

	/**
	 * applicationIcon
	 *
	 * @var \TYPO3\CMS\Extbase\Domain\Model\FileReference
	 */
	protected $applicationIcon = NULL;

	/**
	 * specialCase
	 *
	 * @var boolean
	 */
	protected $specialCase = FALSE;

	/**
	 * isDefault
	 *
	 * @var boolean
	 */
	protected $defaultApplication = FALSE;

	/**
	 * Returns the applicationName
	 *
	 * @return string $applicationName
	 */
	public function getApplicationName() {
		return $this->applicationName;
	}

	/**
	 * Sets the applicationName
	 *
	 * @param string $applicationName
	 * @return void
	 */
	public function setApplicationName($applicationName) {
		$this->applicationName = $applicationName;
	}

	/**
	 * Returns the applicationIcon
	 *
	 * @return \TYPO3\CMS\Extbase\Domain\Model\FileReference $applicationIcon
	 */
	public function getApplicationIcon() {
		return $this->applicationIcon;
	}

	/**
	 * Sets the applicationIcon
	 *
	 * @param \TYPO3\CMS\Extbase\Domain\Model\FileReference $applicationIcon
	 * @return void
	 */
	public function setApplicationIcon(\TYPO3\CMS\Extbase\Domain\Model\FileReference $applicationIcon) {
		$this->applicationIcon = $applicationIcon;
	}

	/**
	 * Returns the specialCase
	 *
	 * @return boolean $specialCase
	 */
	public function getSpecialCase() {
		return $this->specialCase;
	}

	/**
	 * Sets the specialCase
	 *
	 * @param boolean $specialCase
	 * @return void
	 */
	public function setSpecialCase($specialCase) {
		$this->specialCase = $specialCase;
	}

    /**
     * Returns the boolean state of specialCase
     *
     * @return boolean
     */
    public function isSpecialCase() {
        return $this->specialCase;
    }

	/**
	 * Returns the defaultApplication
	 *
	 * @return boolean $defaultApplication
	 */
	public function getDefaultApplication() {
		return $this->defaultApplication;
	}

	/**
	 * Sets the default
	 *
	 * @param boolean $defaultApplication
	 * @return void
	 */
	public function setDefaultApplication($defaultApplication) {
		$this->defaultApplication = $defaultApplication;
	}

    /**
     * Returns the boolean state of defaultApplication
     *
     * @return boolean
     */
    public function isDefaultApplication() {
        return $this->defaultApplication;
    }

}