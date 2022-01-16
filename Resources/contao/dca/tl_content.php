<?php
/**
 * Paletten
 */
$GLOBALS['TL_DCA']['tl_content']['palettes']['groups'] = '{type_legend},type;{group_names_legend},group_names,;{description_legend},description;{protected_legend:hide},protected;{expert_legend:hide},guest,cssID,space;{invisible_legend:hide},invisible,start,stop';
$GLOBALS['TL_DCA']['tl_content']['palettes']['description'] = '{type_legend},type;{group_names_legend},group_names;{description_legend},description';

	
/**
 * Felder
 */
// Adressenliste anzeigen
$GLOBALS['TL_DCA']['tl_content']['fields']['group_names'] = array
(
	'label'                => &$GLOBALS['TL_LANG']['tl_content']['group_names'],
	'exclude'              => true,
	'options_callback'     => array('tl_content_adresse', 'getAdressenListe'),
	'inputType'            => 'select',
	'eval'                 => array
	(
		'mandatory'=>true, 
		'chosen'=>true,
		'submitOnChange'=>true,
		'tl_class'		=> 'lang'
	),
	'wizard'               => array
	(
		array('tl_content_adresse', 'editAdresse')
	),
	'sql'                  => "int(10) unsigned NOT NULL default '0'" 
);

/*****************************************
 * Klasse tl_content_adresse
 *****************************************/
 
class tl_content_adresse extends Backend
{
	/**
	 * Import the back end user object
	 */
	public function __construct()
	{
		parent::__construct();
		$this->import('BackendUser', 'User');
	}
	/**
	 * Funktion editAdresse
	 * @param \DataContainer
	 * @return string
	 */
	public function editAdresse(DataContainer $dc)
	{
		return ($dc->value < 1) ? '' : ' <a href="contao/main.php?do=adressen&amp;table=tl_groupdata&amp;act=edit&amp;id=' . $dc->value . '&amp;popup=1&amp;rt=' . REQUEST_TOKEN . '" title="' . sprintf(specialchars($GLOBALS['TL_LANG']['tl_content']['editalias'][1]), $dc->value) . '" style="padding-left:3px" onclick="Backend.openModalIframe({\'width\':765,\'title\':\'' . specialchars(str_replace("'", "\\'", sprintf($GLOBALS['TL_LANG']['tl_content']['editalias'][1], $dc->value))) . '\',\'url\':this.href});return false">' . Image::getHtml('alias.gif', $GLOBALS['TL_LANG']['tl_content']['editalias'][0], 'style="vertical-align:top"') . '</a>';
	} 
	
	public function getAdressenTemplates()
	{
		return $this->getTemplateGroup('adresse_');
	} 
	public function getAdressenListe(DataContainer $dc)
	{
		$array = array();
		$objAdresse = $this->Database->prepare("SELECT * FROM tl_groupdata ORDER BY group_name")->execute();
		while($objAdresse->next())
		{
			($objAdresse->published) ? $aktivstatus = '' : $aktivstatus = $GLOBALS['TL_LANG']['tl_content']['adresse_nichtaktiv'];
			($objAdresse->id) ? $array[$objAdresse->id] = $objAdresse->group_name.','.$objAdresse->group_leader. ', (ID '.$objAdresse->id. ')'.$aktivstatus : $array[$objAdresse->id] = $objAdresse->nachname.$aktivstatus;
		}
		return $array;
	}
	public function getMails(DataContainer $dc)
	{
		//print_r($dc);
		$array = array();
		$objAdresse = $this->Database->prepare("SELECT * FROM tl_groupdata WHERE id = ?")
		                             ->execute($dc->activeRecord->adresse_id);
		$objAdresse->email1 ? $array[1] = $objAdresse->email1 : '';
		$objAdresse->email2 ? $array[2] = $objAdresse->email2 : '';
		$objAdresse->email3 ? $array[3] = $objAdresse->email3 : '';
		$objAdresse->email4 ? $array[4] = $objAdresse->email4 : '';
		$objAdresse->email5 ? $array[5] = $objAdresse->email5 : '';
		$objAdresse->email6 ? $array[6] = $objAdresse->email6 : '';
		return $array;
	}
	public function getThumbnail(DataContainer $dc)
	{
		$keinbild = '
<div class="w50 clr">
  <h3><label>'.$GLOBALS['TL_LANG']['tl_content']['adresse_bildvorschau_fehlt'][0].'</label></h3>
  <p class="tl_help tl_tip" title="">'.$GLOBALS['TL_LANG']['tl_content']['adresse_bildvorschau_fehlt'][1].'</p>
</div>'; 
		
		//echo "<pre>";
		//print_r($dc->activeRecord);
		//echo "</pre>";
		if($dc->activeRecord->adresse_id)
		{
			$objAdresse = $this->Database->prepare("SELECT * FROM tl_groupdata WHERE id=?")->execute($dc->activeRecord->adresse_id);
			if($objAdresse->addImage)
			{
				$strBild = '';
				(version_compare(VERSION, '3.2', '>=')) ? $objBild = \FilesModel::findByUuid($objAdresse->singleSRC) : $objBild = \FilesModel::findByPk($objAdresse->singleSRC);
				
				// Add cover image
				if($objBild !== null)
				{
					$size = unserialize($objAdresse->size);
					if(!$size[0] && !$size[1])
					{
						// Breite/Höhe nicht definiert, deshalb festlegen auf 100
						$size[0] = 100;
						$size[1] = 100;
					}
					$strBild = \Image::getHtml(\Image::get($objBild->path, $size[0], $size[1], $size[2]));
				}
				else $strBild = $GLOBALS['TL_LANG']['tl_content']['adresse_bildvorschau_leer'];
				return '
<div class="w50 clr">
  <h3><label>'.$GLOBALS['TL_LANG']['tl_content']['adresse_bildvorschau'][0].'</label></h3>
  '.$strBild.'
  <p class="tl_help tl_tip" title="">'.$GLOBALS['TL_LANG']['tl_content']['adresse_bildvorschau'][1].'</p>
</div>';
			} 
			else return $keinbild;
		}
		else return $keinbild;
	}
}
?>