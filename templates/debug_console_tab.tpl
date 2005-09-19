{* $Header: /cvsroot/bitweaver/_bit_debug/templates/debug_console_tab.tpl,v 1.2 2005/09/19 09:20:11 squareing Exp $ *}
{* Debug console tab -- to display result of command *}

{* Display command results if we have smth to show... *}
{if $result_type ne NO_RESULT}
	{legend legend="Console Output"}
		<pre style="padding:2px;">&gt;&nbsp;{$command|escape:"html"}</pre>

		{if $result_type == TEXT_RESULT }

			{* Show text in PRE section *}
			<pre style="padding:2px;">{strip}
				{$command_result|escape:"html"|wordwrap:90:"\n":true|replace:"\n":"<br />"}
			{/strip}</pre>

		{elseif $result_type == HTML_RESULT }

			{* Type HTML as is *}
			{$command_result}

		{elseif $result_type == TPL_RESULT && strlen($result_tpl) > 0}

			{* Result have its own template *}
			{include file=$result_tpl}

		{/if}{* Check result type *}
	{/legend}
{/if}{* We have smth to show as result *}
