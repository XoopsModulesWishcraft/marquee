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

/*$adminmenu[0]['title'] = _MI_MARQUEE_MENU_01;
$adminmenu[0]['link'] = 'admin/index.php';*/

$adminmenu = array();

$i = 1;
$adminmenu[$i]["title"] = _MI_MARQUEE_MENU_00;
$adminmenu[$i]["link"]  = "admin/index.php";
$adminmenu[$i]["desc"] = _MARQUEE_ADMIN_HOME_DESC;
$adminmenu[$i]["icon"] = "images/icons/home.png";
$i++;
$adminmenu[$i]["title"] = _MI_MARQUEE_MENU_01;
$adminmenu[$i]["link"]  = "admin/marquee.php";
$adminmenu[$i]["desc"] = _MARQUEE_ADMIN_MARQUEE_DESC;
$adminmenu[$i]["icon"] = "images/icons/marquee.png";
$i++;
$adminmenu[$i]["title"] = _MARQUEE_ADMIN_ABOUT;
$adminmenu[$i]["link"]  = "admin/about.php";
$adminmenu[$i]["desc"] = _MARQUEE_ADMIN_ABOUT_DESC;
$adminmenu[$i]["icon"] = "images/icons/about.png";
$i++;
$adminmenu[$i]["title"] = _MARQUEE_ADMIN_HELP;
$adminmenu[$i]["link"]  = "admin/help.php";
$adminmenu[$i]["desc"] = _MARQUEE_ADMIN_HELP_DESC;
$adminmenu[$i]["icon"] = "images/icons/help.png";


?>