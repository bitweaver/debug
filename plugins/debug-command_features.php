<?php
/** 
 * @version $Header: /cvsroot/bitweaver/_bit_debug/plugins/debug-command_features.php,v 1.3 2008/06/19 06:59:45 lsces Exp $
 *
 * Show features state in a convenient way
 * 
 * @author zaufi <zaufi@sendmail.ru>
 * @package debug
 * @subpackage plugins
 */

/**
 * Initialize
 */
require_once (DEBUG_PKG_PATH.'plugins/debugger-ext.php');

/**
 * Debugger command to show features on/off state
 * @package debug
 */
class DbgFeatures extends DebuggerCommand {
	/// \b Must have function to announce command name in debugger console
	function name() {
		return 'features';
	}

	/// \b Must have function to provide help to debugger console
	function description() {
		return 'Show features on/off state';
	}

	/// \b Must have function to provide help to debugger console
	function syntax() {
		return 'features [partial-name]';
	}

	/// \b Must have function to show example of usage of given command
	function example() {
		return 'features' . "\n" . 'features wiki';
	}

	/// Execute command with given set of arguments.
	function execute($params) {
		$this->set_result_type(TPL_RESULT);

		$this->set_result_tpl('bitpackage:debug/debug_features.tpl');
		// Is regex to match against var name given?
		$p = explode(" ", trim($params));
		$mask = count($p) > 0 ? str_replace('$', '', trim($p[0])) : '';
		// Get list of all vars
		global $smarty;
		$tpl_vars = $smarty->get_template_vars();
		// convert to vector of names, filter permissions only, and sort
		$perms = array();
		$len = strlen($mask);

		foreach ($tpl_vars as $key => $val) {
			if ((!$len || $len && preg_match('/' . $mask . '/', $key)) && preg_match('/feature_/', $key))
				$perms[] = array(
					'name' => $key,
					'value' => $val
				);
		}

		return $perms;
	}
}

/// Class factory to create instances of defined commands
function dbg_command_factory_features() {
	return new DbgFeatures();
}

?>
