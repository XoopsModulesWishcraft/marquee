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

if (!defined('XOOPS_ROOT_PATH')) {
	die('XOOPS root path not defined');
}

$modversion['name'] = 'Marquee';
$modversion['version'] = '2.47';
$modversion['description'] = _MI_MARQUEE_DESC;
$modversion['credits'] = "Carnuke, defkon1, the Newbb team<br /><a href='http://msdn.microsoft.com/workshop/author/dhtml/reference/objects/marquee.asp'>For a complete reference, see this page</a>";
$modversion['author'] = 'Instant Zero - http://xoops.instant-zero.com';
$modversion['help'] = '';
$modversion['license'] = 'GPL see LICENSE';
$modversion['official'] = 0;
$modversion['image'] = 'images/marquee_slogo.png';
$modversion['dirname'] = 'marquee';

$modversion['sqlfile']['mysql'] = 'sql/mysql.sql';
$modversion['tables'][0] = 'marquee';

$modversion['hasAdmin'] = 1;
$modversion['adminindex'] = 'admin/index.php';
$modversion['adminmenu'] = 'admin/menu.php';

$modversion['hasMain'] = 1;

// Templates

// Blocks
$modversion['blocks'][1]['file'] = 'marquee_bloc.php';
$modversion['blocks'][1]['name'] = _MI_MARQUEE_BNAME_01;
$modversion['blocks'][1]['description'] = _MI_MARQUEE_BDESC_01;
$modversion['blocks'][1]['show_func'] = 'b_marquee_show';
$modversion['blocks'][1]['options'] = '1';
$modversion['blocks'][1]['edit_func'] = 'b_marquee_edit';
$modversion['blocks'][1]['template'] = 'marquee_block01.html';

$modversion['blocks'][2]['file'] = 'marquee_bloc.php';
$modversion['blocks'][2]['name'] = _MI_MARQUEE_BNAME_02;
$modversion['blocks'][2]['description'] = _MI_MARQUEE_BDESC_02;
$modversion['blocks'][2]['show_func'] = 'b_marquee_show';
$modversion['blocks'][2]['options'] = '2';
$modversion['blocks'][2]['edit_func'] = 'b_marquee_edit';
$modversion['blocks'][2]['template'] = 'marquee_block02.html';

$modversion['blocks'][3]['file'] = 'marquee_bloc.php';
$modversion['blocks'][3]['name'] = _MI_MARQUEE_BNAME_03;
$modversion['blocks'][3]['description'] = _MI_MARQUEE_BDESC_03;
$modversion['blocks'][3]['show_func'] = 'b_marquee_show';
$modversion['blocks'][3]['options'] = '3';
$modversion['blocks'][3]['edit_func'] = 'b_marquee_edit';
$modversion['blocks'][3]['template'] = 'marquee_block03.html';

$modversion['blocks'][4]['file'] = 'marquee_bloc.php';
$modversion['blocks'][4]['name'] = _MI_MARQUEE_BNAME_04;
$modversion['blocks'][4]['description'] = _MI_MARQUEE_BDESC_04;
$modversion['blocks'][4]['show_func'] = 'b_marquee_show';
$modversion['blocks'][4]['options'] = '4';
$modversion['blocks'][4]['edit_func'] = 'b_marquee_edit';
$modversion['blocks'][4]['template'] = 'marquee_block04.html';

// Search
$modversion['hasSearch'] = 0;

// Smarty
$modversion['use_smarty'] = 1;

// Options
/**
 * Editor to use (was usekiovi)
 */
$modversion['config'][1]['name'] = 'form_options';
$modversion['config'][1]['title'] = "_MI_MARQUEE_TEXT_EDITOR";
$modversion['config'][1]['description'] = '';
$modversion['config'][1]['formtype'] = 'select';
$modversion['config'][1]['valuetype'] = 'text';
$modversion['config'][1]['default'] = 'dhtmltextarea';
xoops_load('xoopseditorhandler');
$modversion['config'][1]['options'] = array_flip(xoopsEditorHandler::getList());

/**
 * Which method to use to create the marquee (The Microsoft marque tag or the Javascript method ?)
 */
$modversion['config'][2]['name'] = 'methodtouse';
$modversion['config'][2]['title'] = '_MI_MARQUEE_METHOD';
$modversion['config'][2]['description'] = '_MI_MARQUEE_METHOD_DESC';
$modversion['config'][2]['formtype'] = 'select';
$modversion['config'][2]['valuetype'] = 'text';
$modversion['config'][2]['default'] = 'Marquee';
$modversion['config'][2]['options'] = array('_MI_MARQUEE_MARQUEE' => 'Marquee','_MI_MARQUEE_DHTML' => 'DHTML');

/**
 * Date's format (only use with plugins)
 */
$modversion['config'][3]['name'] = 'dateformat';
$modversion['config'][3]['title'] = '_MI_MARQUEE_DATEFORMAT';
$modversion['config'][3]['description'] = '_MI_MARQUEE_DATEFORMAT_DESC';
$modversion['config'][3]['formtype'] = 'textbox';
$modversion['config'][3]['valuetype'] = 'text';
$modversion['config'][3]['default'] = '';

/**
 * Count of items taken from other modules (only use with plugins)
 */
$modversion['config'][4]['name'] = 'itemscount';
$modversion['config'][4]['title'] = '_MI_MARQUE_ITEMSCOUNT';
$modversion['config'][4]['description'] = '_MI_MARQUE_ITEMSCOUNT_DESC';
$modversion['config'][4]['formtype'] = 'textbox';
$modversion['config'][4]['valuetype'] = 'int';
$modversion['config'][4]['default'] = 5;


/**
 * Titles length (only use with plugins)
 */
$modversion['config'][5]['name'] = 'itemssize';
$modversion['config'][5]['title'] = '_MI_MARQUE_TITLELENGTH';
$modversion['config'][5]['description'] = '_MI_MARQUE_TITLELENGTH_DESC';
$modversion['config'][5]['formtype'] = 'textbox';
$modversion['config'][5]['valuetype'] = 'int';
$modversion['config'][5]['default'] = 0;
?>