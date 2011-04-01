<?php

$adminmenu = array();

$i = 1;
$adminmenu[$i]["title"] = _MI_MARQUEE_MENU_00;
$adminmenu[$i]["link"] = 'admin/index.php';
$adminmenu[$i]["icon"] = 'images/icons/home.png';
$adminmenu[$i]["menu"] = 'images/admin/home.png';
$i++;
$adminmenu[$i]["title"] = _MI_MARQUEE_MENU_01;
$adminmenu[$i]["link"] = 'admin/marquee.php';
$adminmenu[$i]["icon"] = 'images/icons/marquee.png';
$adminmenu[$i]["menu"] = 'images/admin/marquee.png';
$i++;
$adminmenu[$i]["title"] = _MI_MARQUEE_ADMIN_ABOUT;
$adminmenu[$i]["link"] = 'admin/about.php';
$adminmenu[$i]["icon"] = 'images/icons/about.png';
$adminmenu[$i]["menu"] = 'images/admin/about.png';

?>