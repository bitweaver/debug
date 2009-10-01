<?php

// $Header: /cvsroot/bitweaver/_bit_debug/admin/admin_include_debug.php,v 1.3 2009/10/01 14:16:59 wjames5 Exp $

// Copyright (c) 2002-2003, Luis Argerich, Garland Foster, Eduardo Polidor, et. al.
// All Rights Reserved. See below for details and a complete list of authors.
// Licensed under the GNU LESSER GENERAL PUBLIC LICENSE. See http://www.gnu.org/copyleft/lesser.html for details.
$features_toggles = array(
	"feature_debug_console",
);

// Process Debug form(s)
if (isset($_REQUEST["debug"])) {
	
	foreach ($features_toggles as $toggle) {
		simple_set_toggle ($toggle);
	}
}

?>
