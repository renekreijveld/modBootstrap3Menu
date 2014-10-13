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

$list		= ModBootstrap3MenuHelper::getList($params);
$base		= ModBootstrap3MenuHelper::getBase($params);
$active		= ModBootstrap3MenuHelper::getActive($params);
$active_id 	= $active->id;
$path		= $base->tree;

$showAll	= $params->get('showAllChildren');
$class_sfx	= htmlspecialchars($params->get('class_sfx'));
$bs3type    = $params->get('bs3MenuType');
$bs3dropdwn = $params->get('bs3Dropdown');
$bs3css     = $params->get('bs3LoadCSS');
$bs3ddanim  = $params->get('bs3DDAnimate');
$bs3facaret = $params->get('bs3FACaret');
$bs3facarr  = $params->get('bs3FACaretR');
$bs3sepkind = $params->get('bs3SepKind');
$bs3fachr   = $params->get('bs3FAFlatChar');
$bs3flatchr = $params->get('bs3FlatChar');

if (count($list))
{
	require JModuleHelper::getLayoutPath('mod_bootstrap3_menu', $params->get('layout', 'default'));
}