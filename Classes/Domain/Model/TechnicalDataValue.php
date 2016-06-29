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
 * TechnicalDataValue
 */
class TechnicalDataValue extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity {

	/**
	 * technicalDataValueValue
	 *
	 * @var string
	 */
	protected $technicalDataValueValue = '';

	/**
	 * technicalDataName
	 *
	 * @var \Webschuppen\WsProducts\Domain\Model\TechnicalData
	 */
	protected $technicalDataName = NULL;

	/**
	 * Returns the technicalDataValueValue
	 *
	 * @return string $technicalDataValueValue
	 */
	public function getTechnicalDataValueValue() {
		return $this->technicalDataValueValue;
	}

	/**
	 * Sets the technicalDataValueValue
	 *
	 * @param string $technicalDataValueValue
	 * @return void
	 */
	public function setTechnicalDataValueValue($technicalDataValueValue) {
		$this->technicalDataValueValue = $technicalDataValueValue;
	}

	/**
	 * Returns the technicalDataName
	 *
	 * @return \Webschuppen\WsProducts\Domain\Model\TechnicalData $technicalDataName
	 */
	public function getTechnicalDataName() {
		return $this->technicalDataName;
	}

	/**
	 * Sets the technicalDataName
	 *
	 * @param \Webschuppen\WsProducts\Domain\Model\TechnicalData $technicalDataName
	 * @return void
	 */
	public function setTechnicalDataName(\Webschuppen\WsProducts\Domain\Model\TechnicalData $technicalDataName) {
		$this->technicalDataName = $technicalDataName;
	}

}