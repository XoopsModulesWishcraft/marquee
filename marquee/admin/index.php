<?php
/**
 * ****************************************************************************
 * marquee - MODULE FOR XOOPS
 * Copyright (c) Hervé Thouzard (http://www.herve-thouzard.com)
 *
 * You may not change or alter any portion of this comment or credits
 * of supporting developers from this source code or any supporting source code
 * which is considered copyrighted (c) material of the original comment or credit authors.
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
 *
 * @copyright       Hervé Thouzard (http://www.herve-thouzard.com)
 * @license         http://www.fsf.org/copyleft/gpl.html GNU public license
 * @package         marquee
 * @author 			Hervé Thouzard (http://www.herve-thouzard.com)
 *
 * Version : $Id:
 * ****************************************************************************
 */

require_once '../../../include/cp_header.php';
include 'header.php';


include_once XOOPS_ROOT_PATH."/modules/" . $xoopsModule->getVar("dirname") . "/class/admin.php";

	$index_admin = new ModuleAdmin();

    echo $index_admin->addNavigation('index.php');
    $index_admin->addConfigLabel(_AM_MARQUEE_CONFIG_CHECK);
    $index_admin->addLineConfigLabel(_AM_MARQUEE_CONFIG_PHP, $xoopsModule->getInfo("min_php"), 'php') ;
    $index_admin->addLineConfigLabel(_AM_MARQUEE_CONFIG_XOOPS, $xoopsModule->getInfo("min_xoops"), 'xoops');
	
    echo $index_admin->renderIndex();

include "footer.php";
?>