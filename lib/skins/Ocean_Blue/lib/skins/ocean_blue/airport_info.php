<!-- This addon was created by Stuart Boardman, with the help of Jeffrey Kobus, Adamm, Mark1Million & David Clark-->
<!-- Licensed under Creative Commons Attribution Non-commercial Share Alike, more info here: 
http://creativecommons.org/licenses/by-nc-sa/3.0/-->
<table width="100%" border="0" cellspacing="1" cellpadding="0" class="ocean_table">
	<tr>
	<td colspan="4"></td>
	</tr>
    <tr>
        <th>ICAO:</th>
        <td><?php echo $name->icao; ?></td>
        <th>Country:</th>
        <td><?php echo $name->country; ?></td>
    </tr>
    <tr>
        <th>Latitude:</th>
        <td><?php echo $name->lat; ?></td>
         <th>Longitude:</th>
        <td><?php echo $name->lng; ?></td>
    </tr>
    <tr>
        <th>Total Arrivals:</th>
    	<td><?php echo AirportData::getarrflights($name->icao); ?></td>

    	<th>Total Departures:</th>
    	<td><?php echo AirportData::getdeptflights($name->icao); ?></td>
    </tr>
    <?php $icao = $name->icao;
	$params = array(
           'depicao'   => $icao,
           'accepted'  => '1'
          );
	$pireps = PIREPData::findPIREPS($params, 1);
	$deppirep = $pireps[0];
	$params = array(
           'arricao'   => $icao,
           'accepted'  => '1'
          );
	$pireps = PIREPData::findPIREPS($params, 1);
	$arrpirep = $pireps[0];
	?>
<?php $initialdep = substr($deppirep->firstname,0,1); ?>
<?php $initialarr = substr($arrpirep->firstname,0,1); ?>
	<tr>
		<th>Latest Arrival:</th>
		<td><a href="<?php echo SITE_URL?>/index.php/pireps/viewreport/<?php echo $arrpirep->pirepid;?>"><?php echo $arrpirep->code.$arrpirep->flightnum.' ('.$arrpirep->depicao.'-'.$arrpirep->arricao.')</a>&nbsp;'.$arrpirep->firstname.'. '.$arrpirep->lastname?></td>
		<th>Latest Departure:</th>
		<td><a href="<?php echo SITE_URL?>/index.php/pireps/viewreport/<?php echo $deppirep->pirepid;?>"><?php echo $deppirep->code.$deppirep->flightnum.' ('.$deppirep->depicao.'-'.$deppirep->arricao.')</a>&nbsp;'.$deppirep->firstname.'. '.$deppirep->lastname?></td>
	</tr>
    <tr>
        <td class="apthead" colspan="4"></td>
    </tr>
    <tr>
    	<td colspan="4"><a target="_blank" href="<?php echo $name->chartlink;?>"></a></td>
    </tr>
</table>
<script type="text/javascript" src="<?php echo fileurl('/lib/js/acarsmap.js');?>"></script>
<br />
<h3><?php echo $name->name;?></h3>
<script type="text/javascript">

      function initialize() {
        var mapDiv = document.getElementById('map-canvas');
        var map = new google.maps.Map(mapDiv, {
          center: new google.maps.LatLng(<?php echo $name->lat; ?> , <?php echo $name->lng; ?> ),
          zoom: 14,
          mapTypeId: google.maps.MapTypeId.SATELLITE
        });
      }
      

      google.maps.event.addDomListener(window, 'load', initialize);
    </script>
    <div id="map-canvas" style="width: 100%; height: 500px"></div>