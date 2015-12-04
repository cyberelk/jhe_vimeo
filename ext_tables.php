<?php
if (!defined('TYPO3_MODE')) {
	die ('Access denied.');
}

Tx_Extbase_Utility_Extension::registerPlugin(
	$_EXTKEY,
	'Pi1',
	'Video list'
);

Tx_Extbase_Utility_Extension::registerPlugin(
	$_EXTKEY,
	'Pi2',
	'Single video'
);

t3lib_extMgm::addStaticFile($_EXTKEY, 'Configuration/TypoScript', 'Vimeo');

t3lib_extMgm::addLLrefForTCAdescr('tx_jhevimeo_domain_model_video', 'EXT:jhe_vimeo/Resources/Private/Language/locallang_csh_tx_jhevimeo_domain_model_video.xml');
t3lib_extMgm::allowTableOnStandardPages('tx_jhevimeo_domain_model_video');
$TCA['tx_jhevimeo_domain_model_video'] = array(
	'ctrl' => array(
		'title'	=> 'LLL:EXT:jhe_vimeo/Resources/Private/Language/locallang_db.xml:tx_jhevimeo_domain_model_video',
		'label' => 'title',
		'tstamp' => 'tstamp',
		'crdate' => 'crdate',
		'cruser_id' => 'cruser_id',
		'dividers2tabs' => TRUE,
		'sortby' => 'sorting',
		'versioningWS' => 2,
		'versioning_followPages' => TRUE,
		'origUid' => 't3_origuid',
		'languageField' => 'sys_language_uid',
		'transOrigPointerField' => 'l10n_parent',
		'transOrigDiffSourceField' => 'l10n_diffsource',
		'delete' => 'deleted',
		'enablecolumns' => array(
			'disabled' => 'hidden',
			'starttime' => 'starttime',
			'endtime' => 'endtime',
		),
		'searchFields' => 'vimeoid,width,height,title,description,video_lists,',
		'dynamicConfigFile' => t3lib_extMgm::extPath($_EXTKEY) . 'Configuration/TCA/Video.php',
		'iconfile' => t3lib_extMgm::extRelPath($_EXTKEY) . 'Resources/Public/Icons/tx_jhevimeo_domain_model_video.gif'
	),
);

t3lib_extMgm::addLLrefForTCAdescr('tx_jhevimeo_domain_model_videolist', 'EXT:jhe_vimeo/Resources/Private/Language/locallang_csh_tx_jhevimeo_domain_model_videolist.xml');
t3lib_extMgm::allowTableOnStandardPages('tx_jhevimeo_domain_model_videolist');
$TCA['tx_jhevimeo_domain_model_videolist'] = array(
	'ctrl' => array(
		'title'	=> 'LLL:EXT:jhe_vimeo/Resources/Private/Language/locallang_db.xml:tx_jhevimeo_domain_model_videolist',
		'label' => 'title',
		'tstamp' => 'tstamp',
		'crdate' => 'crdate',
		'cruser_id' => 'cruser_id',
		'dividers2tabs' => TRUE,
		'sortby' => 'sorting',
		'versioningWS' => 2,
		'versioning_followPages' => TRUE,
		'origUid' => 't3_origuid',
		'languageField' => 'sys_language_uid',
		'transOrigPointerField' => 'l10n_parent',
		'transOrigDiffSourceField' => 'l10n_diffsource',
		'delete' => 'deleted',
		'enablecolumns' => array(
			'disabled' => 'hidden',
			'starttime' => 'starttime',
			'endtime' => 'endtime',
		),
		'searchFields' => 'title,description,videos,',
		'dynamicConfigFile' => t3lib_extMgm::extPath($_EXTKEY) . 'Configuration/TCA/VideoList.php',
		'iconfile' => t3lib_extMgm::extRelPath($_EXTKEY) . 'Resources/Public/Icons/tx_jhevimeo_domain_model_videolist.gif'
	),
);


$extensionName = strtolower(t3lib_div::underscoredToUpperCamelCase($_EXTKEY));
$pluginName = strtolower('Pi2');
$pluginSignature = $extensionName.'_'.$pluginName;
$TCA['tt_content']['types']['list']['subtypes_excludelist'][$pluginSignature] = 'layout,select_key,pages,recursive';
$TCA['tt_content']['types']['list']['subtypes_addlist'][$pluginSignature] = 'pi_flexform';
t3lib_extMgm::addPiFlexFormValue($pluginSignature, 'FILE:EXT:'.$_EXTKEY . '/Configuration/Flexform/Video.xml');

$extensionName = strtolower(t3lib_div::underscoredToUpperCamelCase($_EXTKEY));
$pluginName = strtolower('Pi1');
$pluginSignature = $extensionName.'_'.$pluginName;
$TCA['tt_content']['types']['list']['subtypes_excludelist'][$pluginSignature] = 'layout,select_key,pages,recursive';
$TCA['tt_content']['types']['list']['subtypes_addlist'][$pluginSignature] = 'pi_flexform';
t3lib_extMgm::addPiFlexFormValue($pluginSignature, 'FILE:EXT:'.$_EXTKEY . '/Configuration/Flexform/VideoList.xml');
?>