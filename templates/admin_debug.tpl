{* $Header: /cvsroot/bitweaver/_bit_debug/templates/admin_debug.tpl,v 1.3 2006/03/01 20:16:06 spiderr Exp $ *}
{strip}
{form}
	<input type="hidden" name="page" value="{$page}" />
	{legend legend="Debug Settings"}
		{foreach from=$formDebugAdmin key=feature item=output}
			<div class="row">
				{formlabel label=`$output.label` for=$feature}
				{forminput}
					{html_checkboxes name="$feature" values="y" checked=`$gBitSystem->getConfig('')$feature` labels=false id=$feature}
					{formhelp note=`$output.note` page=`$output.page`}
				{/forminput}
			</div>
		{/foreach}
		<div class="row submit">
			<input type="submit" name="tikiTabSubmit" value="{tr}Change preferences{/tr}" />
		</div>
	{/legend}
{/form}
{/strip}
