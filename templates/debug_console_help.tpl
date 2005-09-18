{* $Header: /cvsroot/bitweaver/_bit_debug/templates/debug_console_help.tpl,v 1.1 2005/09/18 12:06:08 wolff_borg Exp $ *}
{* Show help for debugger commands *}

{if $command_result.action eq 'one'}

  {* Show help about single command *}
  <table border="0">
   <tr>
    <td width="15%"><code>{$command_result.name}</code></td>
    <td>{$command_result.description} </td>
   </tr>
   <tr><td><br /></td></tr>
   <tr>
    <td></td>
    <td> {tr}Syntax{/tr}: <pre>{$command_result.syntax}</pre> </td>
   </tr>
   <tr><td><br /></td></tr>
   <tr>
    <td></td>
    <td> {tr}Example{/tr}: <pre>{$command_result.example}</pre>  </td>
   </tr>
  </table>

{elseif $command_result.action eq 'list'}

  {* Show help for all available commands. There is any time at 
     least one command present: 'help' -- its appended by debugger itself
   *}
  <table border="0">
    {section name=i loop=$command_result[0]}
      <tr>
	<td width="15%"><code>{$command_result[0][i].cmd}</code></td>
	<td>{$command_result[0][i].description}</td>
      </tr>
    {/section}
  </table>
{/if}
