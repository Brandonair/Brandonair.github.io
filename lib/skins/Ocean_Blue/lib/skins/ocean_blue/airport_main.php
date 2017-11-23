<!-- This airport info table and it's functionality was created by Adamm, and modified by Stuart Boardman-->
<table id="mytable" width="100%" border="0" cellspacing="0" cellpadding="0" class="ocean_table">
<thead>  
<tr>
<th>ICAO</th>
<th>Airport Name</th>
<th>Airport Country</th>
</tr>
</thead>
<tbody>
<?php $allairports = OperationsData::GetAllAirports(); ?>
<?php foreach ($allairports as $airport) {?>
<tr>
<td><?php echo '<a href=" '.SITE_URL.'/index.php/airports/get_airport?icao='.$airport->icao.'">'.$airport->icao.'</a>';?></td>
<td><?php echo $airport->name; ?> </td>
<td><?php echo $airport->country; ?></td>
</tr>
<?php } ?>
</tbody>
</table>
<script type="text/javascript">
$(document).ready(function() {
    oTable = $('#mytable').dataTable({
        "bJQueryUI": true,
        "sPaginationType": "full_numbers"
    });
} );

</script>