<?php
if (!defined ('TYPO3_MODE')) {
	die ('Access denied.');
}

$GLOBALS['TCA']['tx_wsproducts_domain_model_emailrequest'] = array(
	'ctrl' => $GLOBALS['TCA']['tx_wsproducts_domain_model_emailrequest']['ctrl'],
	'interface' => array(
		'showRecordFieldList' => 'sys_language_uid, l10n_parent, l10n_diffsource, hidden, e_mail_request_name, e_mail_request_last_name, e_mail_request_mail_address, e_mail_request_company, e_mail_request_street_nr, e_mail_request_postal_code, e_mail_request_city, e_mail_request_phone, e_mail_request_fax, e_mail_request_message, e_mail_request_filter_x_m_l, product',
	),
	'types' => array(
		'1' => array('showitem' => 'sys_language_uid;;;;1-1-1, l10n_parent, l10n_diffsource, hidden;;1, e_mail_request_name, e_mail_request_last_name, e_mail_request_mail_address, e_mail_request_company, e_mail_request_street_nr, e_mail_request_postal_code, e_mail_request_city, e_mail_request_phone, e_mail_request_fax, e_mail_request_message, e_mail_request_filter_x_m_l, product, --div--;LLL:EXT:cms/locallang_ttc.xlf:tabs.access, starttime, endtime'),
	),
	'palettes' => array(
		'1' => array('showitem' => ''),
	),
	'columns' => array(
	
		'sys_language_uid' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.language',
			'config' => array(
				'type' => 'select',
				'renderType' => 'selectSingle',
				'foreign_table' => 'sys_language',
				'foreign_table_where' => 'ORDER BY sys_language.title',
				'items' => array(
					array('LLL:EXT:lang/locallang_general.xlf:LGL.allLanguages', -1),
					array('LLL:EXT:lang/locallang_general.xlf:LGL.default_value', 0)
				),
			),
		),
		'l10n_parent' => array(
			'displayCond' => 'FIELD:sys_language_uid:>:0',
			'exclude' => 1,
			'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.l18n_parent',
			'config' => array(
				'type' => 'select',
				'renderType' => 'selectSingle',
				'items' => array(
					array('', 0),
				),
				'foreign_table' => 'tx_wsproducts_domain_model_emailrequest',
				'foreign_table_where' => 'AND tx_wsproducts_domain_model_emailrequest.pid=###CURRENT_PID### AND tx_wsproducts_domain_model_emailrequest.sys_language_uid IN (-1,0)',
			),
		),
		'l10n_diffsource' => array(
			'config' => array(
				'type' => 'passthrough',
			),
		),

		't3ver_label' => array(
			'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.versionLabel',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'max' => 255,
			)
		),
	
		'hidden' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.hidden',
			'config' => array(
				'type' => 'check',
			),
		),
		'starttime' => array(
			'exclude' => 1,
			'l10n_mode' => 'mergeIfNotBlank',
			'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.starttime',
			'config' => array(
				'type' => 'input',
				'size' => 13,
				'max' => 20,
				'eval' => 'datetime',
				'checkbox' => 0,
				'default' => 0,
				'range' => array(
					'lower' => mktime(0, 0, 0, date('m'), date('d'), date('Y'))
				),
			),
		),
		'endtime' => array(
			'exclude' => 1,
			'l10n_mode' => 'mergeIfNotBlank',
			'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.endtime',
			'config' => array(
				'type' => 'input',
				'size' => 13,
				'max' => 20,
				'eval' => 'datetime',
				'checkbox' => 0,
				'default' => 0,
				'range' => array(
					'lower' => mktime(0, 0, 0, date('m'), date('d'), date('Y'))
				),
			),
		),

		'e_mail_request_name' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:ws_products/Resources/Private/Language/locallang_db.xlf:tx_wsproducts_domain_model_emailrequest.e_mail_request_name',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim,required'
			),
		),
		'e_mail_request_last_name' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:ws_products/Resources/Private/Language/locallang_db.xlf:tx_wsproducts_domain_model_emailrequest.e_mail_request_last_name',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim,required'
			),
		),
		'e_mail_request_mail_address' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:ws_products/Resources/Private/Language/locallang_db.xlf:tx_wsproducts_domain_model_emailrequest.e_mail_request_mail_address',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim,required'
			),
		),
		'e_mail_request_company' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:ws_products/Resources/Private/Language/locallang_db.xlf:tx_wsproducts_domain_model_emailrequest.e_mail_request_company',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim'
			),
		),
		'e_mail_request_street_nr' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:ws_products/Resources/Private/Language/locallang_db.xlf:tx_wsproducts_domain_model_emailrequest.e_mail_request_street_nr',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim'
			),
		),
		'e_mail_request_postal_code' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:ws_products/Resources/Private/Language/locallang_db.xlf:tx_wsproducts_domain_model_emailrequest.e_mail_request_postal_code',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim'
			),
		),
		'e_mail_request_city' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:ws_products/Resources/Private/Language/locallang_db.xlf:tx_wsproducts_domain_model_emailrequest.e_mail_request_city',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim'
			),
		),
		'e_mail_request_phone' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:ws_products/Resources/Private/Language/locallang_db.xlf:tx_wsproducts_domain_model_emailrequest.e_mail_request_phone',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim'
			),
		),
		'e_mail_request_fax' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:ws_products/Resources/Private/Language/locallang_db.xlf:tx_wsproducts_domain_model_emailrequest.e_mail_request_fax',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim'
			),
		),
		'e_mail_request_message' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:ws_products/Resources/Private/Language/locallang_db.xlf:tx_wsproducts_domain_model_emailrequest.e_mail_request_message',
			'config' => array(
				'type' => 'text',
				'cols' => 40,
				'rows' => 15,
				'eval' => 'trim'
			)
		),
		'e_mail_request_filter_x_m_l' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:ws_products/Resources/Private/Language/locallang_db.xlf:tx_wsproducts_domain_model_emailrequest.e_mail_request_filter_x_m_l',
			'config' => array(
				'type' => 'text',
				'cols' => 40,
				'rows' => 15,
				'eval' => 'trim'
			)
		),
		'product' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:ws_products/Resources/Private/Language/locallang_db.xlf:tx_wsproducts_domain_model_emailrequest.product',
			'config' => array(
				'type' => 'inline',
				'foreign_table' => 'tx_wsproducts_domain_model_product',
				'foreign_field' => 'emailrequest',
				'maxitems'      => 9999,
				'appearance' => array(
					'collapseAll' => 0,
					'levelLinksPosition' => 'top',
					'showSynchronizationLink' => 1,
					'showPossibleLocalizationRecords' => 1,
					'showAllLocalizationLink' => 1
				),
			),

		),
		
	),
);
