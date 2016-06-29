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
 * TeaserInfoPosition
 */
class TeaserInfoPosition extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity {

	/**
	 * teaserInfoPositionX
	 *
	 * @var float
	 */
	protected $teaserInfoPositionX = 0.0;

	/**
	 * teaserInfoPositionY
	 *
	 * @var float
	 */
	protected $teaserInfoPositionY = 0.0;

	/**
	 * teaserInfo
	 *
	 * @var \Webschuppen\WsProducts\Domain\Model\TeaserInfo
	 */
	protected $teaserInfo = NULL;

	/**
	 * Returns the teaserInfoPositionX
	 *
	 * @return float $teaserInfoPositionX
	 */
	public function getTeaserInfoPositionX() {
		return $this->teaserInfoPositionX;
	}

	/**
	 * Sets the teaserInfoPositionX
	 *
	 * @param float $teaserInfoPositionX
	 * @return void
	 */
	public function setTeaserInfoPositionX($teaserInfoPositionX) {
		$this->teaserInfoPositionX = $teaserInfoPositionX;
	}

	/**
	 * Returns the teaserInfoPositionY
	 *
	 * @return float $teaserInfoPositionY
	 */
	public function getTeaserInfoPositionY() {
		return $this->teaserInfoPositionY;
	}

	/**
	 * Sets the teaserInfoPositionY
	 *
	 * @param float $teaserInfoPositionY
	 * @return void
	 */
	public function setTeaserInfoPositionY($teaserInfoPositionY) {
		$this->teaserInfoPositionY = $teaserInfoPositionY;
	}

	/**
	 * Returns the teaserInfo
	 *
	 * @return \Webschuppen\WsProducts\Domain\Model\TeaserInfo $teaserInfo
	 */
	public function getTeaserInfo() {
		return $this->teaserInfo;
	}

	/**
	 * Sets the teaserInfo
	 *
	 * @param \Webschuppen\WsProducts\Domain\Model\TeaserInfo $teaserInfo
	 * @return void
	 */
	public function setTeaserInfo(\Webschuppen\WsProducts\Domain\Model\TeaserInfo $teaserInfo) {
		$this->teaserInfo = $teaserInfo;
	}

}