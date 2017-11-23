<?php
//AIRMail3
//simpilotgroup addon module for phpVMS virtual airline system
//
//simpilotgroup addon modules are licenced under the following license:
//Creative Commons Attribution Non-commercial Share Alike (by-nc-sa)
//To view full icense text visit http://creativecommons.org/licenses/by-nc-sa/3.0/
//
//@author David Clark (simpilot)
//@copyright Copyright (c) 2009-2011, David Clark
//@license http://creativecommons.org/licenses/by-nc-sa/3.0/
?>
    <form action="<?php echo url('/Mail');?>" method="post" enctype="multipart/form-data">
<table class="ocean_table"width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr> 
                <td colspan="2" align="center"><b>Create New Message folder for <?php echo (Auth::$userinfo->firstname.' '.Auth::$userinfo->lastname.' '.$pilotcode); ?></b></td>
            </tr>
            <tr>
                <td colspan="2" align="center"><b>New Folder Name:<input type="text" name="folder_title"></b></td>
            </tr>
            <tr>
                <td colspan="2" align="center">
                    <input type="hidden" name="action" value="savefolder" />
                    <input type="submit" value="Save New Folder">
                </td>
            </tr>
        </table>
    </form>