<?php
global $gBitSystem;
$registerHash = array(
	'package_name' => 'debug',
	'package_path' => dirname( __FILE__ ).'/',
);
$gBitSystem->registerPackage( $registerHash );

if( $gBitSystem->isPackageActive( 'debug' ) && $gBitUser->isAdmin() ) {
	// Debug console open/close
	$gBitSmarty->assign('debugconsole_style', isset($_COOKIE["debugconsole"]) && ($_COOKIE["debugconsole"] == 'o') ? 'display:block;' : 'display:none;');
	include_once( DEBUG_PKG_PATH.'debug_console.php' );
}
?>
