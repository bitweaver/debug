{strip}
{if $gBitSystem->isPackageActive( 'debug' ) && $gBitUser->hasPermission( 'bit_p_debug_console' )}
	<ul>
		<li><a class="item" href="javascript:toggle('debugconsole');">{tr}Debugger console{/tr}</a></li>
		<li><a class="item" href="{$smarty.const.KERNEL_PKG_URL}admin/index.php?page=debug" title="{tr}Debug Settings{/tr}" >{tr}Debug Settings{/tr}</a></li>
	</ul>
{/if}
{/strip}
