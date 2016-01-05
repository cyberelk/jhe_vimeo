<?php
if (!defined('TYPO3_MODE')) {
	die ('Access denied.');
}

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
	'Jhe.'. $_EXTKEY,
	'Pi1',
	array(
		'VideoList' => 'showVideoList',
	),
	// non-cacheable actions
	array(
		'VideoList' => '',
	)
);

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
	'Jhe.'. $_EXTKEY,
	'Pi2',
	array(
		'Video' => 'showSingleVideo',
	),
	// non-cacheable actions
	array(
		'Video' => '',
	)
);

?>