<?php
/**
 * @package    Joomla.Administrator
 * @subpackage com_listextensions
 *
 * @copyright  Copyright (C) 2015 - Luis Pirir. All Rights Reserved
 * @license    GNU General Public License version 2 or later
 */

// No direct access to this file
defined('_JEXEC') or die('Restricted access');

// Get an instance of the controller prefixed by ListExtensions
$controller = JControllerLegacy::getInstance('ListExtensions');
 
// Perform the Request task
$input = JFactory::getApplication()->input;
$controller->execute($input->getCmd('task')); 
 
// Redirect if set by the controller
$controller->redirect();