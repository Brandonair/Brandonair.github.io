<br />
<table width="100%" border="0" cellspacing="0" cellpadding="0" class="ocean_table">
<thead>
<tr>
	<th>Rank Title</th>
    <th>Minimum Hours</th>
	<th>Rank Image</th>
	<th>Total Pilots</th>
	</tr>
</thead>
<tbody>
<?php
foreach($ranks as $rank)
{
?>
<tr id="row<?php echo $rank->rankid;?>">
	<td align="center"><?php echo $rank->rank; ?></td>
    <td align="center"><?php echo $rank->minhours; ?></td>

	<td align="center"><img src="<?php echo $rank->rankimage; ?>"width="80"height="31" /></td>
	<td align="center"><?php echo $rank->totalpilots; ?></td>
	</tr>
<?php
}
?>
</tbody>
</table>