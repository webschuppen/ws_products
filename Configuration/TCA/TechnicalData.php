<?php
if (!defined ('TYPO3_MODE')) {
	die ('Access denied.');
}

$GLOBALS['TCA']['tx_wsproducts_domain_model_technicaldata'] = array(
	'ctrl' => $GLOBALS['TCA']['tx_wsproducts_domain_model_technicaldata']['ctrl'],
	'interface' => array(
		'showRecordFieldList' => 'sys_language_uid, l10n_parent, l10n_diffsource, hidden, technical_data_name, only_backend, is_filter, application',
	),
	'types' => array(
		'1' => array('showitem' => 'sys_language_uid;;;;1-1-1, l10n_parent, l10n_diffsource, hidden;;1, technical_data_name, only_backend, is_filter, application, --div--;LLL:EXT:cms/locallang_ttc.xlf:tabs.access, starttime, endtime'),
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
				'foreign_table' => 'tx_wsproducts_domain_model_technicaldata',
				'foreign_table_where' => 'AND tx_wsproducts_domain_model_technicaldata.pid=###CURRENT_PID### AND tx_wsproducts_domain_model_technicaldata.sys_language_uid IN (-1,0)',
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

		'technical_data_name' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:ws_products/Resources/Private/Language/locallang_db.xlf:tx_wsproducts_domain_model_technicaldata.technical_data_name',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim,required'
			),
		),
		'only_backend' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:ws_products/Resources/Private/Language/locallang_db.xlf:tx_wsproducts_domain_model_technicaldata.only_backend',
			'config' => array(
				'type' => 'check',
				'default' => 0
			)
		),
		'is_filter' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:ws_products/Resources/Private/Language/locallang_db.xlf:tx_wsproducts_domain_model_technicaldata.is_filter',
			'config' => array(
				'type' => 'check',
				'default' => 0
			)
		),
		'application' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:ws_products/Resources/Private/Language/locallang_db.xlf:tx_wsproducts_domain_model_technicaldata.application',
			'config' => array(
				'type' => 'select',
				'renderType' => 'selectSingle',
				'foreign_table' => 'tx_wsproducts_domain_model_application',
				'minitems' => 0,
				'maxitems' => 1,
			),
		),
        'sorting' => array(
            'label' => 'sorting',
            'config' => array(
                'type' => 'passthrough'
            )
        ),

	),
);
