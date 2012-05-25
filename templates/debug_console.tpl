{* $Header$ *}

{if $gBitUser->isAdmin() and $gBitSystem->isPackageActive( 'debug' )}
	<div class="debugconsole" id="debugconsole" style="position:absolute;background:#fed;top:30px;left:40%;right:1%;height:auto;z-index:2;padding:5px;border:3px solid #900;font-size:12px;{$debugconsole_style}">
		<a style="float:right;" href="javascript:toggle('debugconsole');" title="{tr}Close{/tr}">{biticon ipackage="icons" iname="window-close" iexplain=Close}</a>
		{form legend="Debugger Console"}
			<div class="row">
				{formlabel label="Current URL" for=""}
				{forminput}
					{$smarty.server.SCRIPT_NAME}
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

		{if ( count( $tabs ) > 1 )}
			{jstabs}
				{foreach item=tab from=$tabs}
					{jstab title=$tab.button_caption}
						{$tab.tab_code}
					{/jstab}
				{/foreach}
			{/jstabs}
		{else}
			{foreach item=tab from=$tabs}
				{$tab.tab_code}
			{/foreach}
		{/if}
	</div>
{/if}
