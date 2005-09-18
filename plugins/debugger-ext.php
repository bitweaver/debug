<?php
/** \file
 * $Header: /cvsroot/bitweaver/_bit_debug/plugins/debugger-ext.php,v 1.1 2005/09/18 12:06:08 wolff_borg Exp $
 *
 * \brief Base class for external debugger command
 *
 * \author zaufi <zaufi@sendmail.ru>
 *
 */
require_once (DEBUG_PKG_PATH.'plugins/debugger-common.php');

/**
 * \brief Base class for external debugger command
 */
class DebuggerCommand extends ResultType {
	/**
	 * \brief Must have function to announce command name in debugger console
	 *
	 * Assume interface extension if no name provided
	 */
	function name() {
		return '';
	}
	/**
	 * \brief Must have function to provide help to debugger console
	 *
	 * Used as title foe interface extentions
	 */
	function description() {
		return 'No help available for ' . $this->name();
	}

	/// \b Must have function to provide help to debugger console
	function syntax() {
		return $this->name();
	}

	/// \b Must have functio to show exampla of usage of given command
	function example() {
		return 'No example available for ' . $this->name();
	}

	/// Execute command with given set of arguments. Must return string of result.
	function execute($params) {
		return 'No result';
	}

	/// Say to debugger is this command need to draw some interface on console...
	function have_interface() {
		return false;
	}

	/// Return HTML code of our interface to debugger
	function draw_interface() {
		return '';
	}

	/// Function to return caption string to draw plugable tab in interface
	function caption() {
		return 'caption';
	}
}

// Also developer must provide factory function
// so debugger can create an instance of command handler
// It must be called 'dbg_command_factory_[your-cmd-name]'
// which is returns handler instance...

?>
