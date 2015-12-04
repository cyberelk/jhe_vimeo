<?php
if (!defined('TYPO3_MODE')) {
	die ('Access denied.');
}

Tx_Extbase_Utility_Extension::configurePlugin(
	$_EXTKEY,
	'Pi1',
	array(
		'VideoList' => 'list, show, new, create, edit, update, delete',
	),
	// non-cacheable actions
	array(
		'VideoList' => 'create, update, delete',
	)
);

Tx_Extbase_Utility_Extension::configurePlugin(
	$_EXTKEY,
	'Pi2',
	array(
		'Video' => 'list, show, new, create, edit, update, delete',
	),
	// non-cacheable actions
	array(
		'Video' => 'create, update, delete',
	)
);

?>