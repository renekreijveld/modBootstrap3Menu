<?php
/**
 * @package     Bootstrap 3 Menu
 * @subpackage  mod_bootstrap3_menu
 *
 * @copyright   Copyright (C) 2014 DSD business internet. All rights reserved.
 *              Based on the original work of Open Source Matters, Inc.
* @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

// Include the syndicate functions only once
require_once __DIR__ . '/helper.php';

$list		= ModMenuHelper::getList($params);
$base		= ModMenuHelper::getBase($params);
$active		= ModMenuHelper::getActive($params);
$active_id 	= $active->id;
$path		= $base->tree;

$showAll	= $params->get('showAllChildren');
$class_sfx	= htmlspecialchars($params->get('class_sfx'));

if (count($list))
{
	require JModuleHelper::getLayoutPath('mod_bootstrap3_menu', $params->get('layout', 'default'));
}
