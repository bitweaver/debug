{* $Header: /cvsroot/bitweaver/_bit_debug/templates/debug_console_help.tpl,v 1.2 2005/09/19 09:20:11 squareing Exp $ *}
{strip}
{if $command_result.action eq 'one'}
	<dl>
		<dt>{$command_result.name}</dt>
		<dd>{$command_result.description}</dd>
		<dt>{tr}Syntax{/tr}</dt>
		<dd>{$command_result.syntax}</dd>
		<dt>{tr}Example{/tr}</dt>
		<dd>{$command_result.example}</dd>
	</dl>
{elseif $command_result.action eq 'list'}
	<dl>
		{section name=i loop=$command_result[0]}
			<dt>{$command_result[0][i].cmd}</dt>
			<dd>{$command_result[0][i].description}</dd>
		{/section}
	</dl>
{/if}
{/strip}
