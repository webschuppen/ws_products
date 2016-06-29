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
 * AdditionalLink
 */
class AdditionalLink extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity {

	/**
	 * additionalLinkName
	 *
	 * @var string
	 * @validate NotEmpty
	 */
	protected $additionalLinkName = '';

	/**
	 * additionalLinkIcon
	 *
	 * @var \TYPO3\CMS\Extbase\Domain\Model\FileReference
	 */
	protected $additionalLinkIcon = NULL;

	/**
	 * Returns the additionalLinkName
	 *
	 * @return string $additionalLinkName
	 */
	public function getAdditionalLinkName() {
		return $this->additionalLinkName;
	}

	/**
	 * Sets the additionalLinkName
	 *
	 * @param string $additionalLinkName
	 * @return void
	 */
	public function setAdditionalLinkName($additionalLinkName) {
		$this->additionalLinkName = $additionalLinkName;
	}

	/**
	 * Returns the additionalLinkIcon
	 *
	 * @return \TYPO3\CMS\Extbase\Domain\Model\FileReference $additionalLinkIcon
	 */
	public function getAdditionalLinkIcon() {
		return $this->additionalLinkIcon;
	}

	/**
	 * Sets the additionalLinkIcon
	 *
	 * @param \TYPO3\CMS\Extbase\Domain\Model\FileReference $additionalLinkIcon
	 * @return void
	 */
	public function setAdditionalLinkIcon(\TYPO3\CMS\Extbase\Domain\Model\FileReference $additionalLinkIcon) {
		$this->additionalLinkIcon = $additionalLinkIcon;
	}

}