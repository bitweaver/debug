{* $Header: /cvsroot/bitweaver/_bit_debug/templates/debug_console.tpl,v 1.1 2005/09/18 12:06:08 wolff_borg Exp $ *}

{if $gBitUser->hasPermission( 'bit_p_debug_console' ) and $gBitSystem->isFeatureActive( 'feature_debug_console' )}
<div class="debugconsole" id="debugconsole" style="position: absolute;background-color: white;top: 10px;left: 20px;right: 310px;height: auto;z-index: 2;padding: 5px;border: 6px ridge #996600;font-size: 12px;{$debugconsole_style}">

{* Command prompt form *}
<form method="post" action="{$smarty.server.PHP_SELF}">
<table class="other">
  <tr><td colspan="3" align="right">
    <b>{tr}Debugger Console{/tr}</b>
    <a href="javascript:toggle('debugconsole');" title="{tr}Close{/tr}"><small>[x]</small></a>
  </td></tr>
  <tr>
    <td><small>{tr}Current URL{/tr}:</small></td>
    <td>{$smarty.server.PHP_SELF}</td>
  </tr>
  <tr>
    <td>{tr}Command{/tr}:</td>
    <td><input type="text" name="command" size="90" value="{$command|escape:"html"}" /></td>
  </tr>
  <tr class="panelsubmitrow">
    <td colspan="2">
      <input type="submit" name="exec" value="{tr}exec{/tr}" /> &nbsp;&nbsp;&nbsp;&nbsp;
      <small>{tr}Type <code>help</code> to get list of available commands{/tr}</small>
    </td>
  </tr>
</table>
</form>

{* Generate tabs code if more than one tab, else make one div w/o button *}

{* 1) Buttons bar *}
{if count($tabs) > 1}
  <table><tr>
  {section name=i loop=$tabs}
    <td><a href="{$tabs[i].button_href}">{$tabs[i].button_caption}</a></div>
    </td>
  {/section}
  </tr></table>
{/if}

{* 2) Divs with tabs *}
{section name=i loop=$tabs}
<div class="debugger-tab" id="{$tabs[i].tab_id}" style="display:{if $tabs[i].button_caption == 'console'}block{else}none{/if};">
    {$tabs[i].tab_code}
</div><!-- Tab: {$tabs[i].tab_id} -->
{/section}

</div>
{/if}
