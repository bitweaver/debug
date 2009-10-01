<?php
/** 
 * @version $Header: /cvsroot/bitweaver/_bit_debug/debug_console.php,v 1.4 2009/10/01 14:16:59 wjames5 Exp $
 *
 * Copyright (c) 2002-2005, Luis Argerich, Garland Foster, Eduardo Polidor, et. al.
 * All Rights Reserved. See below for details and a complete list of authors.
 * Licensed under the GNU LESSER GENERAL PUBLIC LICENSE. See http://www.gnu.org/copyleft/lesser.html for details.
 *
 * @author zaufi <zaufi@sendmail.ru>
 * @package debug
 * @subpackage functions
 */

/**
 * Initialize
 */
require_once ( DEBUG_PKG_PATH.'debugger.php');

// Set default value
$gBitSmarty->assign('result_type', NO_RESULT);

// Exec user command in internal debugger
if (isset($_REQUEST["command"])) {
	// Exec command in debugger
	$command_result = $debugger->execute($_REQUEST["command"]);

	$gBitSmarty->assign('command', $_REQUEST["command"]);
	$gBitSmarty->assign('result_type', $debugger->result_type());

	// If result need temlate then we have $command_result array...
	if ($debugger->result_type() == TPL_RESULT) {
		$gBitSmarty->assign('result_tpl', $debugger->result_tpl());

		$gBitSmarty->assign_by_ref('command_result', $command_result);
	} else
		$gBitSmarty->assign('command_result', $command_result);
} else {
	$gBitSmarty->assign('command', "");
}

// Draw tabs to array. Note that it MUST be AFTER exec command.
// Bcouse 'exec' can change state of smth so tabs content should be changed...
$tabs_list = $debugger->background_tabs_draw();
// Add results tab which is always exists...
$tabs_list["console"] = $gBitSmarty->fetch("bitpackage:debug/debug_console_tab.tpl");
ksort ($tabs_list);
$tabs = array();

// TODO: Use stupid dbl loop to generate links code and divs,
//       but it is quite suitable for
foreach ($tabs_list as $tname => $tcode) {
	// Generate href code for current button
	$href = 'javascript:';

	foreach ($tabs_list as $tn => $t)
		$href .= (($tn == $tname) ? 'show' : 'hide') . "('" . md5($tn). "');";

	//
	$tabs[] = array(
		"button_caption" => $tname,
		"tab_id" => md5($tname),
		"button_href" => $href,
		"tab_code" => $tcode
	);
}

$gBitSmarty->assign_by_ref('tabs', $tabs);

?>
