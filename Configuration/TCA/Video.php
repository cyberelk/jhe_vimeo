<?php
if (!defined ('TYPO3_MODE')) {
	die ('Access denied.');
}

$TCA['tx_jhevimeo_domain_model_video'] = array(
	'ctrl' => $TCA['tx_jhevimeo_domain_model_video']['ctrl'],
	'interface' => array(
		'showRecordFieldList' => 'sys_language_uid, l10n_parent, l10n_diffsource, hidden, vimeoid, width, height, title, description, video_lists',
	),
	'types' => array(
		'1' => array('showitem' => 'sys_language_uid;;;;1-1-1, l10n_parent, l10n_diffsource, hidden;;1, vimeoid, width, height, title, description, video_lists,--div--;LLL:EXT:cms/locallang_ttc.xml:tabs.access,starttime, endtime'),
	),
	'palettes' => array(
		'1' => array('showitem' => ''),
	),
	'columns' => array(
		'sys_language_uid' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:lang/locallang_general.xml:LGL.language',
			'config' => array(
				'type' => 'select',
				'foreign_table' => 'sys_language',
				'foreign_table_where' => 'ORDER BY sys_language.title',
				'items' => array(
					array('LLL:EXT:lang/locallang_general.xml:LGL.allLanguages', -1),
					array('LLL:EXT:lang/locallang_general.xml:LGL.default_value', 0)
				),
			),
		),
		'l10n_parent' => array(
			'displayCond' => 'FIELD:sys_language_uid:>:0',
			'exclude' => 1,
			'label' => 'LLL:EXT:lang/locallang_general.xml:LGL.l18n_parent',
			'config' => array(
				'type' => 'select',
				'items' => array(
					array('', 0),
				),
				'foreign_table' => 'tx_jhevimeo_domain_model_video',
				'foreign_table_where' => 'AND tx_jhevimeo_domain_model_video.pid=###CURRENT_PID### AND tx_jhevimeo_domain_model_video.sys_language_uid IN (-1,0)',
			),
		),
		'l10n_diffsource' => array(
			'config' => array(
				'type' => 'passthrough',
			),
		),
		't3ver_label' => array(
			'label' => 'LLL:EXT:lang/locallang_general.xml:LGL.versionLabel',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'max' => 255,
			)
		),
		'hidden' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:lang/locallang_general.xml:LGL.hidden',
			'config' => array(
				'type' => 'check',
			),
		),
		'starttime' => array(
			'exclude' => 1,
			'l10n_mode' => 'mergeIfNotBlank',
			'label' => 'LLL:EXT:lang/locallang_general.xml:LGL.starttime',
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
			'label' => 'LLL:EXT:lang/locallang_general.xml:LGL.endtime',
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
		'vimeoid' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:jhe_vimeo/Resources/Private/Language/locallang_db.xml:tx_jhevimeo_domain_model_video.vimeoid',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim,required'
			),
		),
		'width' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:jhe_vimeo/Resources/Private/Language/locallang_db.xml:tx_jhevimeo_domain_model_video.width',
			'config' => array(
				'type' => 'input',
				'size' => 4,
				'eval' => 'int,required'
			),
		),
		'height' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:jhe_vimeo/Resources/Private/Language/locallang_db.xml:tx_jhevimeo_domain_model_video.height',
			'config' => array(
				'type' => 'input',
				'size' => 4,
				'eval' => 'int'
			),
		),
		'title' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:jhe_vimeo/Resources/Private/Language/locallang_db.xml:tx_jhevimeo_domain_model_video.title',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim'
			),
		),
		'description' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:jhe_vimeo/Resources/Private/Language/locallang_db.xml:tx_jhevimeo_domain_model_video.description',
			'config' => array(
				'type' => 'text',
				'cols' => 40,
				'rows' => 15,
				'eval' => 'trim',
				'wizards' => array(
					'RTE' => array(
						'icon' => 'wizard_rte2.gif',
						'notNewRecords'=> 1,
						'RTEonly' => 1,
						'script' => 'wizard_rte.php',
						'title' => 'LLL:EXT:cms/locallang_ttc.xml:bodytext.W.RTE',
						'type' => 'script'
					)
				)
			),
			'defaultExtras' => 'richtext:rte_transform[flag=rte_enabled|mode=ts]',
		),
		'video_lists' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:jhe_vimeo/Resources/Private/Language/locallang_db.xml:tx_jhevimeo_domain_model_video.video_lists',
			'config' => array(
				'type' => 'select',
				'foreign_table' => 'tx_jhevimeo_domain_model_videolist',
				'MM' => 'tx_jhevimeo_video_videolist_mm',
				'MM_opposite_field' => 'videos',
				'size' => 10,
				'autoSizeMax' => 30,
				'maxitems' => 9999,
				'multiple' => 0,
				'wizards' => array(
					'_PADDING' => 1,
					'_VERTICAL' => 1,
					'edit' => array(
						'type' => 'popup',
						'title' => 'Edit',
						'script' => 'wizard_edit.php',
						'icon' => 'edit2.gif',
						'popup_onlyOpenIfSelected' => 1,
						'JSopenParams' => 'height=350,width=580,status=0,menubar=0,scrollbars=1',
						),
					'add' => Array(
						'type' => 'script',
						'title' => 'Create new',
						'icon' => 'add.gif',
						'params' => array(
							'table' => 'tx_jhevimeo_domain_model_videolist',
							'pid' => '###CURRENT_PID###',
							'setValue' => 'prepend'
							),
						'script' => 'wizard_add.php',
					),
				),
			),
		),
	),
);

?>