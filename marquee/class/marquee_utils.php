<?php
/**
 * ****************************************************************************
 * marquee - MODULE FOR XOOPS
 * Copyright (c) Herv� Thouzard (http://www.herve-thouzard.com)
 *
 * You may not change or alter any portion of this comment or credits
 * of supporting developers from this source code or any supporting source code
 * which is considered copyrighted (c) material of the original comment or credit authors.
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
 *
 * @copyright       Herv� Thouzard (http://www.herve-thouzard.com)
 * @license         http://www.fsf.org/copyleft/gpl.html GNU public license
 * @package         marquee
 * @author 			Herv� Thouzard (http://www.herve-thouzard.com)
 *
 * Version : $Id:
 * ****************************************************************************
 */


/**
 * A set of useful and common functions
 *
 * @package references
 * @author Herv� Thouzard (http://www.herve-thouzard.com)
 * @copyright (c) Herv� Thouzard
 *
 * Note: You should be able to use it without the need to instanciate it.
 *
 */
if (!defined('XOOPS_ROOT_PATH')) {
	die("XOOPS root path not defined");
}

class marquee_utils
{

	const MODULE_NAME = 'marquee';

	/**
	 * Access the only instance of this class
     *
     * @return	object
     *
     * @static
     * @staticvar   object
	 */
	function &getInstance()
	{
		static $instance;
		if (!isset($instance)) {
			$instance = new references_utils();
		}
		return $instance;
	}


	/**
  	 * Returns a module's option (with cache)
  	 *
	 * @param string $option	module option's name
	 * @param boolean $withCache	Do we have to use some cache ?
	 * @return mixed option's value
 	 */
	function getModuleOption($option, $withCache = true)
	{
		global $xoopsModuleConfig, $xoopsModule;
		$repmodule = self::MODULE_NAME;
		static $options = array();
		if(is_array($options) && array_key_exists($option,$options) && $withCache) {
			return $options[$option];
		}

		$retval = false;
		if (isset($xoopsModuleConfig) && (is_object($xoopsModule) && $xoopsModule->getVar('dirname') == $repmodule && $xoopsModule->getVar('isactive'))) {
			if(isset($xoopsModuleConfig[$option])) {
				$retval= $xoopsModuleConfig[$option];
			}
		} else {
			$module_handler =& xoops_gethandler('module');
			$module =& $module_handler->getByDirname($repmodule);
			$config_handler =& xoops_gethandler('config');
			if ($module) {
			    $moduleConfig = $config_handler->getConfigsByCat(0, $module->getVar('mid'));
	    		if(isset($moduleConfig[$option])) {
		    		$retval= $moduleConfig[$option];
	    		}
			}
		}
		$options[$option] = $retval;
		return $retval;
	}


	/**
	 * Is Xoops 2.3.x ?
	 *
	 * @return boolean need to say it ?
	 */
	function isX23()
	{
		$x23 = false;
		$xv = str_replace('XOOPS ','',XOOPS_VERSION);
		if(intval(substr($xv,2,1)) >= 3) {
			$x23 = true;
		}
		return $x23;
	}


	/**
	 * Retreive an editor according to the module's option "form_options"
	 *
	 * @param string $caption Caption to give to the editor
	 * @param string $name Editor's name
	 * @param string $value Editor's value
	 * @param string $width Editor's width
	 * @param string $height Editor's height
	 * @return object The editor to use
 	 */
	function &getWysiwygForm($caption, $name, $value = '', $width = '100%', $height = '400px', $supplemental='')
	{
		$editor = false;
		$editor_configs=array();
		$editor_configs['name'] =$name;
		$editor_configs['value'] = $value;
		$editor_configs['rows'] = 35;
		$editor_configs['cols'] = 60;
		$editor_configs['width'] = '100%';
		$editor_configs['height'] = '400px';

		$editor_option = strtolower(self::getModuleOption('form_options'));

		if(self::isX23()) {
			$editor = new XoopsFormEditor($caption, $editor_option, $editor_configs);
   			return $editor;
        }

		// Only for Xoops 2.0.x
		switch($editor_option) {
			case 'fckeditor':
					if ( is_readable(XOOPS_ROOT_PATH . '/class/fckeditor/formfckeditor.php'))	{
						require_once(XOOPS_ROOT_PATH . '/class/fckeditor/formfckeditor.php');
						$editor = new XoopsFormFckeditor($caption, $name, $value);
					}
				break;

			case 'htmlarea':
					if ( is_readable(XOOPS_ROOT_PATH . '/class/htmlarea/formhtmlarea.php'))	{
						require_once(XOOPS_ROOT_PATH . '/class/htmlarea/formhtmlarea.php');
						$editor = new XoopsFormHtmlarea($caption, $name, $value);
					}
				break;

			case 'dhtmltextarea':
					$editor = new XoopsFormDhtmlTextArea($caption, $name, $value, 10, 50, $supplemental);
				break;

			case 'textarea':
				$editor = new XoopsFormTextArea($caption, $name, $value);
				break;

			case 'tinyeditor':
			case 'tinymce':
				if ( is_readable(XOOPS_ROOT_PATH.'/class/xoopseditor/tinyeditor/formtinyeditortextarea.php')) {
					require_once XOOPS_ROOT_PATH.'/class/xoopseditor/tinyeditor/formtinyeditortextarea.php';
					$editor = new XoopsFormTinyeditorTextArea(array('caption'=> $caption, 'name'=>$name, 'value'=>$value, 'width'=>'100%', 'height'=>'400px'));
				}
				break;

			case 'koivi':
					if ( is_readable(XOOPS_ROOT_PATH . '/class/wysiwyg/formwysiwygtextarea.php')) {
						require_once(XOOPS_ROOT_PATH . '/class/wysiwyg/formwysiwygtextarea.php');
					$editor = new XoopsFormWysiwygTextArea($caption, $name, $value, $width, $height, '');
				}
				break;
			}
			return $editor;
	}


	/**
 	 * Create (in a link) a javascript confirmation's box
 	 *
	 * @param string $message	Message to display
	 * @param boolean $form	Is this a confirmation for a form ?
	 * @return string the javascript code to insert in the link (or in the form)
	 */
	function javascriptLinkConfirm($message, $form = false)
	{
		if(!$form) {
			return "onclick=\"javascript:return confirm('".str_replace("'"," ",$message)."')\"";
		} else {
			return "onSubmit=\"javascript:return confirm('".str_replace("'"," ",$message)."')\"";
		}
	}


	/**
	 * Redirect user with a message
	 *
	 * @param string $message message to display
	 * @param string $url The place where to go
	 * @param integer timeout Time to wait before to redirect
 	 */
	function redirect($message='', $url='index.php', $time=2)
	{
		redirect_header($url, $time, $message);
		exit();
	}


	/**
	 * Internal function used to get the handler of the current module
	 *
	 * @return object The module
	 */
	protected function _getModule()
	{
		static $mymodule;
		if (!isset($mymodule)) {
			global $xoopsModule;
			if (isset($xoopsModule) && is_object($xoopsModule) && $xoopsModule->getVar('dirname') == REFERENCES_DIRNAME ) {
				$mymodule =& $xoopsModule;
			} else {
				$hModule = &xoops_gethandler('module');
				$mymodule = $hModule->getByDirname(REFERENCES_DIRNAME);
			}
		}
		return $mymodule;
	}

	/**
	 * Returns the module's name (as defined by the user in the module manager) with cache
	 * @return string Module's name
	 */
	function getModuleName()
	{
		static $moduleName;
		if(!isset($moduleName)) {
			$mymodule = self::_getModule();
			$moduleName = $mymodule->getVar('name');
		}
		return $moduleName;
	}



	/**
	 * This function indicates if the current Xoops version needs to add asterisks to required fields in forms
	 *
	 * @return boolean Yes = we need to add them, false = no
	 */
	function needsAsterisk()
	{
		if(self::isX23()) {
			return false;
		}
		if(strpos(strtolower(XOOPS_VERSION), 'impresscms') !== false) {
			return false;
		}
		if(strpos(strtolower(XOOPS_VERSION), 'legacy') === false) {
			$xv = xoops_trim(str_replace('XOOPS ','',XOOPS_VERSION));
			if(intval(substr($xv,4,2)) >= 17) {
				return false;
			}
		}
		return true;
	}

	/**
	 * Mark the mandatory fields of a form with a star
	 *
	 * @param object $sform The form to modify
	 * @param string $caracter The character to use to mark fields
	 * @return object The modified form
	 */
	function &formMarkRequiredFields(&$sform)
	{
		if(self::needsAsterisk()) {
			$required = array();
			foreach($sform->getRequired() as $item) {
				$required[] = $item->_name;
			}
			$elements = array();
			$elements = & $sform->getElements();
			$cnt = count($elements);
			for($i=0; $i<$cnt; $i++) {
				if( is_object($elements[$i]) && in_array($elements[$i]->_name, $required)
				) {
					$elements[$i]->_caption .= ' *';
		}
			}
		}
		return $sform;
	}
}
?>