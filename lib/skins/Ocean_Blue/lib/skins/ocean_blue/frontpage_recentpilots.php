<table class="ocean_table"width="100%" cellspacing="0" cellpadding="1px">

 <tbody>
<?php

foreach($pilots as $pilot)
{
?>

<tr>
	<td><a href="<?php echo url('/profile/view/'.$pilot->pilotid);?>"><?php echo PilotData::GetPilotCode($pilot->code, $pilot->pilotid);?> <a href="<?php echo url('/profile/view/'.$pilot->pilotid);?>"><b><?php echo $pilot->firstname . ' ' . $pilot->lastname?></b></a>
	</td>
	<td>
<img src="<?php echo SITE_URL;?>/lib/images/countries/<?php echo strtolower($pilot->location);?>.png" alt="" />
</td>
</tr>
<?php
}
?>
 </tbody>
</table>