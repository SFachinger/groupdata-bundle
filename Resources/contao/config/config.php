<?php

/*
 * This file is part of TestBundle.
 * 
 * (c) Steffen Fachinger 2022 <steffen.fachnger@online.de>
 * @license GPL-3.0-or-later
 * For the full copyright and license information,
 * please view the LICENSE file that was distributed with this source code.
 * @link https://github.com/sfachinger/contao-TestBundle
 */
 
 /**
 * Back end modules
 */
$GLOBALS['BE_MOD']['kreuzbund']['input_groups'] = array(
	"tables"		=>	array('tl_groupdata'),
	);

/**
 * Front end modules
 */

$GLOBALS['TL_CTE']['kreuzbund']['groups'] = 'GroupDataClass';
$GLOBALS['TL_CTE']['kreuzbund']['description'] = 'GroupDescriptionClass';