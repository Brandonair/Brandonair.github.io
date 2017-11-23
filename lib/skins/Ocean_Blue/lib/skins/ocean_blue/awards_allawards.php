<br />
<table width="100%" border="0" cellspacing="0" cellpadding="0" class="ocean_table">
<thead>
<tr>
	<th>Award</th>
    <th>Description</th>
	<th>Image</th>
	</tr>
</thead>
<tbody>
<?php
foreach($awards as $aw)
{
?>
<tr id="row<?php echo $aw->awardid;?>">
	<td align="center"><?php echo $aw->name; ?></td>
    <td align="center"><?php echo $aw->descrip; ?></td>
	<td align="center"><img src="<?php echo $aw->image; ?>" /></td>
	</tr>
<?php
}
?>
</tbody>
</table>