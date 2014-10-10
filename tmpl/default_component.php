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
$itemAttributes = array();
$itemAttributes['class'] = $item->anchor_css ? $item->anchor_css : null;
$itemAttributes['title'] = $item->anchor_title ? $item->anchor_title : null;

// Convert attributes to string
$attributes = '';

if (!empty($itemAttributes))
{
	foreach ($itemAttributes as $attribute => $value)
	{
		if (null !== $value)
		{
			$attributes .= ' ' . $attribute . '="' . trim((string) $value) . '"';
		}
	}
}

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
	if ($bs3caret == 1) $linktype .= ' <span class="caret"></span>';
	if ($bs3caret == 2) $linktype .= ' <i class="fa '.$bs3facaret.'"></i>';
	if ($attributes == '') $attributes = 'class="dropdown-toggle" data-toggle="dropdown" ';
}

switch ($item->browserNav)
{
	default:
	case 0:
?><a <?php echo $class; ?>href="<?php echo $item->flink; ?>" <?php echo $title; ?>><?php echo $linktype; ?></a><?php
		break;
	case 1:
		// _blank
?><a <?php echo $class; ?>href="<?php echo $item->flink; ?>" target="_blank" <?php echo $title; ?>><?php echo $linktype; ?></a><?php
		break;
	case 2:
	// Use JavaScript "window.open"
?><a <?php echo $class; ?>href="<?php echo $item->flink; ?>" onclick="window.open(this.href,'targetWindow','toolbar=no,location=no,status=no,menubar=no,scrollbars=yes,resizable=yes');return false;" <?php echo $title; ?>><?php echo $linktype; ?></a>
<?php
		break;
}
