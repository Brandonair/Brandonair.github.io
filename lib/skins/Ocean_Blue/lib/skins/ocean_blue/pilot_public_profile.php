<?php

if(!$userinfo)
{
	echo '<h3>This pilot does not exist!</h3>';
	return;
}
?>
<style>.art-content .art-postcontent-0 .layout-item-0 { margin-bottom: 7px;  }
.art-content .art-postcontent-0 .layout-item-1 { border-style:Solid;border-width:2px;border-color:#E0E0E0; border-spacing: 5px 0px; border-collapse: separate;  }
.art-content .art-postcontent-0 .layout-item-2 { padding-right: 10px;padding-left: 10px;  }
.art-content .art-postcontent-0 .layout-item-3 { border-right-style:Solid;border-right-width:2px;border-right-color:#E0E0E0; padding-right: 10px;padding-left: 10px;  }
.art-content .art-postcontent-0 .layout-item-4 { margin-top: 7px;margin-bottom: 7px;  }
.art-content .art-postcontent-0 .layout-item-5 { border-style:Solid;border-width:2px;border-color:#E0E0E0;  }
.art-content .art-postcontent-0 .layout-item-6 { border-right-style:Solid;border-bottom-style:Solid;border-right-width:2px;border-bottom-width:2px;border-right-color:#E0E0E0;border-bottom-color:#E0E0E0; padding-right: 10px;padding-left: 10px;  }
.art-content .art-postcontent-0 .layout-item-7 { border-bottom-style:dotted;border-bottom-width:2px;border-bottom-color:#E0E0E0; padding-right: 10px;padding-left: 10px;  }
.art-content .art-postcontent-0 .layout-item-8 { border-right-style:dotted;border-right-width:2px;border-right-color:#E0E0E0; padding-right: 10px;padding-left: 10px;  }
.ie7 .art-post .art-layout-cell {border:none !important; padding:0 !important; }
.ie6 .art-post .art-layout-cell {border:none !important; padding:0 !important; }
</style>

<div id="art-main">
    <div class="art-sheet clearfix">


<div class="art-layout-wrapper">
<div class="art-content-layout">
<div class="art-content-layout-row">
<div class="art-layout-cell art-content"><article class="art-post art-article">
<div class="art-postcontent art-postcontent-0 clearfix">



<!-- Begin Avatar Box -->


<div class="art-content-layout-wrapper layout-item-4">
<div class="art-content-layout layout-item-5">
    <div class="art-content-layout-row">
    <div class="art-layout-cell layout-item-6" style="width: 66%" >
        <h3><?php echo $userinfo->firstname . ' ' . $userinfo->lastname; ?>'s Statistics</h3><ul>
<table width="100%" border="0" cellspacing="0" cellpadding="0" class="ocean_table">
<thead>
<th width="25%">Name</font></b></th>
<td width="25%"><?php echo $userinfo->firstname . ' ' . $userinfo->lastname; ?></td>

<th width="25%">Hours</font></b></th>
<td width="25%"><?php echo Util::AddTime($userinfo->totalhours, $userinfo->transferhours); ?></td>
</tr>
<tr>
<th width="25%">Pilot ID</font></b></th>
<td width="25%"><?php echo $pilotcode ?></td>

<th width="25%">Flights</font></b></th>
<td width="25%"><?php echo $userinfo->totalflights?></td>

</tr>
<tr>
<th width="25%">Rank</font></b></th>
<td width="25%"><?php echo $userinfo->rank;?></td>

<th width="25%">Last Flight</font></b></th>
<td width="25%"><?php
                        if ($userinfo->lastpirep == '0000-00-00 00:00:00') {
                                echo 'There are no flights!';
                        }
                        else {
                                $datebefore1 = substr($userinfo->lastpirep, 0, 10);
                                $datetoday2 = date("Y-m-d");
                                $datebefore3 = strtotime($datebefore1);
                                $datetoday4 = strtotime($datetoday2);
                                $newdate = $datetoday4-$datebefore3;
                                $lastpirep = floor($newdate/(60*60*24));
                                echo ' ';
                                        if ($lastpirep == 0) { echo 'Today'; }
                                        else if ($lastpirep == 1) { echo 'Yesterday'; }
                                        else {
                                                echo $lastpirep . ' Days ago';
                                        }
                                }                       ?></td>

</tr>
<tr>
<th width="25%">Hire Date:</font></b></th>
<td width="25%"><?php echo date('m/d/Y', strtotime($userinfo->joindate));?></td>

<th width="25%">Last Flight Date</font></b></th>
<td width="25%"><?php echo date('m/d/Y', strtotime($userinfo->lastpirep));?></td>

</tr>
</thead>
</tbody>
</table>

 <p>
<div class="status_box">
<a href="<?php echo url('/Pilots'); ?>" title="Pilots">View Crew List</a>
  </div>
  </p>

    </div><div class="art-layout-cell layout-item-7" style="width: 33%" >
        <h3><?php echo $userinfo->firstname . ' ' . $userinfo->lastname; ?></h3><ul>
	<center>
 <img src="<?php echo PilotData::getPilotAvatar($pilotcode); ?>"width="120"height="120"id="circle"/><br />
<img src="<?php echo $userinfo->rankimage?>"  alt="" />
</center>
</div>
    </div>
</div>
</div>

<!-- End Statistics Box -->







<!-- Begin Dashboard Box -->



<div class="art-content-layout-wrapper layout-item-4">
<div class="art-content-layout layout-item-5">
    <div class="art-content-layout-row">
    <div class="art-layout-cell layout-item-6" style="width: 100%" >
        <h3><?php echo $userinfo->firstname; ?>'s Awards</h3><ul>

         <table "width="100%"border="0">
         <tr>
                 <td style="border-color:#FFFFFF;">
		 <?php
                                 if(!$allawards)
                                 {
                                                 
                                 }
                                 else
                                 {
                        
                                                 /* To show the image:
                                                                 <img src="<?php echo $award->image?>" alt="<?php echo $award->descrip?>" />
                                                 */
                                                                                        
                                 ?>
                                 <?php foreach($allawards as $award){ ?>
                                 <img src="<?php echo $award->image?>" alt="<?php echo $award->name ?> - <?php echo $award->descrip?>" />
                                 <?php } ?>
                         <?php
                                 }
                                 ?></td>
                 </tr>
                 </table>




    </div>
    </div>
</div>
</div>


<!-- End Dashboard Box -->







</article></div>
                    </div>
                </div>
            </div>
	    

    </div>
</div>

</div>
