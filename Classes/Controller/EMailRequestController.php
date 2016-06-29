<?php
namespace Webschuppen\WsProducts\Controller;


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
 * EMailRequestController
 */
class EMailRequestController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController {

	/**
	 * eMailRequestRepository
	 *
	 * @var \Webschuppen\WsProducts\Domain\Repository\EMailRequestRepository
	 * @inject
	 */
	protected $eMailRequestRepository = NULL;

    /**
     * applicationRepository
     *
     * @var \Webschuppen\WsProducts\Domain\Repository\ApplicationRepository
     * @inject
     */
    protected $applicationRepository = NULL;

    /**
     * productRepository
     *
     * @var \Webschuppen\WsProducts\Domain\Repository\ProductRepository
     * @inject
     */
    protected $productRepository = NULL;

	/**
	 * action new
	 *
	 * @param \Webschuppen\WsProducts\Domain\Model\EMailRequest $newEMailRequest
	 * @ignorevalidation $newEMailRequest
	 * @return void
	 */
	public function newAction(\Webschuppen\WsProducts\Domain\Model\EMailRequest $newEMailRequest = NULL) {
        $capacityValue = "";
        $applicationString = "";
        $productString = "";

        if( $this->request->hasArgument('product') ) {
            // get product name to set in form
            $productUid =  (int)$this->request->getArgument('product');
            $productResult = $this->productRepository->findByUid($productUid);
            $productString = $productResult->getProductName();
            $category = $productResult->getCategory();
            foreach ($category as $categoryItem) {
                $currentCategory = $categoryItem;
            }

            // if cookie is set get information by filter settings user did in maschine filter to show in form's request box
            if ( !empty($_COOKIE['filterEmailRequest']) ) {
                $applicationCookie = json_decode($_COOKIE['filterEmailRequest'], true);
                foreach($applicationCookie as $key => $category) {
                    if($category['active'] && $currentCategory->getUid() === $key) {
                        $applicationCookie = $category;
                        break;
                    }
                }
                $applicationUid = (int)key($applicationCookie);
                $applicationResult = $this->applicationRepository->findByUid($applicationUid);

                $capacityValue = $applicationCookie[$applicationUid];
                $applicationString = $applicationResult->getApplicationName();

            }
        }

		$this->view->assign('newEMailRequest', $newEMailRequest);
        $this->view->assign('capacityValue', $capacityValue);
        $this->view->assign('applicationString', $applicationString);
        $this->view->assign('isApplicationLabel', intval($applicationString));
        $this->view->assign('productName', $productString);
	}

	/**
	 * action create
	 *
	 * @param \Webschuppen\WsProducts\Domain\Model\EMailRequest $newEMailRequest
	 * @return void
	 */
	public function createAction(\Webschuppen\WsProducts\Domain\Model\EMailRequest $newEMailRequest) {
        //$this->addFlashMessage('The object was created. Please be aware that this action is publicly accessible unless you implement an access check. See <a href="http://wiki.typo3.org/T3Doc/Extension_Builder/Using_the_Extension_Builder#1._Model_the_domain" target="_blank">Wiki</a>', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::ERROR);
        $this->eMailRequestRepository->add($newEMailRequest);

        // hotfix for salutation - does not exist in model
        $salutation = $_POST['salutation'];
        $salutation = strip_tags($salutation);
        $salutation = addslashes($salutation);
        $salutation = trim($salutation);

        $this->contactMailAction($newEMailRequest, $salutation);
		$this->view->assign("sysLanguageUid", $GLOBALS['TSFE']->sys_language_uid);		
	}

	/**
	 * action success
	 *
	 * @return void
	 */
	public function successAction() {
		$this->view->assign("sysLanguageUid", $GLOBALS['TSFE']->sys_language_uid);            
	}


    private function contactMailAction($requestVarsObj, $salutation) {
        $recipient='info@original-ruehle.de,e.vogt@original-ruehle.de';
        $sender='no-reply@original-ruehle.de';

        // mail content
        $message = "Sehr geehrte Damen und Herren," . "\n\n";

        $message .= "es ist eine neue Produkt-Anfrage per Webseite eingegangen:" . "\n\n";
        $message.= '--------------' . "\n\n";
        $message.= 'Auswahl: ' . $requestVarsObj->getEmailRequestFilterXML() . "\n\n";
        $message.= 'Von:' . "\n";
        $message.= 'Anrede: ' . $salutation . "\n";
        $message.= 'Vorname: ' . $requestVarsObj->getEMailRequestName() . "\n";
        $message.= 'Name: ' . $requestVarsObj->getEMailRequestLastName() . "\n";
        $message.= 'Unternehmen: ' . $requestVarsObj->getEMailRequestCompany() . "\n";
        $message.= 'Strasse: ' .$requestVarsObj->getEMailRequestStreetNr() . "\n";
        $message.= 'PLZ: ' . $requestVarsObj->getEMailRequestPostalCode() . "\n";
        $message.= 'Ort: ' . $requestVarsObj->getEMailRequestCity() . "\n";
        $message.= 'Telefon: ' . $requestVarsObj->getEMailRequestPhone() . "\n";
        $message.= 'Fax: ' . $requestVarsObj->getEMailRequestFax() . "\n";
        $message.= 'E-Mail: ' . $requestVarsObj->getEMailRequestMailAddress() . "\n";
        $message.= 'Nachricht:' . "\n" . $requestVarsObj->getEMailRequestMessage() . "\n\n";
        $message.= '--------------' . "\n\n";
        
        $subjectMailCover = "Produkt-Anfrage per Webseite";

        $header = 'From: '. $sender . "\r\n";
        if( mail($recipient, $subjectMailCover, utf8_decode($message), $header) ) {
            $this->redirect('success');
        } else {
            $this->redirect('success');
        }

        #//mail versenden
        #/** @var $message \TYPO3\CMS\Core\Mail\MailMessage */
        #$message = $this->objectManager->get('TYPO3\\CMS\\Core\\Mail\\MailMessage');
        #$message->setTo($recipient)
        #   ->setFrom($sender)
        #   ->setSubject($subject);

        #//Plain text example
        #$message->setBody($message, 'text/plain');

        #// HTML Email
        #$message->setBody($message, 'text/html');

        #$message->send();
        #//return $message->isSent();

    }

}