<!-- Start Navigation -->
<nav>
<nav class="art-nav">
<ul class="art-hmenu">
<li><a href="<?php echo url('/'); ?>" title="Home">Home</a></li>

<li><a href="#">Corporate</a>
<ul>
<li><a href="<?php echo url('/pilots'); ?>" title="Pirep Lists">Our Pilots</a></li>
 <li><a href="<?php echo url('/rank'); ?>" title="Ranks">Ranks</a></li>
<li><a href="<?php echo url('/awards'); ?>" title="Awards">Awards</a></li>
<li><a href="<?php echo url('/Timetable'); ?>" title="Pirep Lists">Timetable</a></li>
<li><a href="<?php echo url('/Finances'); ?>" title="Pirep Lists">Finances</a></li>
<li><a href="<?php echo url('/contact'); ?>" title="Pirep Lists">Contact Us</a></li>
</ul>
</li>


<li><a href="#">Operations</a>
<ul>
<li><a href="<?php echo url('/Your Link'); ?>" title="Ranks">Your Link</a></li>
<li><a href="<?php echo url('/Your Link'); ?>" title="Ranks">Your Link</a></li>
</ul>
</li>
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
<li><a href="#">Dispatch</a>
<ul>
<li><a href="<?php echo url('/pireps/filepirep/'); ?>" title="File PIREP">File PIREP</a></li>
<li><a href="<?php echo url('/Profile'); ?>" title="My Profile">My Profile</a></li>
<li><a href="<?php echo url('/Pireps/mine'); ?>" title="My Pireps">My Pireps</a></li>
<li><a href="<?php echo url('/Schedules'); ?>" title="Schedules">Schedules</a></li>
<li><a href="<?php echo url('/pireps/routesmap'); ?>" title="My Flights">My Flights</a></li>
<li><a href="<?php echo url('/schedules/bids'); ?>" title="My Bids">My Bids</a></li>
<li><a href="<?php echo url('/profile/editprofile'); ?>" title="Edit Profile">Edit Profile</a></li>
</ul>
</li>
<?php
}
?>
<li><a href="<?php echo url('/acars'); ?>" title="Live Map">Live Map</a></li>


<li><a href="/forums" title="Forums">Forums</a></li>


<!-- Start Admin Links -->

<?php
if(Auth::LoggedIn())
{
	if(PilotGroups::group_has_perm(Auth::$usergroups, ACCESS_ADMIN))
	{ ?>



<li><a href="#" title="Operations">Admin</a>
<ul>
<li><a href="<?php echo SITE_URL ?>/admin">Admin Center</a></li>
<li><a href="<?php echo SITE_URL ?>/admin/index.php/pirepadmin/viewpending">Pending PIREPS </a></li>
<li><a href="<?php echo SITE_URL ?>/admin/index.php/pilotadmin/pendingpilots">Pending Pilots (<?php echo count(PilotData::GetPendingPilots())?>)</a></li>
</ul>
</li>
<?php } }?>

<!-- End Admin Links -->

<?php
                    if(Auth::LoggedIn() == false)
                        {
                     ?>

<li><a href="<?php echo url('/Registration'); ?>"class="register" title="Logout">Join Demo Airways</a></li>

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

<li><a href="<?php echo url('/Logout'); ?>"class="logout" title="Logout">Logout</a></li>

   <?php
}
?>

</ul> 
</nav>
<!-- End Navigation -->









