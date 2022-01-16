<?php if (!defined('TL_ROOT')) die('You cannot access this file directly!');
/**
 * Contao Open Source CMS
 *
 * Copyright (C) 2005-2013 Leo Feyer
 *
 * @package   meinetags
 * Version    1.0.0
 * @author    Frank Hoppe
 * @license   GNU/LGPL
 * @copyright Frank Hoppe 2013
 */

class GroupDescriptionClass extends \ContentElement
{
	/**
	 * Template
	 * @var string
	 */
	protected $strTemplate = 'ce_groupdescription';
	
	/**
	 * Generate the module
	 */
	protected function compile()
	{
			// Template 11
			$this->Template = new \FrontendTemplate($this->strTemplate);
			$adressid = $this->group_names;
			$result = $this->Database 	->prepare("SELECT * FROM tl_groupdata WHERE id=?")
										->execute($adressid);
			$this->Template->class = "ce_groupdescription";
			$this->Template->group_name = $result->group_name;
			$this->Template->description = $result->description;
			}
}
?>