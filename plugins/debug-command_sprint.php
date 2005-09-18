<?php
/** \file
 * $Header: /cvsroot/bitweaver/_bit_debug/plugins/debug-command_sprint.php,v 1.1.1.1.2.1 2005/09/18 12:59:38 wolff_borg Exp $
 *
 * \brief Print Smarty vars
 *
 * \author zaufi <zaufi@sendmail.ru>
 *
 */
require_once (DEBUG_PKG_PATH.'plugins/debugger-ext.php');

/**
 * \brief Debugger command to print smarty vars
 */
class DbgSPrint extends DebuggerCommand {
	/// \b Must have function to announce command name in debugger console
	function name() {
		return 'sprint';
	}

	/// \b Must have function to provide help to debugger console
	function description() {
		return 'Print Smarty variable';
	}

	/// \b Must have function to provide help to debugger console
	function syntax() {
		return 'sprint var1 var2 var3 ...';
	}

	/// \b Must have functio to show example of usage of given command
	function example() {
		return 'sprint user feature_left_column';
	}

	/// Execute command with given set of arguments.
	function execute($params) {
		global $gBitSmarty;

		$this->set_result_type(TEXT_RESULT);
		$result = '';
		$vars = explode(" ", $params);

		foreach ($vars as $v) {
			$v = trim(str_replace("$", "", $v));

			if (strlen($v) != 0) {
				$tmp = $gBitSmarty->get_template_vars();

				if (is_array($tmp) && isset($tmp[$v]))
					$result .= $v . ' = ' . print_r($tmp[$v], true). "\n";
				else
					$result .= 'Smarty variable "' . $v . '" not found';
			}
		}

		return $result;
	}
}

/// Class factory to create instances of defined commands
function dbg_command_factory_sprint() {
	return new DbgSPrint();
}

?>
