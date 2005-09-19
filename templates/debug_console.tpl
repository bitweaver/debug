{* $Header: /cvsroot/bitweaver/_bit_debug/templates/debug_console.tpl,v 1.2 2005/09/19 09:20:11 squareing Exp $ *}

{if $gBitUser->hasPermission( 'bit_p_debug_console' ) and $gBitSystem->isFeatureActive( 'feature_debug_console' )}
	<div class="debugconsole" id="debugconsole" style="position:absolute;background:#fed;top:30px;left:40%;right:1%;height:auto;z-index:2;padding:5px;border:3px solid #900;font-size:12px;{$debugconsole_style}">
		<a style="float:right;" href="javascript:toggle('debugconsole');" title="{tr}Close{/tr}">{biticon ipackage=liberty iname=close iexplain=Close}</a>
		{form legend="Debugger Console"}
			<div class="row">
				{formlabel label="Current URL" for=""}
				{forminput}
					{$smarty.server.PHP_SELF}
				{/forminput}
			</div>

			<div class="row">
				{formlabel label="Command" for="command"}
				{forminput}
					<input type="text" name="command" id="command" size="90" value="{$command|escape}" />
					{formhelp note="Type <strong>help</strong> to get list of available commands"}
				{/forminput}
			</div>

			<div class="row submit">
				<input type="submit" name="exec" value="{tr}Execute{/tr}" />
			</div>
		{/form}

		{jstabs}
			{foreach item=tab from=$tabs}
				{jstab title=$tab.button_caption}
					{$tab.tab_code}
				{/jstab}
			{/foreach}
		{/jstabs}
	</div>
{/if}
