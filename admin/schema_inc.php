<?php


$gBitInstaller->registerPackageInfo( DEBUG_PKG_NAME, array(
	'description' => "DEBUG allows general debugging of Bitweaver.",
	'license' => '<a href="http://www.gnu.org/licenses/licenses.html#LGPL">LGPL</a>',
	'version' => '0.1',
	'state' => 'beta',
	'dependencies' => '',
) );


// ### Default UserPermissions
$gBitInstaller->registerUserPermissions( DEBUG_PKG_NAME, array(
	array('bit_p_debug_console', 'Can use the DEBUG console', 'admin', DEBUG_PKG_NAME),
) );

// ### Default Preferences
$gBitInstaller->registerPreferences( DEBUG_PKG_NAME, array(
	array('debug','feature_debug_console','y'),
) );



?>
