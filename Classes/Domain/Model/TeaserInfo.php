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
 * TeaserInfo
 */
class TeaserInfo extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity {

	/**
	 * teaserInfoName
	 *
	 * @var string
	 * @validate NotEmpty
	 */
	protected $teaserInfoName = '';

	/**
	 * teaserInfoText
	 *
	 * @var string
	 */
	protected $teaserInfoText = '';

	/**
	 * teaserInfoImage
	 *
	 * @var \TYPO3\CMS\Extbase\Domain\Model\FileReference
	 */
	protected $teaserInfoImage = NULL;

	/**
	 * Returns the teaserInfoName
	 *
	 * @return string $teaserInfoName
	 */
	public function getTeaserInfoName() {
		return $this->teaserInfoName;
	}

	/**
	 * Sets the teaserInfoName
	 *
	 * @param string $teaserInfoName
	 * @return void
	 */
	public function setTeaserInfoName($teaserInfoName) {
		$this->teaserInfoName = $teaserInfoName;
	}

	/**
	 * Returns the teaserInfoText
	 *
	 * @return string $teaserInfoText
	 */
	public function getTeaserInfoText() {
		return $this->teaserInfoText;
	}

	/**
	 * Sets the teaserInfoText
	 *
	 * @param string $teaserInfoText
	 * @return void
	 */
	public function setTeaserInfoText($teaserInfoText) {
		$this->teaserInfoText = $teaserInfoText;
	}

	/**
	 * Returns the teaserInfoImage
	 *
	 * @return \TYPO3\CMS\Extbase\Domain\Model\FileReference $teaserInfoImage
	 */
	public function getTeaserInfoImage() {
		return $this->teaserInfoImage;
	}

	/**
	 * Sets the teaserInfoImage
	 *
	 * @param \TYPO3\CMS\Extbase\Domain\Model\FileReference $teaserInfoImage
	 * @return void
	 */
	public function setTeaserInfoImage(\TYPO3\CMS\Extbase\Domain\Model\FileReference $teaserInfoImage) {
		$this->teaserInfoImage = $teaserInfoImage;
	}

}