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

if ($bs3dropdwn == 1)
{
	$document = JFactory::getDocument();
	if ($bs3ddanim == 1)
	{
		$document->addScript(JURI::base(true).'/modules/mod_bootstrap3_menu/assets/bootstrap.dropdown.hover.animate.min.js');
	}
	else
	{
		$document->addScript(JURI::base(true).'/modules/mod_bootstrap3_menu/assets/bootstrap.dropdown.hover.display.min.js');
	}
}

// Note. It is important to remove spaces between elements.
?>
<?php // The menu class is deprecated. Use nav instead. ?>
<ul class="bs3menu <?php if ($bs3type != 'flat') echo 'nav '.$bs3type;?> <?php echo $class_sfx;?>"<?php
	$tag = '';
	$level = 1;

	if ($params->get('tag_id') != null)
	{
		$tag = $params->get('tag_id') . '';
		echo ' id="' . $tag . '"';
	}
?>>
<?php
foreach ($list as $i => &$item)
{
	$class = 'item-' . $item->id;

	if (($item->id == $active_id) OR ($item->type == 'alias' AND $item->params->get('aliasoptions') == $active_id))
	{
		$class .= ' current';
	}

	if (in_array($item->id, $path))
	{
		$class .= ' active';
	}
	elseif ($item->type == 'alias')
	{
		$aliasToId = $item->params->get('aliasoptions');

		if (count($path) > 0 && $aliasToId == $path[count($path) - 1])
		{
			$class .= ' active';
		}
		elseif (in_array($aliasToId, $path))
		{
			$class .= ' alias-parent-active';
		}
	}

	if ($item->type == 'separator')
	{
		$class .= ' divider';
	}

	if ($item->deeper)
	{
		$class .= ' deeper';
	}

	$item->isParentAnchor = false;

	if ($item->parent)
	{
		if ($bs3dropdwn == 1)
		{
			$class .= ' dropdown';
			if ($level > 1) $class .= ' dropdown-submenu';
		}
		else
		{
			$class .= ' parent';
		}
		$item->isParentAnchor = true;
	}

	if (!empty($class))
	{
		$class = ' class="' . trim($class) . '"';
	}

	echo '<li' . $class . '>';

	// Render the menu item.
	switch ($item->type) :
		case 'separator':
		case 'url':
		case 'component':
		case 'heading':
			require JModuleHelper::getLayoutPath('mod_bootstrap3_menu', 'default_' . $item->type);
			break;

		default:
			require JModuleHelper::getLayoutPath('mod_bootstrap_menu', 'default_url');
			break;
	endswitch;

	// The next item is deeper.
	if ($item->deeper)
	{
		if ($bs3dropdwn == 1)
		{
			echo '<ul class="dropdown-menu" role="menu">';
		}
		else
		{
			echo '<ul class="nav-child" role="menu">';
		}
		$level++;

	}
	elseif ($item->shallower)
	{
		// The next item is shallower.
		echo '</li>';
		echo str_repeat('</ul></li>', $item->level_diff);
		$level--;
	}
	else
	{
		// The next item is on the same level.
		echo '</li>';
	}

	if ($level == 1 && $bs3type == 'flat')
	{
		end($list);
	    if ($i !== key($list))
	    {
	    	echo '<li class="flatseparator">';
	    	if ($bs3sepkind == 1) echo '<i class="fa ' . $bs3fachr  . '"></i>';
	    	if ($bs3sepkind == 2) echo $bs3flatchr;
	    	echo '</li>';
	    }
	}

}
?></ul>
