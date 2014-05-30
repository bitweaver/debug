{* $Header$ *}
{strip}
{form}
	<input type="hidden" name="page" value="{$page}" />
	{legend legend="Debug Settings"}
		{foreach from=$formDebugAdmin key=feature item=output}
			<div class="form-group">
				{formlabel label=$output.label for=$feature}
				{forminput}
					{html_checkboxes name="$feature" values="y" checked=$gBitSystem->getConfig($feature) labels=false id=$feature}
					{formhelp note=$output.note page=$output.page}
				{/forminput}
			</div>
		{/foreach}
		<div class="form-group submit">
			<input type="submit" class="btn btn-default" name="tikiTabSubmit" value="{tr}Change preferences{/tr}" />
		</div>
	{/legend}
{/form}
{/strip}
