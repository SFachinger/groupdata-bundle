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

class GroupDataClass extends \ContentElement
{
	/**
	 * Template
	 * @var string
	 */
	protected $strTemplate = 'ce_groupdata';
	
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
			$this->Template->class = "ce_groupdata";
			$this->Template->group_name = $result->group_name;
			$this->Template->group_leader = $result->group_leader;
			$this->Template->group_meetingpoint = $result->group_meetingpoint;
			$this->Template->group_street = $result->group_street;
			$this->Template->group_zip = $result->group_zip;
			$this->Template->group_city = $result->group_city;
			$this->Template->group_phone = $result->group_phone;
			$this->Template->group_mobile = $result->group_mobile;
			$this->Template->group_meeting_mo = $result->group_meeting_mo;
			$this->Template->group_meeting_di = $result->group_meeting_di;
			$this->Template->group_meeting_mi = $result->group_meeting_mi;
			$this->Template->group_meeting_do = $result->group_meeting_do;
			$this->Template->group_meeting_fr = $result->group_meeting_fr;
			$this->Template->group_meeting_sa = $result->group_meeting_sa;
			$this->Template->group_meeting_so = $result->group_meeting_so;
			$this->Template->group_email = $result->group_email;
			$this->Template->description = $result->description;
			}
}
?>