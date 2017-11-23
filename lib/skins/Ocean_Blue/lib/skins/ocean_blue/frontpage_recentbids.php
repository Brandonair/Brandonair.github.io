
<table class="ocean_table" width="70%" cellspacing="0">
<?php
if(!$lastbids)
{
echo '<tr><td colspan="9">No booked flights!</td></tr>';
?>

<?php
}
else
foreach($lastbids as $lastbid)
{
$airp1 = OperationsData::getairportinfo($lastbid->depicao);
$airp2 = OperationsData::getairportinfo($lastbid->arricao);
?>
<tr style="padding:5px;">
<?php
$flightid = $lastbid->id
?>
<?php
$params = $lastbid->pilotid;
$airp1 = OperationsData::getairportinfo($lastbid->depicao);
$airp2 = OperationsData::getairportinfo($lastbid->arricao);
$pilot = PilotData::GetPilotData($params);
$pname = $pilot->firstname;
$psurname = $pilot->lastname;
$acrid = OperationsData::getAircraftByReg($lastbid->registration);
?>
<td width="30%" ><a href="<?php echo url('/profile/view/'.$pilot->pilotid);?>"><?php echo PilotData::GetPilotCode($pilot->code, $pilot->pilotid);?></a></td>
<td width="6%" align="left" ><span><?php echo '<a href=" '.SITE_URL.'/index.php/airports/get_airport?icao='.$lastbid->depicao.'">'.$lastbid->depicao.'</a>';?>-<?php echo '<a href=" '.SITE_URL.'/index.php/airports/get_airport?icao='.$lastbid->arricao.'">'.$lastbid->arricao.'</a>';?></span></td>
<td width="12%" align="left" ><a href="<?php echo SITE_URL?>/index.php/vFleetTracker/view/<?php echo '' . $lastbid->registration . ''; ?>"><?php echo $lastbid->registration; ?></a></td>
</tr>
<?php
}
?>
</table>


