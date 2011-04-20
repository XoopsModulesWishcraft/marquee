<?php

$adminmenu = array();

$i = 1;
$adminmenu[$i]["title"] = _MI_MARQUEE_MENU_00;
$adminmenu[$i]["link"] = 'admin/index.php';
$adminmenu[$i]["icon"] = 'images/admin/home.png';

$i++;
$adminmenu[$i]["title"] = _MI_MARQUEE_MENU_01;
$adminmenu[$i]["link"] = 'admin/marquee.php';
$adminmenu[$i]["icon"] = 'images/admin/marquee.png';

$i++;
$adminmenu[$i]["title"] = _MI_MARQUEE_ADMIN_ABOUT;
$adminmenu[$i]["link"] = 'admin/about.php';
$adminmenu[$i]["icon"] = 'images/admin/about.png';


?>