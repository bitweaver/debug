{* $Header: /cvsroot/bitweaver/_bit_debug/templates/Attic/debug_tikitables.tpl,v 1.1.2.1 2005/09/18 12:59:39 wolff_borg Exp $ *}
{* Show Tiki tables *}

{if count($command_result) > 0} {* Can it be == 0 ?? *}
<table  id="tikitables">
<caption>Tables in Tiki DB</caption>
{section name=i loop=$command_result}
  {* make row new start *}
  {if ($smarty.section.i.index % 3) == 0}
    <tr>
  {/if}

  <td> {$command_result[i]} </td>

  {if ($smarty.section.i.index % 3) == 2}
    </tr>
  {/if}
{/section}

{* Close <TR> if still opened... *}
{if $smarty.section.i.index % 3}
  </tr>
{/if}

</table>
<small>Total {$smarty.section.i.total} tables matched</small>

{/if}{* if count($command_result) > 0 *}
