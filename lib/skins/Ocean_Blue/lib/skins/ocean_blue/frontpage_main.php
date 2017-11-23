<div class="art-layout-wrapper">
<div class="art-content-layout">
<div class="art-content-layout-row">


<!-- Begin Pilots Online -->

<?php
if(Auth::LoggedIn() == false)
{
?>
<div class="art-layout-cell art-sidebar1"><div class="art-block clearfix">
<div class="art-blockheader">
<h3 class="t">Demo Airways</h3>
</div>
<div class="art-blockcontent">
<?php
}
?>
<?php
if(!Auth::LoggedIn())
{
	// Show these if they haven't logged in yet
?>
<?php
}
else
{
	// Show these items only if they are logged in
?>
<div class="art-layout-cell art-sidebar1"><div class="art-block clearfix">
<div class="art-blockheader">
<h3 class="t">My Messages</h3>
</div>
<div class="art-blockcontent">
<?php
}
?>
<p>
<?php
if(Auth::LoggedIn() == false)
{
?>

<?php Template::Show('login_form.php'); ?>

<?php
}
?>
<?php
if(!Auth::LoggedIn())
{
	// Show these if they haven't logged in yet
?>
<?php
}
else
{
	// Show these items only if they are logged in
?>

<!-- Company Mail -->
<a href="<?php echo url('/Mail'); ?>" title="Dispatch"><?php MainController::Run('Mail', 'checkmail'); ?></a>
</blockquote>
<ul>
<a href="<?php echo url('/Mail'); ?>" title="File PIREP">Inbox</a></br>
<a href="<?php echo url('/Mail/newmail'); ?>" title="My Profile">Compose New</a></br>
<a href="<?php echo url('/Mail/newfolder'); ?>" title="My Pireps">Create Folder</a></br>
<a href="<?php echo url('/Mail/deletefolder'); ?>" title="Schedules">Delete Folder</a></br>
<a href="<?php echo url('/Mail/settings'); ?>" title="My Flights">Settings</a></br>
<a href="<?php echo url('/Mail/sent'); ?>" title="My Profile">Sent Messages</a></br>
</ul>
<!-- Company Mail -->
<?php
}
?>
</div>



<!-- End Pilots Online -->

</div>



<!-- Begin Pilots Online -->

<div class="art-block clearfix">
<div class="art-blockheader">
<h3 class="t">Pilots Online</h3>
</div>
<div class="art-blockcontent"><p>
<?php
$shown = array();
        echo "<table class=\"ocean_table\" width=\"100%\" cellspacing=\"0\" cellpadding=\"1px\">";
        foreach($usersonline as $pilot)
{
        if(in_array($pilot->pilotid, $shown))
                continue;
        else
                $shown[] = $pilot->pilotid;
        echo "<tr><td>{$pilot->firstname} {$pilot->lastname}</td>";
        echo '<td><img src="'.Countries::getCountryImage($pilot->location).'" alt="'.Countries::getCountryName($pilot->location).'"width="16:height="16"/></td></tr>';
}
       
	echo "</table>";

?>
    <center>
 <?php
 if(count($shown) < 1){
echo 'There are no pilots online!';
 }
?> 
</center>
</div>
</div>

<!-- End Pilots Online -->

<!-- Begin Newest Pilots -->

<div class="art-block clearfix">
<div class="art-blockheader">
<h3 class="t">Newest Pilots</h3>
</div>
<div class="art-blockcontent"><p><?php MainController::Run('Pilots', 'RecentFrontPage', 5); ?></p></div>
</div>

<!-- End Newest Pilots -->




<!-- Begin Recent Bids -->

<div class="art-block clearfix">
<div class="art-blockheader">
<h3 class="t">Latest Bids</h3>
</div>
<div class="art-blockcontent"><p><?php MainController::Run('FrontBids', 'RecentFrontPage', 5); ?></p></div>
</div>

<!-- End Recent Bids -->





<!--Begin Company Statistics -->

<div class="art-block clearfix">
<div class="art-blockheader">
<h3 class="t">Company Statistics</h3>
</div>
<div class="art-blockcontent">
<p>
<table width="100%" border="0" cellpadding="3" cellspacing="0"onMouseover="changeto(event, '#D0DFEC')" onMouseout="changeback(event, '#ffffff')"width="100%">
        <tr>
          <td>Pilots:</td>
          <td><font color="053077"><?php echo StatsData::PilotCount(); ?></td></font>
        </tr>
        <tr>
          <td>Hours:</td>
          <td><font color="053077"><?php echo number_format(StatsData::TotalHours(), 0); ?></td></font>
        </tr>
      
          <tr>
          <td>Flights:</td>
          <td><font color="053077"><?php echo number_format(StatsData::TotalFlights()); ?></td></font>
        </tr>
          <tr>
          <td>Flights Today:</td>
          <td><font color="053077"><?php echo StatsData::TotalFlightsToday(); ?></td></font>
        </tr>
          <td>Pilots In Flight:</td>
          <td><font color="053077"><?php echo count(ACARSData::GetACARSData());?></td></font>
        </tr>
        <tr>
          <td>PAX Carried:</td>
          <td><font color="053077"><?php echo number_format(StatsData::totalpaxcarried()); ?></td></font>
        </tr>
<tr>
          <td>Miles Flown:</td>
          <td><font color="053077"><?php echo number_format(StatsData::totalmilesflown()); ?></td></font>
        </tr>

<tr>
          <td>Aircraft:</td>
          <td><font color="053077"><?php echo StatsData::TotalAircraftInFleet(); ?></td></font>
        </tr>
<tr>
          <td>Schedules:</td>
          <td><font color="053077"><?php echo StatsData::TotalSchedules(); ?></td></font>
        </tr>
<tr>
          <td>News Items:</td>
          <td><font color="053077"><?php echo StatsData::TotalNewsItems(); ?></td></font>
        </tr>
<tr>
          <td>Recruitment Status:</td>
          <td><font color="088F0F">Open</td></a></font>
        </tr>


  </table>
<div class="status_box">
<script>
var montharray=new Array("Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sep","Oct","Nov","Dec")
function countup(yr,m,d){
var today=new Date()
var todayy=today.getYear()
if (todayy < 1000)
todayy+=1900
var todaym=today.getMonth()
var todayd=today.getDate()
var todaystring=montharray[todaym]+" "+todayd+", "+todayy
var paststring=montharray[m-1]+" "+d+", "+yr
var difference=(Math.round((Date.parse(todaystring)-Date.parse(paststring))/(24*60*60*1000))*1)
years=parseInt(difference/365)
difference=difference%365
difference+=" days"
document.write("It\'s been "+years+" years and "+difference+" since the launch of <?php echo SITE_NAME; ?>. We have been flying in the sky since October 6, 2015")
}
//enter the count up date using the format year/month/day
countup(2015,10,06)
</script>
</div>
</p>
</div>
</div>

<!-- End Company Statistics -->


<!-- Begin Partners Links -->

<div class="art-block clearfix">
<div class="art-blockheader">
<h3 class="t">Partners</h3>
</div>
<div class="art-blockcontent">
<p><a href="http://tfdidesign.com/" target="_blank"><img src="<?php echo SITE_URL?>/lib/skins/ocean_blue/images/content/partner_tfdi.png" width="150" height="46" alt="" " /></a></p>
<p><a href="http://www.simpilotgroup.com/" target="_blank"><img src="<?php echo SITE_URL?>/lib/skins/ocean_blue/images/content/partner_simpilotgroup2.png" width="150" height="30" alt="" " /></a></p>
<p><a href="http://fs-products.net/" target="_blank"><img src="<?php echo SITE_URL?>/lib/skins/ocean_blue/images/content/partner_fsproducts_small.png" width="150" height="35" alt="" " /></a></p>
<p><a href="http://php-mods.eu/site//" target="_blank"><img src="<?php echo SITE_URL?>/lib/skins/ocean_blue/images/content/partners_phpmods.png" width="137" height="40" alt="" " /></a></p>
<p><a href="http://www.crazycreatives.com/" target="_blank"><img src="<?php echo SITE_URL?>/lib/skins/ocean_blue/images/content/partner_crazy_creatives.png" width="137" height="40" alt="" " /></a></p>
<p><a href="http://www.vatsim.net/" target="_blank"><img src="<?php echo SITE_URL?>/lib/skins/ocean_blue/images/content/partner_vatsim.png" width="150" height="35" alt="" " /></a></p>
</div>
</div>
</div>
<div class="art-layout-cell art-content"><article class="art-post art-article">

<!-- End Partners Links -->




<!-- Begin Middle Content -->


<!-- Begin Company News -->  

<div class="art-postcontent art-postcontent-0 clearfix"><div class="art-content-layout-wrapper layout-item-0">
<div class="art-content-layout layout-item-1">
<div class="art-content-layout-row">
<div class="art-layout-cell layout-item-2" style="width: 100%" >
<div class="art-blockheader">
<h3 class="t">Company News</h3>
</div>

<p style="color: rgb(46, 59, 62);"><?php

	// Show the News module, call the function ShowNewsFront
	//	This is in the modules/Frontpage folder
	
	MainController::Run('News', 'ShowNewsFront', 1);
?>
</p>
</div>
</div>
</div>
</div>

<!-- End Company News -->


<!-- Begin Live Flights -->

<div class="art-postcontent art-postcontent-0 clearfix"><div class="art-content-layout-wrapper layout-item-0">
<div class="art-content-layout layout-item-1">
<div class="art-content-layout-row">
<div class="art-layout-cell layout-item-2" style="width: 100%" >
<div class="art-blockheader">
<h3 class="t">Live Flight Tracker</h3>
</div>

<p style="color: rgb(46, 59, 62);">
<?php Template::Show('frontpage_acars.php'); ?></p>
</div>
</div>
</div>
</div>
<!-- End Live Flights -->



<!-- Begin Latest Flights -->

<div class="art-postcontent art-postcontent-0 clearfix"><div class="art-content-layout-wrapper layout-item-0">
<div class="art-content-layout layout-item-1">
<div class="art-content-layout-row">
<div class="art-layout-cell layout-item-2" style="width: 100%" >
<div class="art-blockheader">
<h3 class="t">Latest Flights</h3>
</div>

<p style="color: rgb(46, 59, 62);">
<?php Template::Show('frontpage_reports.php'); ?> </p>
</div>
</div>
</div>
</div>
</div>
<!-- End Latest Flights -->

<!-- Begin Content 3 -->
<div class="art-postcontent art-postcontent-0 clearfix"><div class="art-content-layout-wrapper layout-item-0">
<div class="art-content-layout layout-item-1">
<div class="art-content-layout-row">
<div class="art-layout-cell layout-item-2" style="width: 100%" >
<div class="art-blockheader">
<h3 class="t">Content 3</h3>
</div>
<p style="color: rgb(46, 59, 62);">

Content 3 goes here
	

</p>
</div>
</div>
</div>
</div>
</div>
<!-- End Content 3 -->


<!-- End Middle Content -->

</div>
</div>
</div>
</div>
