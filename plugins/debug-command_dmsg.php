<?php
/** \file
 * $Header: /cvsroot/bitweaver/_bit_debug/plugins/debug-command_dmsg.php,v 1.1 2005/09/18 12:06:08 wolff_borg Exp $
 *
 * \brief 'debugger command' to show user messages in tab
 *
 * \author zaufi <zaufi@sendmail.ru>
 *
 */
require_once (DEBUG_PKG_PATH.'plugins/debugger-ext.php');

global $debugger;
require_once (DEBUG_PKG_PATH.'debugger.php');

/**
 * \brief Command 'watch'
 */
class DbgCmd_DebugMessages extends DebuggerCommand {
	/// Function to create interface part of command: return ["button name"] = <html code>
	function draw_interface() {
		global $smarty;

		global $debugger;
		$smarty->assign_by_ref('messages', $debugger->dmsgs);
		return $smarty->fetch("bitpackage:debug/debug_dmsg_tab.tpl");
	}

	/// Function to return caption string to draw plugable tab in interface
	function caption() {
		return "debug messages";
	}

	/// Need to display button if we have smth to show
	function have_interface() {
		global $debugger;

		// At least one message is always exists ... It is debugger itself say that started :)
		return count($debugger->dmsgs) > 1;
	}
}

/// Class factory
function dbg_command_factory_dmsg() {
	return new DbgCmd_DebugMessages();
}

?>
