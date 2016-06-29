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
 * AdditionalLinkValue
 */
class AdditionalLinkValue extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity {

	/**
	 * additionalLinkValueValue
	 *
	 * @var string
	 * @validate NotEmpty
	 */
	protected $additionalLinkValueValue = '';

	/**
	 * additionalLinkTargetHash
	 *
	 * @var string
	 */
	protected $additionalLinkTargetHash = '';

	/**
	 * additionalLinkTarget
	 *
	 * @var integer
	 */
	protected $additionalLinkTarget = '';

	/**
	 * additionalLink
	 *
	 * @var \Webschuppen\WsProducts\Domain\Model\AdditionalLink
	 */
	protected $additionalLink = NULL;

	/**
	 * Returns the additionalLinkValueValue
	 *
	 * @return string $additionalLinkValueValue
	 */
	public function getAdditionalLinkValueValue() {
		return $this->additionalLinkValueValue;
	}

	/**
	 * Sets the additionalLinkValueValue
	 *
	 * @param string $additionalLinkValueValue
	 * @return void
	 */
	public function setAdditionalLinkValueValue($additionalLinkValueValue) {
		$this->additionalLinkValueValue = $additionalLinkValueValue;
	}

	/**
	 * Returns the additionalLinkTargetHash
	 *
	 * @return string $additionalLinkTargetHash
	 */
	public function getAdditionalLinkTargetHash() {
		return $this->additionalLinkTargetHash;
	}

	/**
	 * Sets the additionalLinkTargetHash
	 *
	 * @param string $additionalLinkTargetHash
	 * @return void
	 */
	public function setAdditionalLinkTargetHash($additionalLinkTargetHash) {
		$this->additionalLinkTargetHash = $additionalLinkTargetHash;
	}

	/**
	 * Returns the additionalLinkTarget
	 *
	 * @return string $additionalLinkTarget
	 */
	public function getAdditionalLinkTarget() {
		return $this->additionalLinkTarget;
	}

	/**
	 * Sets the additionalLinkTarget
	 *
	 * @param string $additionalLinkTarget
	 * @return void
	 */
	public function setAdditionalLinkTarget($additionalLinkTarget) {
		$this->additionalLinkTarget = $additionalLinkTarget;
	}
        
        

	/**
	 * Returns the additionalLink
	 *
	 * @return \Webschuppen\WsProducts\Domain\Model\AdditionalLink $additionalLink
	 */
	public function getAdditionalLink() {
		return $this->additionalLink;
	}

	/**
	 * Sets the additionalLink
	 *
	 * @param \Webschuppen\WsProducts\Domain\Model\AdditionalLink $additionalLink
	 * @return void
	 */
	public function setAdditionalLink(\Webschuppen\WsProducts\Domain\Model\AdditionalLink $additionalLink) {
		$this->additionalLink = $additionalLink;
	}

}