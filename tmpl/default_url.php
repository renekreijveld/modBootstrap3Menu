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

// Note. It is important to remove spaces between elements.
$attribute = '';
$class = $item->anchor_css ? $item->anchor_css : '';
$title = $item->anchor_title ? $item->anchor_title : '';

if ($item->menu_image)
	{
		$item->params->get('menu_text', 1) ?
		$linktype = '<img src="' . $item->menu_image . '" alt="' . $item->title . '" /><span class="image-title">' . $item->title . '</span> ' :
		$linktype = '<img src="' . $item->menu_image . '" alt="' . $item->title . '" />';
}
else
{
	$linktype = $item->title;
}

// Add Bootstrap caret
if ($item->isParentAnchor && $bs3dropdwn == 1)
{
    if ($level == 1) $linktype .= ' <i class="fa '.$bs3facaret.'"></i>';
    if ($level > 1) $linktype .= ' <i class="fa '.$bs3facarr.'"></i>';
    $class .= ' dropdown-toggle';
    # for Windows Phone 7.5 which has trouble with :hover
    //$attribute .= ' aria-haspopup="true"';
    $attribute .= 'data-toggle="dropdown"';
    $attribute .= ' role="button"';
    $attribute .= ' aria-expanded="false"';
}

$flink = $item->flink;
$flink = JFilterOutput::ampReplace(htmlspecialchars($flink));

$class = $class ? 'class="' . $class . '" ' : '';
$title = $title ? 'title="' . $title . '" ' : '';

switch ($item->browserNav) :
	default:
	case 0:
?><a <?php echo $class; ?>href="<?php echo $flink; ?>" <?php echo $title; ?><?php echo $attribute; ?>><?php echo $linktype; ?></a><?php
		break;
	case 1:
		// _blank
?><a <?php echo $class; ?>href="<?php echo $flink; ?>" target="_blank" <?php echo $title; ?><?php echo $attribute; ?>><?php echo $linktype; ?></a><?php
		break;
	case 2:
		// Use JavaScript "window.open"
		$options = 'toolbar=no,location=no,status=no,menubar=no,scrollbars=yes,resizable=yes,' . $params->get('window_open');
			?><a <?php echo $class; ?>href="<?php echo $flink; ?>" onclick="window.open(this.href,'targetWindow','<?php echo $options;?>');return false;" <?php echo $title; ?>><?php echo $linktype; ?></a><?php
		break;
endswitch;
