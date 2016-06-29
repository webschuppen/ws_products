<?php
if (!defined('TYPO3_MODE')) {
	die('Access denied.');
}

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
	$_EXTKEY,
	'Product',
	'Product'
);

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
	$_EXTKEY,
	'Category',
	'Category'
);

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
	$_EXTKEY,
	'Attribute',
	'Attribute'
);

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
	$_EXTKEY,
	'Application',
	'Application'
);

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
	$_EXTKEY,
	'Emailrequest',
	'EMailRequest'
);

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile($_EXTKEY, 'Configuration/TypoScript', 'WS Products');

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_wsproducts_domain_model_product', 'EXT:ws_products/Resources/Private/Language/locallang_csh_tx_wsproducts_domain_model_product.xlf');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_wsproducts_domain_model_product');
$GLOBALS['TCA']['tx_wsproducts_domain_model_product'] = array(
	'ctrl' => array(
		'title'	=> 'LLL:EXT:ws_products/Resources/Private/Language/locallang_db.xlf:tx_wsproducts_domain_model_product',
		'label' => 'product_name',
		'tstamp' => 'tstamp',
		'crdate' => 'crdate',
		'cruser_id' => 'cruser_id',
		'dividers2tabs' => TRUE,
        'sortby' => 'sorting',

		'versioningWS' => 2,
		'versioning_followPages' => TRUE,

		'languageField' => 'sys_language_uid',
		'transOrigPointerField' => 'l10n_parent',
		'transOrigDiffSourceField' => 'l10n_diffsource',
		'delete' => 'deleted',
		'enablecolumns' => array(
			'disabled' => 'hidden',
			'starttime' => 'starttime',
			'endtime' => 'endtime',
            'sorting' => 'sorting'
		),
		'searchFields' => 'product_name,product_short_name,product_preview_image,product_image,product_description,product_teaser_image,attribute,technical_data,category,application,accessory,teaser_info,additional_link,',
		'dynamicConfigFile' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extPath($_EXTKEY) . 'Configuration/TCA/Product.php',
		'iconfile' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extRelPath($_EXTKEY) . 'Resources/Public/Icons/tx_wsproducts_domain_model_product.gif'
	),
);

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_wsproducts_domain_model_attribute', 'EXT:ws_products/Resources/Private/Language/locallang_csh_tx_wsproducts_domain_model_attribute.xlf');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_wsproducts_domain_model_attribute');
$GLOBALS['TCA']['tx_wsproducts_domain_model_attribute'] = array(
	'ctrl' => array(
		'title'	=> 'LLL:EXT:ws_products/Resources/Private/Language/locallang_db.xlf:tx_wsproducts_domain_model_attribute',
		'label' => 'attribute_name',
		'tstamp' => 'tstamp',
		'crdate' => 'crdate',
		'cruser_id' => 'cruser_id',
		'dividers2tabs' => TRUE,

		'versioningWS' => 2,
		'versioning_followPages' => TRUE,
        'sortby' => 'sorting',

		'languageField' => 'sys_language_uid',
		'transOrigPointerField' => 'l10n_parent',
		'transOrigDiffSourceField' => 'l10n_diffsource',
		'delete' => 'deleted',
		'enablecolumns' => array(
			'disabled' => 'hidden',
			'starttime' => 'starttime',
			'endtime' => 'endtime',
            'sorting' => 'sorting'
		),
		'searchFields' => 'attribute_name,attribute_description,attribute_image,',
		'dynamicConfigFile' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extPath($_EXTKEY) . 'Configuration/TCA/Attribute.php',
		'iconfile' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extRelPath($_EXTKEY) . 'Resources/Public/Icons/tx_wsproducts_domain_model_attribute.gif'
	),
);

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_wsproducts_domain_model_technicaldata', 'EXT:ws_products/Resources/Private/Language/locallang_csh_tx_wsproducts_domain_model_technicaldata.xlf');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_wsproducts_domain_model_technicaldata');
$GLOBALS['TCA']['tx_wsproducts_domain_model_technicaldata'] = array(
	'ctrl' => array(
		'title'	=> 'LLL:EXT:ws_products/Resources/Private/Language/locallang_db.xlf:tx_wsproducts_domain_model_technicaldata',
		'label' => 'technical_data_name',
		'label_alt' => 'application',
		'label_alt_force' => 1,
		'tstamp' => 'tstamp',
		'crdate' => 'crdate',
		'cruser_id' => 'cruser_id',
		'dividers2tabs' => TRUE,

		'versioningWS' => 2,
		'versioning_followPages' => TRUE,
        'sortby' => 'sorting',

		'languageField' => 'sys_language_uid',
		'transOrigPointerField' => 'l10n_parent',
		'transOrigDiffSourceField' => 'l10n_diffsource',
		'delete' => 'deleted',
		'enablecolumns' => array(
			'disabled' => 'hidden',
			'starttime' => 'starttime',
			'endtime' => 'endtime',
            'sorting' => 'sorting',
		),
		'searchFields' => 'technical_data_name,only_backend,is_filter,application,',
		'dynamicConfigFile' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extPath($_EXTKEY) . 'Configuration/TCA/TechnicalData.php',
		'iconfile' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extRelPath($_EXTKEY) . 'Resources/Public/Icons/tx_wsproducts_domain_model_technicaldata.gif'
	),
);

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_wsproducts_domain_model_category', 'EXT:ws_products/Resources/Private/Language/locallang_csh_tx_wsproducts_domain_model_category.xlf');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_wsproducts_domain_model_category');
$GLOBALS['TCA']['tx_wsproducts_domain_model_category'] = array(
	'ctrl' => array(
		'title'	=> 'LLL:EXT:ws_products/Resources/Private/Language/locallang_db.xlf:tx_wsproducts_domain_model_category',
		'label' => 'category_name',
		'tstamp' => 'tstamp',
		'crdate' => 'crdate',
		'cruser_id' => 'cruser_id',
		'dividers2tabs' => TRUE,

		'versioningWS' => 2,
		'versioning_followPages' => TRUE,

		'languageField' => 'sys_language_uid',
		'transOrigPointerField' => 'l10n_parent',
		'transOrigDiffSourceField' => 'l10n_diffsource',
		'delete' => 'deleted',
		'enablecolumns' => array(
			'disabled' => 'hidden',
			'starttime' => 'starttime',
			'endtime' => 'endtime',
		),
		'searchFields' => 'category_name,category_description,no_filter,backend_only,',
		'dynamicConfigFile' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extPath($_EXTKEY) . 'Configuration/TCA/Category.php',
		'iconfile' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extRelPath($_EXTKEY) . 'Resources/Public/Icons/tx_wsproducts_domain_model_category.gif'
	),
);

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_wsproducts_domain_model_application', 'EXT:ws_products/Resources/Private/Language/locallang_csh_tx_wsproducts_domain_model_application.xlf');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_wsproducts_domain_model_application');
$GLOBALS['TCA']['tx_wsproducts_domain_model_application'] = array(
	'ctrl' => array(
		'title'	=> 'LLL:EXT:ws_products/Resources/Private/Language/locallang_db.xlf:tx_wsproducts_domain_model_application',
		'label' => 'application_name',
		'tstamp' => 'tstamp',
		'crdate' => 'crdate',
		'cruser_id' => 'cruser_id',
		'dividers2tabs' => TRUE,

		'versioningWS' => 2,
		'versioning_followPages' => TRUE,

		'languageField' => 'sys_language_uid',
		'transOrigPointerField' => 'l10n_parent',
		'transOrigDiffSourceField' => 'l10n_diffsource',
		'delete' => 'deleted',
		'enablecolumns' => array(
			'disabled' => 'hidden',
			'starttime' => 'starttime',
			'endtime' => 'endtime',
		),
		'searchFields' => 'application_name,application_icon,special_case,default_application,',
		'dynamicConfigFile' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extPath($_EXTKEY) . 'Configuration/TCA/Application.php',
		'iconfile' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extRelPath($_EXTKEY) . 'Resources/Public/Icons/tx_wsproducts_domain_model_application.gif'
	),
);

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_wsproducts_domain_model_teaserinfo', 'EXT:ws_products/Resources/Private/Language/locallang_csh_tx_wsproducts_domain_model_teaserinfo.xlf');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_wsproducts_domain_model_teaserinfo');
$GLOBALS['TCA']['tx_wsproducts_domain_model_teaserinfo'] = array(
	'ctrl' => array(
		'title'	=> 'LLL:EXT:ws_products/Resources/Private/Language/locallang_db.xlf:tx_wsproducts_domain_model_teaserinfo',
		'label' => 'data_name',
		'label_alt' => 'teaser_info_name',
		'label_alt_force' => 1,
		'tstamp' => 'tstamp',
		'crdate' => 'crdate',
		'cruser_id' => 'cruser_id',
		'dividers2tabs' => TRUE,

		'versioningWS' => 2,
		'versioning_followPages' => TRUE,

		'languageField' => 'sys_language_uid',
		'transOrigPointerField' => 'l10n_parent',
		'transOrigDiffSourceField' => 'l10n_diffsource',
		'delete' => 'deleted',
		'enablecolumns' => array(
			'disabled' => 'hidden',
			'starttime' => 'starttime',
			'endtime' => 'endtime',
		),
		'searchFields' => 'data_name,teaser_info_name,teaser_info_text,teaser_info_image,',
		'dynamicConfigFile' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extPath($_EXTKEY) . 'Configuration/TCA/TeaserInfo.php',
		'iconfile' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extRelPath($_EXTKEY) . 'Resources/Public/Icons/tx_wsproducts_domain_model_teaserinfo.gif'
	),
);

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_wsproducts_domain_model_technicaldatavalue', 'EXT:ws_products/Resources/Private/Language/locallang_csh_tx_wsproducts_domain_model_technicaldatavalue.xlf');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_wsproducts_domain_model_technicaldatavalue');
$GLOBALS['TCA']['tx_wsproducts_domain_model_technicaldatavalue'] = array(
	'ctrl' => array(
		'title'	=> 'LLL:EXT:ws_products/Resources/Private/Language/locallang_db.xlf:tx_wsproducts_domain_model_technicaldatavalue',
		'label' => 'technical_data_value_value',
		'label_alt' => 'technical_data_name',
		'label_alt_force' => 1,
		'tstamp' => 'tstamp',
		'crdate' => 'crdate',
		'cruser_id' => 'cruser_id',
		'dividers2tabs' => TRUE,

		'versioningWS' => 2,
		'versioning_followPages' => TRUE,

		'languageField' => 'sys_language_uid',
		'transOrigPointerField' => 'l10n_parent',
		'transOrigDiffSourceField' => 'l10n_diffsource',
		'delete' => 'deleted',
		'enablecolumns' => array(
			'disabled' => 'hidden',
			'starttime' => 'starttime',
			'endtime' => 'endtime',
		),
		'searchFields' => 'technical_data_value_value,technical_data,technical_data_name,',
		'dynamicConfigFile' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extPath($_EXTKEY) . 'Configuration/TCA/TechnicalDataValue.php',
		'iconfile' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extRelPath($_EXTKEY) . 'Resources/Public/Icons/tx_wsproducts_domain_model_technicaldatavalue.gif'
	),
);

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_wsproducts_domain_model_teaserinfoposition', 'EXT:ws_products/Resources/Private/Language/locallang_csh_tx_wsproducts_domain_model_teaserinfoposition.xlf');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_wsproducts_domain_model_teaserinfoposition');
$GLOBALS['TCA']['tx_wsproducts_domain_model_teaserinfoposition'] = array(
	'ctrl' => array(
		'title'	=> 'LLL:EXT:ws_products/Resources/Private/Language/locallang_db.xlf:tx_wsproducts_domain_model_teaserinfoposition',
		'label' => 'teaser_info',
		'label_alt' => 'teaser_info_position_x,teaser_info_position_y',
		'label_alt_force' => 1,
		'tstamp' => 'tstamp',
		'crdate' => 'crdate',
		'cruser_id' => 'cruser_id',
		'dividers2tabs' => TRUE,

		'versioningWS' => 2,
		'versioning_followPages' => TRUE,

		'languageField' => 'sys_language_uid',
		'transOrigPointerField' => 'l10n_parent',
		'transOrigDiffSourceField' => 'l10n_diffsource',
		'delete' => 'deleted',
		'enablecolumns' => array(
			'disabled' => 'hidden',
			'starttime' => 'starttime',
			'endtime' => 'endtime',
		),
		'searchFields' => 'teaser_info_position_x,teaser_info_position_y,teaser_info,',
		'dynamicConfigFile' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extPath($_EXTKEY) . 'Configuration/TCA/TeaserInfoPosition.php',
		'iconfile' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extRelPath($_EXTKEY) . 'Resources/Public/Icons/tx_wsproducts_domain_model_teaserinfoposition.gif'
	),
);

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_wsproducts_domain_model_applicationdescription', 'EXT:ws_products/Resources/Private/Language/locallang_csh_tx_wsproducts_domain_model_applicationdescription.xlf');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_wsproducts_domain_model_applicationdescription');
$GLOBALS['TCA']['tx_wsproducts_domain_model_applicationdescription'] = array(
	'ctrl' => array(
		'title'	=> 'LLL:EXT:ws_products/Resources/Private/Language/locallang_db.xlf:tx_wsproducts_domain_model_applicationdescription',
		'label' => 'application_description_text',
		'tstamp' => 'tstamp',
		'crdate' => 'crdate',
		'cruser_id' => 'cruser_id',
		'dividers2tabs' => TRUE,

		'versioningWS' => 2,
		'versioning_followPages' => TRUE,

		'languageField' => 'sys_language_uid',
		'transOrigPointerField' => 'l10n_parent',
		'transOrigDiffSourceField' => 'l10n_diffsource',
		'delete' => 'deleted',
		'enablecolumns' => array(
			'disabled' => 'hidden',
			'starttime' => 'starttime',
			'endtime' => 'endtime',
		),
		'searchFields' => 'application_description_text,application,',
		'dynamicConfigFile' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extPath($_EXTKEY) . 'Configuration/TCA/ApplicationDescription.php',
		'iconfile' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extRelPath($_EXTKEY) . 'Resources/Public/Icons/tx_wsproducts_domain_model_applicationdescription.gif'
	),
);

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_wsproducts_domain_model_emailrequest', 'EXT:ws_products/Resources/Private/Language/locallang_csh_tx_wsproducts_domain_model_emailrequest.xlf');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_wsproducts_domain_model_emailrequest');
$GLOBALS['TCA']['tx_wsproducts_domain_model_emailrequest'] = array(
	'ctrl' => array(
		'title'	=> 'LLL:EXT:ws_products/Resources/Private/Language/locallang_db.xlf:tx_wsproducts_domain_model_emailrequest',
		'label' => 'e_mail_request_name',
		'tstamp' => 'tstamp',
		'crdate' => 'crdate',
		'cruser_id' => 'cruser_id',
		'dividers2tabs' => TRUE,

		'versioningWS' => 2,
		'versioning_followPages' => TRUE,

		'languageField' => 'sys_language_uid',
		'transOrigPointerField' => 'l10n_parent',
		'transOrigDiffSourceField' => 'l10n_diffsource',
		'delete' => 'deleted',
		'enablecolumns' => array(
			'disabled' => 'hidden',
			'starttime' => 'starttime',
			'endtime' => 'endtime',
		),
		'searchFields' => 'e_mail_request_name,e_mail_request_last_name,e_mail_request_mail_address,e_mail_request_company,e_mail_request_street_nr,e_mail_request_postal_code,e_mail_request_city,e_mail_request_phone,e_mail_request_fax,e_mail_request_message,e_mail_request_filter_x_m_l,product,',
		'dynamicConfigFile' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extPath($_EXTKEY) . 'Configuration/TCA/EMailRequest.php',
		'iconfile' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extRelPath($_EXTKEY) . 'Resources/Public/Icons/tx_wsproducts_domain_model_emailrequest.gif'
	),
);

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_wsproducts_domain_model_additionallink', 'EXT:ws_products/Resources/Private/Language/locallang_csh_tx_wsproducts_domain_model_additionallink.xlf');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_wsproducts_domain_model_additionallink');
$GLOBALS['TCA']['tx_wsproducts_domain_model_additionallink'] = array(
	'ctrl' => array(
		'title'	=> 'LLL:EXT:ws_products/Resources/Private/Language/locallang_db.xlf:tx_wsproducts_domain_model_additionallink',
		'label' => 'additional_link_name',
		'tstamp' => 'tstamp',
		'crdate' => 'crdate',
		'cruser_id' => 'cruser_id',
		'dividers2tabs' => TRUE,

		'versioningWS' => 2,
		'versioning_followPages' => TRUE,

		'languageField' => 'sys_language_uid',
		'transOrigPointerField' => 'l10n_parent',
		'transOrigDiffSourceField' => 'l10n_diffsource',
		'delete' => 'deleted',
		'enablecolumns' => array(
			'disabled' => 'hidden',
			'starttime' => 'starttime',
			'endtime' => 'endtime',
		),
		'searchFields' => 'additional_link_name,additional_link_icon,',
		'dynamicConfigFile' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extPath($_EXTKEY) . 'Configuration/TCA/AdditionalLink.php',
		'iconfile' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extRelPath($_EXTKEY) . 'Resources/Public/Icons/tx_wsproducts_domain_model_additionallink.gif'
	),
);

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_wsproducts_domain_model_additionallinkvalue', 'EXT:ws_products/Resources/Private/Language/locallang_csh_tx_wsproducts_domain_model_additionallinkvalue.xlf');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_wsproducts_domain_model_additionallinkvalue');
$GLOBALS['TCA']['tx_wsproducts_domain_model_additionallinkvalue'] = array(
	'ctrl' => array(
		'title'	=> 'LLL:EXT:ws_products/Resources/Private/Language/locallang_db.xlf:tx_wsproducts_domain_model_additionallinkvalue',
		'label' => 'additional_link_value_value',
		'tstamp' => 'tstamp',
		'crdate' => 'crdate',
		'cruser_id' => 'cruser_id',
		'dividers2tabs' => TRUE,

		'versioningWS' => 2,
		'versioning_followPages' => TRUE,

		'languageField' => 'sys_language_uid',
		'transOrigPointerField' => 'l10n_parent',
		'transOrigDiffSourceField' => 'l10n_diffsource',
		'delete' => 'deleted',
		'enablecolumns' => array(
			'disabled' => 'hidden',
			'starttime' => 'starttime',
			'endtime' => 'endtime',
		),
		'searchFields' => 'additional_link_value_value,additional_link_target_hash,additional_link_target,additional_link,',
		'dynamicConfigFile' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extPath($_EXTKEY) . 'Configuration/TCA/AdditionalLinkValue.php',
		'iconfile' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extRelPath($_EXTKEY) . 'Resources/Public/Icons/tx_wsproducts_domain_model_additionallinkvalue.gif'
	),
);

$extensionName = \TYPO3\CMS\Core\Utility\GeneralUtility::underscoredToUpperCamelCase($_EXTKEY);
$pluginSignature = strtolower($extensionName) . '_product';
$TCA['tt_content']['types']['list']['subtypes_addlist'][$pluginSignature] = 'pi_flexform';
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPiFlexFormValue($pluginSignature, 'FILE:EXT:'.$_EXTKEY.'/Configuration/FlexForms/filterview.xml');

