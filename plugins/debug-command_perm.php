<?php
/** \file
 * $Header: /cvsroot/bitweaver/_bit_debug/plugins/debug-command_perm.php,v 1.1.1.1.2.1 2005/09/18 12:59:38 wolff_borg Exp $
 *
 * \brief Show current permissions in a convenient way
 *
 * \author zaufi <zaufi@sendmail.ru>
 *
 */
require_once (DEBUG_PKG_PATH.'plugins/debugger-ext.php');

/**
 * \brief Show current permissions in a convenient way
 */
class DbgPermissions extends DebuggerCommand {
	/// \b Must have function to announce command name in debugger console
	function name() {
		return 'perm';
	}

	/// \b Must have function to provide help to debugger console
	function description() {
		return 'Show current permissions in a convenient way';
	}

	/// \b Must have function to provide help to debugger console
	function syntax() {
		return 'perm [partial-name]';
	}

	/// \b Must have function to show example of usage of given command
	function example() {
		return 'perm' . "\n" . 'perm admin' . "\n" . 'perm .*_comments$';
	}

	/// Execute command with given set of arguments.
	function execute($params) {
		$this->set_result_type(TPL_RESULT);

		$this->set_result_tpl('bitpackage:debug/debug_permissions.tpl');
		// Is regex to match against var name given?
		$p = explode(" ", trim($params));
		$mask = count($p) > 0 ? str_replace('$', '', trim($p[0])) : '';
		// Get descriptions for all permissions
		global $gBitUser;
		$pd = $gBitUser->mPerms;
		$descriptions = array();

		foreach ($pd['data'] as $p)
			$descriptions[$p['permName']] = $p['permDesc'];

		// convert to vector of names, filter permissions only
		$perms = array();
		$len = strlen($mask);

		foreach ($pd as $val) {
			if ((!$len || $len && preg_match('/' . $mask . '/', $val["perm_name"])))
				$perms[] = array(
					'name' => $val["perm_name"],
					'value' => $gBitUser->hasPermission($val["perm_name"]),
					'description' => isset($val["perm_desc"]) ? $val["perm_desc"] : 'No description'
				);
		}

		return $perms;
	}
}

/// Class factory to create instances of defined commands
function dbg_command_factory_perm() {
	return new DbgPermissions();
}

?>
