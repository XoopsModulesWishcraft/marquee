<?php
/**
 * ****************************************************************************
 * marquee - MODULE FOR XOOPS
 * Copyright (c) Hervé Thouzard of Instant Zero (http://www.instant-zero.com)
 *
 * You may not change or alter any portion of this comment or credits
 * of supporting developers from this source code or any supporting source code
 * which is considered copyrighted (c) material of the original comment or credit authors.
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
 *
 * @copyright       Hervé Thouzard of Instant Zero (http://www.instant-zero.com)
 * @license         http://www.fsf.org/copyleft/gpl.html GNU public license
 * @package         marquee
 * @author 			Hervé Thouzard of Instant Zero (http://www.instant-zero.com)
 *
 * Version : $Id:
 * ****************************************************************************
 */

require_once '../../../include/cp_header.php';
require_once XOOPS_ROOT_PATH.'/modules/marquee/admin/functions.php';
require_once XOOPS_ROOT_PATH.'/modules/marquee/include/functions.php';
require_once XOOPS_ROOT_PATH.'/modules/marquee/class/marquee_utils.php';

include 'header.php';

        marquee_adminmenu(0);


// **** Main ********************************************************************************************************************************

//----------------- mb -----------------------
include_once XOOPS_ROOT_PATH."/modules/marquee/class/menu.php";

	$menu = new testMenu();
	//$menu->addItem("table2", "index.php", "../images/admin/home1.png", _MI_MARQUEE_MENU_00);
	$menu->addItem("topic", "marquee.php", "../images/admin/marquee.png", _MI_MARQUEE_MENU_01);
	$menu->addItem("about", "about.php", "../images/admin/about.png", _MARQUEE_ADMIN_ABOUT);
	$menu->addItem("help", "help.php", "../images/admin/help.png", _MARQUEE_ADMIN_HELP);
	
	echo $menu->getCSS();
	
	echo "<div class=\"CPbigTitle\" style=\"background-image: url(../images/admin/home.png); background-repeat: no-repeat; background-position: left; padding-left: 50px;\"><strong>"._MI_MARQUEE_NAME."</strong></div><br />
		<table width=\"100%\" border=\"0\" cellspacing=\"10\" cellpadding=\"4\">
			<tr>
				<td valign=\"top\">".$menu->render()."</td>
				<td valign=\"top\" width=\"60%\">";
				
					// echo "<fieldset>
						// <legend class=\"CPmediumTitle\">"._AM_TEST_MANAGER_TABLE1."</legend>
						// <br />";
						// printf(_AM_TEST_THEREARE_TABLE1, $count_table1);
						// echo "<br /><br />";
						// printf(_AM_TEST_THEREARE_TABLE1_ONLINE, $table1_online);
						// echo "<br />
					//</fieldset><br /><br />";
					

				echo "</td>
			</tr>
		</table>
<br /><br />
<!--<div align=\"center\"><a href=\"http://xoops.org\" target=\"_blank\"><img src=\"../images/xoopsmicrobutton.gif\" alt=\"XOOPS\" title=\"XOOPS\"></a></div>-->

";		

//------------- mb ----------------------

include "footer.php";
xoops_cp_footer();
?>
