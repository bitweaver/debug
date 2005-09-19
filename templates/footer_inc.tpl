{strip}
{if $gBitUser->hasPermission( 'bit_p_debug_console' ) and $gBitSystem->isFeatureActive( 'feature_debug_console' )}
	{* Include debugging console. Note it should be processed as near as possible to the end of file *}
	{php}
		include_once( DEBUG_PKG_PATH.'debug_console.php' );
	{/php}
	{include file="bitpackage:debug/debug_console.tpl"}
{/if}
{/strip}
