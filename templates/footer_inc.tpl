{if $gBitSystem->isFeatureActive( 'feature_debug_console' ) and $gBitUser->hasPermission( 'bit_p_debug_console' )}
	{include file="bitpackage:debug/debug_console.tpl"}
{/if}
