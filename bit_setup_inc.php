<?php
global $gBitSystem;
$gBitSystem->registerPackage( 'debug', dirname( __FILE__ ).'/' );

if( $gBitSystem->isPackageActive( 'debug' ) && $gBitUser->isAdmin() ) {
	// Debug console open/close
	$gBitSmarty->assign('debugconsole_style', isset($_COOKIE["debugconsole"]) && ($_COOKIE["debugconsole"] == 'o') ? 'display:block;' : 'display:none;');
	include_once( DEBUG_PKG_PATH.'debug_console.php' );
}
?>
