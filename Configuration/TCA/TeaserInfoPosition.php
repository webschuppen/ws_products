<?php
if (!defined ('TYPO3_MODE')) {
	die ('Access denied.');
}

$GLOBALS['TCA']['tx_wsproducts_domain_model_teaserinfoposition'] = array(
	'ctrl' => $GLOBALS['TCA']['tx_wsproducts_domain_model_teaserinfoposition']['ctrl'],
	'interface' => array(
		'showRecordFieldList' => 'sys_language_uid, l10n_parent, l10n_diffsource, hidden, teaser_info_position_x, teaser_info_position_y, teaser_info',
	),
	'types' => array(
		'1' => array('showitem' => 'sys_language_uid;;;;1-1-1, l10n_parent, l10n_diffsource, hidden;;1, teaser_info_position_x, teaser_info_position_y, teaser_info, --div--;LLL:EXT:cms/locallang_ttc.xlf:tabs.access, starttime, endtime'),
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
				'foreign_table' => 'tx_wsproducts_domain_model_teaserinfoposition',
				'foreign_table_where' => 'AND tx_wsproducts_domain_model_teaserinfoposition.pid=###CURRENT_PID### AND tx_wsproducts_domain_model_teaserinfoposition.sys_language_uid IN (-1,0)',
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

		'teaser_info_position_x' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:ws_products/Resources/Private/Language/locallang_db.xlf:tx_wsproducts_domain_model_teaserinfoposition.teaser_info_position_x',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'double2'
			)
		),
		'teaser_info_position_y' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:ws_products/Resources/Private/Language/locallang_db.xlf:tx_wsproducts_domain_model_teaserinfoposition.teaser_info_position_y',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'double2'
			)
		),
		'teaser_info' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:ws_products/Resources/Private/Language/locallang_db.xlf:tx_wsproducts_domain_model_teaserinfoposition.teaser_info',
			'config' => array(
				'type' => 'select',
				'renderType' => 'selectSingle',
				'foreign_table' => 'tx_wsproducts_domain_model_teaserinfo',
				'foreign_table_where' => 'AND sys_language_uid = 0 ORDER BY data_name, teaser_info_name',
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
