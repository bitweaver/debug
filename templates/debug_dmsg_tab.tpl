{* $Header$ *}

<table class="data">
	<caption>{tr}Page generation debugging log{/tr}</caption>
	{section name=i loop=$messages}
		<tr class="{cycle values="odd,even"}">
			<td>{$messages[i].timestamp|date_format:"%H:%M:%S"}</td>
			<td><pre style="padding:2px;">{$messages[i].msg|escape:"html"|wordwrap:90:"\n":true|replace:"\n":"<br />"}</pre></td>
		</tr>
	{/section}
</table>
