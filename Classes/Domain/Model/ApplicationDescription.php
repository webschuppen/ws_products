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
 * ApplicationDescription
 */
class ApplicationDescription extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity {

	/**
	 * applicationDescriptionText
	 *
	 * @var string
	 * @validate NotEmpty
	 */
	protected $applicationDescriptionText = '';

	/**
	 * application
	 *
	 * @var \Webschuppen\WsProducts\Domain\Model\Application
	 */
	protected $application = NULL;

	/**
	 * Returns the applicationDescriptionText
	 *
	 * @return string $applicationDescriptionText
	 */
	public function getApplicationDescriptionText() {
		return $this->applicationDescriptionText;
	}

	/**
	 * Sets the applicationDescriptionText
	 *
	 * @param string $applicationDescriptionText
	 * @return void
	 */
	public function setApplicationDescriptionText($applicationDescriptionText) {
		$this->applicationDescriptionText = $applicationDescriptionText;
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

}