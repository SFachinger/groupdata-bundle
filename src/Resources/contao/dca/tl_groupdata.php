<?php if (!defined('TL_ROOT')) die('You cannot access this file directly!');

/**
 * Contao Open Source CMS
 *
 * Copyright (C) 2005-2013 Leo Feyer
 *
 * @package   gruppendataten
 * @author    Steffen Fachinger
 * @license   GNU/LGPL
 * @copyright Steffen Fachinger 2018
 */

$GLOBALS['TL_DCA']['tl_groupdata'] = array
(
	'config' => array
	(
		'dataContainer'               => 'Table',
		'enableVersioning'            => true,
		'sql' => array
		(
			'keys' => array
			(
				'id' => 'primary'
			)

		)
	),
	
	'list' => array
	(
		'sorting' => array
		(
			'mode'                    => 1,
			'fields'                  => array('group_name','group_city'),
			'flag'                    => 1,
			'panelLayout'             => 'filter;sort,search,limit'
		),
		'label' => array
		(
			'fields'                  => array('group_name','group_leader','group_city'),
			'showColumns'             => true,
			'format'                  => '%s, %s'
		),
		'global_operations' => array
		(
			'all' => array
			(
				'label'               => &$GLOBALS['TL_LANG']['MSC']['all'],
				'href'                => 'act=select',
				'class'               => 'header_edit_all',
				'attributes'          => 'onclick="Backend.getScrollOffset()" accesskey="e"'
			)
		),
		'operations' => array
		(
			'edit' => array
			(
				'label'               => &$GLOBALS['TL_LANG']['tl_groupdata']['edit'],
				'href'                => 'act=edit',
				'icon'                => 'edit.gif'
			),
			'delete' => array
			(
				'label'               => &$GLOBALS['TL_LANG']['tl_groupdata']['delete'],
				'href'                => 'act=delete',
				'icon'                => 'delete.gif',
				'attributes'          => 'onclick="if(!confirm(\'' . $GLOBALS['TL_LANG']['MSC']['deleteConfirm'] . '\'))return false;Backend.getScrollOffset()"'
			),
			'show' => array
			(
				'label'               => &$GLOBALS['TL_LANG']['tl_groupdata']['show'],
				'href'                => 'act=show',
				'icon'                => 'show.gif',
				'attributes'          => 'style="margin-right:3px"'
			),
			'toggle' => array
			(
				'label'               => &$GLOBALS['TL_LANG']['tl_groupdata']['toggle'],
				'icon'                => 'visible.gif',
				'attributes'          => 'onclick="Backend.getScrollOffset();return AjaxRequest.toggleVisibility(this,%s)"',
				'button_callback'     => array('tl_groupdata', 'toggleIcon')
			),

		)
	),
/**
 * Palettes
 */
	'palettes'		=> array
	(
		'default'   => 	'{type_legend},type;
						{group_legend},group_name;
						{contact_legend},group_leader;
						{meeting_legend},group_meetingpoint,group_street,group_zip,group_city,group_phone,group_mobile,group_email,group_meeting_mo,group_meeting_di,group_meeting_mi,group_meeting_do,group_meeting_fr,group_meeting_sa,group_meeting_so;
						{protected_legend:hide},protected;
						{expert_legend:hide},guest,cssID,space;
						{description_legend},description;
						{invisible_legend:hide},published,start,stop;'

	),
	

/**
 * Fields
 */
/**
 * Fields
 */
	'fields' => array
	(
		'id' => array
		(
			'sql'                     => "int(10) unsigned NOT NULL auto_increment"
		),
		
		'tstamp' => array
		(
			'sql'                     => "int(10) unsigned NOT NULL default '0'"
		),

		'published' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_groupdata']['published'],
			'exclude'                 => true,
			'filter'                  => false,
			'flag'                    => 1,
			'inputType'               => 'checkbox',
			'eval'                    => array('doNotCopy'=>true),
			'sql'                     => "char(1) NOT NULL default ''"
		),
		
		'start' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_groupdata']['s'],
			'exclude'                 => true,
			'inputType'               => 'text',
			'eval'                    => array('rgxp'=>'datim', 'datepicker'=>true, 'tl_class'=>'w50 wizard'),
			'sql'                     => "varchar(10) NOT NULL default ''"
		),
		
		'stop' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_groupdata']['stop'],
			'exclude'                 => true,
			'inputType'               => 'text',
			'eval'                    => array('rgxp'=>'datim', 'datepicker'=>true, 'tl_class'=>'w50 wizard'),
			'sql'                     => "varchar(10) NOT NULL default ''"
		),


		'group_name' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_groupdata']['group_name'],
			'exclude'                 => true,
			'search'                  => true,
			'filter'                  => false,
			'inputType'               => 'text',
			'eval'                    => array('mandatory'=>true, 'maxlength'=>255, 'tl_class'=>'w50'),
			'sql'                     => "varchar(255) NOT NULL default ''"
		),

		'group_leader' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_groupdata']['group_leader'],
			'exclude'                 => true,
			'search'                  => true,
			'filter'                  => true,
			'inputType'               => 'text',
			'eval'                    => array('mandatory'=>true, 'maxlength'=>255, 'tl_class'=>'w50'),
			'sql'                     => "varchar(255) NOT NULL default ''"
		),

		'group_meetingpoint' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_groupdata']['group_meetingpoint'],
			'exclude'                 => true,
			'search'                  => true,
			'inputType'               => 'text',
			'eval'                    => array('mandatory'=>false, 'maxlength'=>255, 'tl_class'=>'w50 clr'),
			'sql'                     => "varchar(255) NOT NULL default ''"
		),
		
		'group_street' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_groupdata']['group_street'],
			'exclude'                 => true,
			'search'                  => true,
			'inputType'               => 'text',
			'eval'                    => array('mandatory'=>false, 'maxlength'=>255, 'tl_class'=>'w50'),
			'sql'                     => "varchar(255) NOT NULL default ''"
		),

		'group_zip' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_groupdata']['group_zip'],
			'exclude'                 => true,
			'search'                  => true,
			'filter'                  => true,
			'inputType'               => 'text',
			'eval'                    => array('mandatory'=>false, 'maxlength'=>255, 'tl_class'=>'w50 clr'),
			'sql'                     => "varchar(255) NOT NULL default ''"
		),

		'group_city' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_groupdata']['group_city'],
			'exclude'                 => true,
			'search'                  => true,
			'filter'                  => true,
			'inputType'               => 'text',
			'eval'                    => array('mandatory'=>false, 'maxlength'=>255, 'tl_class'=>'w50'),
			'sql'                     => "varchar(255) NOT NULL default ''"
		),

		'group_email' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_groupdata']['group_email'],
			'exclude'                 => true,
			'search'                  => true,
			'inputType'               => 'text',
			'eval'                    => array('mandatory'=>false, 'maxlength'=>255, 'tl_class'=>'w50 clr'),
			'sql'                     => "varchar(255) NOT NULL default ''"
		),

		'group_phone' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_groupdata']['group_phone'],
			'exclude'                 => true,
			'search'                  => true,
			'inputType'               => 'text',
			'eval'                    => array('mandatory'=>false, 'maxlength'=>255, 'tl_class'=>'w50 clr'),
			'sql'                     => "varchar(255) NOT NULL default ''"
		),

		'group_mobile' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_groupdata']['group_mobile'],
			'exclude'                 => true,
			'search'                  => true,
			'inputType'               => 'text',
			'eval'                    => array('mandatory'=>false, 'maxlength'=>255, 'tl_class'=>'w50'),
			'sql'                     => "varchar(255) NOT NULL default ''"
		),

		'group_meeting_mo' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_groupdata']['group_meeting_mo'],
			'exclude'                 => true,
			'search'                  => true,
			'inputType'               => 'text',
			'eval'                    => array('mandatory'=>false, 'maxlength'=>255, 'tl_class'=>'w50 clr'),
			'sql'                     => "varchar(255) NOT NULL default ''"
		),

		'group_meeting_di' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_groupdata']['group_meeting_di'],
			'exclude'                 => true,
			'search'                  => true,
			'inputType'               => 'text',
			'eval'                    => array('mandatory'=>false, 'maxlength'=>255, 'tl_class'=>'w50 clr'),
			'sql'                     => "varchar(255) NOT NULL default ''"
		),

		'group_meeting_mi' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_groupdata']['group_meeting_mi'],
			'exclude'                 => true,
			'search'                  => true,
			'inputType'               => 'text',
			'eval'                    => array('mandatory'=>false, 'maxlength'=>255, 'tl_class'=>'w50 clr'),
			'sql'                     => "varchar(255) NOT NULL default ''"
		),

		'group_meeting_do' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_groupdata']['group_meeting_do'],
			'exclude'                 => true,
			'search'                  => true,
			'inputType'               => 'text',
			'eval'                    => array('mandatory'=>false, 'maxlength'=>255, 'tl_class'=>'w50 clr'),
			'sql'                     => "varchar(255) NOT NULL default ''"
		),

		'group_meeting_fr' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_groupdata']['group_meeting_fr'],
			'exclude'                 => true,
			'search'                  => true,
			'inputType'               => 'text',
			'eval'                    => array('mandatory'=>false, 'maxlength'=>255, 'tl_class'=>'w50 clr'),
			'sql'                     => "varchar(255) NOT NULL default ''"
		),

		'group_meeting_sa' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_groupdata']['group_meeting_sa'],
			'exclude'                 => true,
			'search'                  => true,
			'inputType'               => 'text',
			'eval'                    => array('mandatory'=>false, 'maxlength'=>255, 'tl_class'=>'w50 clr'),
			'sql'                     => "varchar(255) NOT NULL default ''"
		),

		'group_meeting_so' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_groupdata']['group_meeting_so'],
			'exclude'                 => true,
			'search'                  => true,
			'inputType'               => 'text',
			'eval'                    => array('mandatory'=>false, 'maxlength'=>255, 'tl_class'=>'w50 clr'),
			'sql'                     => "varchar(255) NOT NULL default ''"
		),
		'description' 		=> array
		(
			'label'                 => &$GLOBALS['TL_LANG'][$table]['description'],
			'exclude'               => true,
			'search'                => true,
			'inputType'             => 'textarea',
			'eval'                  => ['rte'=>'tinyMCE', 'tl_class'=>'clr'],
			'sql'                   => 'text(255) NOT NULL'
		)
	)
);

class tl_groupdata extends Backend
{
    /**
     * Ändert das Aussehen des Toggle-Buttons.
     * @param $row
     * @param $href
     * @param $label
     * @param $title
     * @param $icon
     * @param $attributes
     * @return string
     */
    public function toggleIcon($row, $href, $label, $title, $icon, $attributes)
    {
        
        $href .= '&amp;id='.$this->Input->get('id').'&amp;tid='.$row['id'].'&amp;state='.$row[''];

        if (!$row['published'])
        {
            $icon = 'invisible.gif';
        }

        return '<a href="'.$this->addToUrl($href).'" title="'.specialchars($title).'"'.$attributes.'>'.$this->generateImage($icon, $label).'</a> ';
    }
	
		/**
	 * Toggle the visibility of an element
	 * @param integer
	 * @param boolean
	 */
	public function toggleVisibility($intId, $blnPublished)
	{
		$this->createInitialVersion('tl_groupdata', $intId);

		// Trigger the save_callback
		if (is_array($GLOBALS['TL_DCA']['tl_groupdata']['fields']['published']['save_callback']))
		{
			foreach ($GLOBALS['TL_DCA']['tl_groupdata']['fields']['published']['save_callback'] as $callback)
			{
				$this->import($callback[0]);
				$blnPublished = $this->$callback[0]->$callback[1]($blnPublished, $this);
			}
		}

		// Update the database
		$this->Database->prepare("UPDATE tl_groupdata SET tstamp=". time() .", published='" . ($blnPublished ? '' : '1') . "' WHERE id=?")
			->execute($intId);
		$this->createNewVersion('tl_groupdata', $intId);
	}
}
?>