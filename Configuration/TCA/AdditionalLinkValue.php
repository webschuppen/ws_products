<?php
if (!defined ('TYPO3_MODE')) {
	die ('Access denied.');
}

$GLOBALS['TCA']['tx_wsproducts_domain_model_additionallinkvalue'] = array(
	'ctrl' => $GLOBALS['TCA']['tx_wsproducts_domain_model_additionallinkvalue']['ctrl'],
	'interface' => array(
		'showRecordFieldList' => 'sys_language_uid, l10n_parent, l10n_diffsource, hidden, additional_link_value_value, additional_link_target_hash, additional_link_target, additional_link',
	),
	'types' => array(
		'1' => array('showitem' => 'sys_language_uid;;;;1-1-1, l10n_parent, l10n_diffsource, hidden;;1, additional_link_value_value, additional_link_target_hash, additional_link_target, additional_link, --div--;LLL:EXT:cms/locallang_ttc.xlf:tabs.access, starttime, endtime'),
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
				'foreign_table' => 'tx_wsproducts_domain_model_additionallinkvalue',
				'foreign_table_where' => 'AND tx_wsproducts_domain_model_additionallinkvalue.pid=###CURRENT_PID### AND tx_wsproducts_domain_model_additionallinkvalue.sys_language_uid IN (-1,0)',
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

		'additional_link_value_value' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:ws_products/Resources/Private/Language/locallang_db.xlf:tx_wsproducts_domain_model_additionallinkvalue.additional_link_value_value',
			'config' => array(
                            'type' => 'input',
                            'size' => '15',
                            'max' => '256',
                            'eval' => 'trim',
                            'wizards' => array(
                                '_PADDING' => 2,
                                'link' => array(
                                    'type' => 'popup',
                                    'title' => 'LLL:EXT:cms/locallang_ttc.xml:header_link_formlabel',
                                    'icon' => 'link_popup.gif',
                                    //'script' => 'browse_links.php?mode=wizard',
									'module' => array(
										'name' => 'wizard_element_browser',
										'urlParameters' => array(
											'mode' => 'wizard',
										),
									),

									'JSopenParams' => 'height=300,width=500,status=0,menubar=0,scrollbars=1',
                                ),
                            ),
                            'softref' => 'typolink',
			),
		),
		'additional_link_target_hash' => array(
			'exclude' => 1,
			'label' => 'Link Anhang',
			'config' => array(
				'type' => 'input',
				'size' => 15,
				'eval' => 'trim'
			),
		),
		'additional_link_target' => array(
			'exclude' => 1,
			'label' => 'In neuen Fenster öffnen',
			'config' => array(
                            'type' => 'check',
                            'default' => '0'
			),
		),
		'additional_link' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:ws_products/Resources/Private/Language/locallang_db.xlf:tx_wsproducts_domain_model_additionallinkvalue.additional_link',
			'config' => array(
				'type' => 'select',
				'renderType' => 'selectSingle',
				'foreign_table' => 'tx_wsproducts_domain_model_additionallink',
				'minitems' => 0,
				'maxitems' => 1,
			),
		),
		
		'product' => array(
			'config' => array(
				'type' => 'passthrough',
			),
		),
	),
);
