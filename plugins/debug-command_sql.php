<?php
/** \file
 * $Header: /cvsroot/bitweaver/_bit_debug/plugins/debug-command_sql.php,v 1.4 2006/02/01 19:45:29 spiderr Exp $
 *
 * \brief Exec SQL query on Tiki DB
 *
 * \author zaufi <zaufi@sendmail.ru>
 *
 */
require_once (DEBUG_PKG_PATH.'plugins/debugger-ext.php');

/**
 * \brief Debugger command to exec SQL
 */
class DbgSQLQuery extends DebuggerCommand {
	/// \b Must have function to announce command name in debugger console
	function name() {
		return 'sql';
	}

	/// \b Must have function to provide help to debugger console
	function description() {
		return 'Execute SQL statements on your database. For security reasons, this has been restricted to SELECT statements.';
	}

	/// \b Must have function to provide help to debugger console
	function syntax() {
		return 'sql [sql-query]';
	}

	/// \b Must have function to show example of usage of given command
	function example() {
		return 'sql SELECT * FROM kernel_prefs';
	}

	/// Execute command with given set of arguments.
	function execute($params) {
		//
		// FUCK! Due limitations of STUPID Smarty I forced to use 
		// HTML_RESULT... DAMN!
		//
		$this->set_result_type(HTML_RESULT);

		$this->set_result_tpl('bitpackage:debug/debug_sql.tpl');
		// Init result
		$result = '';
		//
		global $debugger;
		$debugger->msg('SQL query: "' . $params . '"');

		//
		vd($params);
		if( preg_match( "/^select/i", trim( $params ) ) ) {
			global $gBitDb;

			$qr = $gBitDb->mDb->query($params);

			if (!$qr)
				$result = '<span class="dbgerror">' . $gBitDb->mDb->ErrorMsg(). '</span>';
			else {
				// Check if result value an array or smth else
				if (is_object($qr)) {
					// Looks like 'SELECT...' return table to us...
					// So our result will be 2 dimentional array
					// with elements count and fields number for element
					// as dimensions...
					$first_time = true;

					$result  = '<table id="data">';
					$result .= '<caption>SQL Results</caption>';

					while ($res = $qr->fetchRow()) {
						if ($first_time) {
							// Form 1st element with field names
							foreach ($res as $key => $val)
								$result .= '<td class="heading">' . $key . '</td>';

							$first_time = false;
						}

						$result .= '<tr>';
						// Repack one element into result array
						$td_eo_class = true;

						foreach ($res as $val) {
							$result .= '<td class=' . ($td_eo_class ? "even" : "odd") . '>' . $val . '</td>';

							$td_eo_class = !$td_eo_class;
						}

						//
						$result .= '</tr>';
					}

					$result .= '</table>';
				} else {
					// Let PHP to dump result :)
					$result = 'Query result: ' . print_r($qr, true);
				}
			}
		} else
			$result = "Empty query to tiki DB";

		//
		return $result;
	}
}

/// Class factory to create instances of defined commands
function dbg_command_factory_sql() {
	return new DbgSQLQuery();
}

?>
