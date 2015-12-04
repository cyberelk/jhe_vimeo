<?php
if (!defined('TYPO3_MODE')) {
	die ('Access denied.');
}

Tx_Extbase_Utility_Extension::configurePlugin(
	$_EXTKEY,
	'Pi1',
	array(
		'VideoList' => 'showVideoList',
	),
	// non-cacheable actions
	array(
		'VideoList' => '',
	)
);

Tx_Extbase_Utility_Extension::configurePlugin(
	$_EXTKEY,
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