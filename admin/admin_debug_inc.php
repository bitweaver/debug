<?php

// $Header: /cvsroot/bitweaver/_bit_debug/admin/admin_debug_inc.php,v 1.3 2009/10/01 14:16:59 wjames5 Exp $

// Copyright (c) 2002-2003, Luis Argerich, Garland Foster, Eduardo Polidor, et. al.
// All Rights Reserved. See below for details and a complete list of authors.
// Licensed under the GNU LESSER GENERAL PUBLIC LICENSE. See http://www.gnu.org/copyleft/lesser.html for details.

//This doen't scale very well when you have 1000's of users

$formDebugAdmin['feature_debug_console'] = array(
			'label' => 'Debug Console',
			'note' => 'Helps you Debug bitweaver',
			'page' => 'DebugConsole',
		);
$gBitSmarty->assign( 'formDebugAdmin',$formDebugAdmin );

$processForm = set_tab();

if( $processForm ) {
	$featureToggles = array_merge( $formDebugAdmin );
	foreach( array_keys( $featureToggles ) as $item ) {
		simple_set_toggle( $item );
	}
}

$gBitSystem->setHelpInfo('Debug','Settings','Help with the debug settings');


?>
