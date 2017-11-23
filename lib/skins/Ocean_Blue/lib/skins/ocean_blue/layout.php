<!DOCTYPE html>
<html dir="ltr" lang="en-US"><head><!-- Created by Artisteer v4.1.0.59861 -->
<meta charset="utf-8">
<title><?php echo $page_title; ?></title>
<meta name="viewport" content="initial-scale = 1.0, maximum-scale = 1.0, user-scalable = no, width = device-width">
<!--<link rel="stylesheet" media="all" type="text/css" href="<?php echo SITE_URL?>/lib/skins/crystal/styles.css" />-->
<link rel="stylesheet" href="<?php echo SITE_URL?>/lib/skins/ocean_blue/styles/ocean.css" type="text/css" title="Ocean Blue" media="screen" />
<link rel="stylesheet" href="<?php echo SITE_URL?>/lib/skins/ocean_blue/styles/style.responsive.css" type="text/css" title="Ocean Blue" media="screen" />
<!--[if lte IE 7]><link rel="stylesheet" href="<?php echo SITE_URL?>/lib/skins/ocean_blue/styles/style.ie7.css" media="screen" /><![endif]-->

<?php 
/* This is required, so phpVMS can output the necessary libraries it needs */
echo $page_htmlhead; 
?>
<script type="text/javascript">
var highlightbehavior="TD"
var ns6=document.getElementById&&!document.all
var ie=document.all

function changeto(e,highlightcolor){
source=ie? event.srcElement : e.target
if (source.tagName=="TABLE")
return
while(source.tagName!=highlightbehavior && source.tagName!="HTML")
source=ns6? source.parentNode : source.parentElement
if (source.style.backgroundColor!=highlightcolor&&source.id!="ignore")
source.style.backgroundColor=highlightcolor
}

function contains_ns6(master, slave) { //check if slave is contained by master
while (slave.parentNode)
if ((slave = slave.parentNode) == master)
return true;
return false;
}

function changeback(e,originalcolor){
if (ie&&(event.fromElement.contains(event.toElement)||source.contains(event.toElement)||source.id=="ignore")||source.tagName=="TABLE")
return
else if (ns6&&(contains_ns6(source, e.relatedTarget)||source.id=="ignore"))
return
if (ie&&event.toElement!=source||ns6&&e.relatedTarget!=source)
source.style.backgroundColor=originalcolor
}
</script>
<?php /*Any custom Javascript should be placed below this line, after the above call */ ?>
<!-- Initialise jQuery Library -->
<script type="text/javascript" src="<?php echo SITE_URL?>/lib/skins/ocean_blue/js/script.responsive.js"></script>
<script type="text/javascript" src="<?php echo SITE_URL?>/lib/skins/ocean_blue/js/ocean.js"></script>
<style>.art-content .art-postcontent-0 .layout-item-0 { margin-bottom: 5px;  }
.art-content .art-postcontent-0 .layout-item-1 { border-top-style:solid;border-right-style:solid;border-bottom-style:solid;border-left-style:solid;border-width:2px;border-color:#E0E0E0;  border-collapse: separate;  }
.art-content .art-postcontent-0 .layout-item-2 { padding: 5px;  }
.art-content .art-postcontent-0 .layout-item-3 { border-style:Solid;border-width:2px;border-color:#E0E0E0; border-spacing: 5px 0px; border-collapse: separate;  }
.art-content .art-postcontent-0 .layout-item-4 { margin-top: 5px;  }
.art-content .art-postcontent-0 .layout-item-5 { color: #002C52; background: ; padding-right: 10px;padding-left: 10px;  }
.art-content .art-postcontent-0 .layout-item-6 { border-left-style:solid;border-left-width:2px;border-left-color:#E0E0E0; color: #455B5E; background: ; padding-right: 10px;padding-left: 10px;  }
.ie7 .art-post .art-layout-cell {border:none !important; padding:0 !important; }
.ie6 .art-post .art-layout-cell {border:none !important; padding:0 !important; }
</style>
</head>
<body>
<?php
/* This should be the first thing you place after a <body> tag
	This is also required by phpVMS */
echo $page_htmlreq;
?>
<div id="art-main">
<div class="art-sheet clearfix">
<header class="art-header">
<div class="art-slider art-slidecontainerheader" data-width="1006" data-height="300">
<div class="art-slider-inner">
<div class="art-slide-item art-slideheader0"></div>
<div class="art-slide-item art-slideheader1"></div>
<div class="art-slide-item art-slideheader2"></div>
</div>
</div>
</header>

<!-- End Header -->

<!-- Start Navigation -->
    
<nav>
<?php Template::Show('core_navigation.php'); ?>
</nav>
<p>
<!-- End Navigation -->

<!-- Start Main Content -->
<!-- Different page structure for homepage only - phpVMS -->
        <?php 
            if(MainController::$activeModule == 'FRONTPAGE')
            {
                //Start Content Wrapper
                echo '<div id="content_wrapper_sbr">';
                //Start Content Area
                //Display phpVMS page template
                echo $page_content;
                //End Content Area
                echo '<div class="clear"></div>';
                echo '</div>';
                //End Content Wrapper
            }
            else
            {
                echo '<div id="content_wrapper_sbr">';
                //Start Wide Content Area
                //Display phpVMS page template
                echo '<div class="content_wide">';
                echo $page_content;
                //End Content Area
                echo '</div>';
                echo '<div class="clear"></div>';
                echo '</div>';
                //End Wide Content Wrapper
            }
        ?>
        	
<!-- End Main Content -->


<!-- Start Footer -->


<footer class="art-footer">
<p>copyright &copy; <?php echo date('Y') ?> - <?php echo SITE_NAME; ?>, all rights reserved.</p>
<p class="art-page-footer">
<span id="art-footnote-links"><a href="http://www.phpvms.net"target="new">CMS by phpVMS</a> - Your IP address is: <? echo $_SERVER["REMOTE_ADDR"]; ?> - Ocean Blue v2.1.2 by <a href="http://www.phpvms.209studios.com"target="new">209 Studios</a></span>
</p>
</footer>

<!-- End Footer -->

</div>
</div>
</body>
</html>