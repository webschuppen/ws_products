<?php
if (!defined('TYPO3_MODE')) {
	die('Access denied.');
}

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
	'Webschuppen.' . $_EXTKEY,
	'Product',
	array(
		'Product' => 'list, show, compare, ajaxcompare, ajaxlink',
        'EMailRequest' => 'new, create, success',
		
	),
	// non-cacheable actions
	array(
		'Product' => 'compare, ajaxcompare, ajaxlink',
        'EMailRequest' => 'create, new, success',
	)
);

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
	'Webschuppen.' . $_EXTKEY,
	'Category',
	array(
		'Category' => 'list',
		
	),
	// non-cacheable actions
	array(
		'Product' => '',
		'Attribute' => '',
		'Category' => '',
		'Application' => '',
		'EMailRequest' => 'create, new, success',
		
	)
);

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
	'Webschuppen.' . $_EXTKEY,
	'Attribute',
	array(
		'Attribute' => 'list',
		
	),
	// non-cacheable actions
	array(
		'Product' => '',
		'Attribute' => '',
		'Category' => '',
		'Application' => '',
		'EMailRequest' => 'create, new, success',
		
	)
);

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
	'Webschuppen.' . $_EXTKEY,
	'Application',
	array(
		'Application' => 'list',
		
	),
	// non-cacheable actions
	array(
		'Product' => '',
		'Attribute' => '',
		'Category' => '',
		'Application' => '',
		'EMailRequest' => 'create, new, success',
		
	)
);

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
	'Webschuppen.' . $_EXTKEY,
	'Emailrequest',
	array(
		'EMailRequest' => 'new, success',
		
	),
	// non-cacheable actions
	array(
		'Product' => '',
		'Attribute' => '',
		'Category' => '',
		'Application' => '',
		'EMailRequest' => 'create, new, success',
		
	)
);


// RealURL autoconfiguration
$GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['ext/realurl/class.tx_realurl_autoconfgen.php']['extensionConfiguration']['ws_products'] = 'EXT:ws_products/Configuration/class.tx_ws_products_realurl.php:tx_ws_products_realurl->addWsProductsConfig';
