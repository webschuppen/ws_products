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
 * TechnicalData
 */
class TechnicalData extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity {

	/**
	 * technicalDataName
	 *
	 * @var string
	 * @validate NotEmpty
	 */
	protected $technicalDataName = '';

	/**
	 * onlyBackend
	 *
	 * @var boolean
	 */
	protected $onlyBackend = FALSE;

	/**
	 * isFilter
	 *
	 * @var boolean
	 */
	protected $isFilter = FALSE;

	/**
	 * application
	 *
	 * @var \Webschuppen\WsProducts\Domain\Model\Application
	 */
	protected $application = NULL;

    /**
     * sorting
     *
     * @var integer
     */
    protected $sorting = 0;

    /**
	 * Returns the technicalDataName
	 *
	 * @return string $technicalDataName
	 */
	public function getTechnicalDataName() {
		return $this->technicalDataName;
	}

	/**
	 * Sets the technicalDataName
	 *
	 * @param string $technicalDataName
	 * @return void
	 */
	public function setTechnicalDataName($technicalDataName) {
		$this->technicalDataName = $technicalDataName;
	}

	/**
	 * Returns the onlyBackend
	 *
	 * @return boolean $onlyBackend
	 */
	public function getOnlyBackend() {
		return $this->onlyBackend;
	}

	/**
	 * Sets the onlyBackend
	 *
	 * @param boolean $onlyBackend
	 * @return void
	 */
	public function setOnlyBackend($onlyBackend) {
		$this->onlyBackend = $onlyBackend;
	}

	/**
	 * Returns the boolean state of onlyBackend
	 *
	 * @return boolean
	 */
	public function isOnlyBackend() {
		return $this->onlyBackend;
	}

	/**
	 * Returns the isFilter
	 *
	 * @return boolean $isFilter
	 */
	public function getIsFilter() {
		return $this->isFilter;
	}

	/**
	 * Sets the isFilter
	 *
	 * @param boolean $isFilter
	 * @return void
	 */
	public function setIsFilter($isFilter) {
		$this->isFilter = $isFilter;
	}

	/**
	 * Returns the boolean state of isFilter
	 *
	 * @return boolean
	 */
	public function isIsFilter() {
		return $this->isFilter;
	}

	/**
	 * Returns the application
	 *
	 * @return \Webschuppen\WsProducts\Domain\Model\Application $application
	 */
	public function getApplication() {
		return $this->application;
	}

	/**
	 * Sets the application
	 *
	 * @param \Webschuppen\WsProducts\Domain\Model\Application $application
	 * @return void
	 */
	public function setApplication(\Webschuppen\WsProducts\Domain\Model\Application $application) {
		$this->application = $application;
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

}