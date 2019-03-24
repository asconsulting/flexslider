<?php

/**
 * Flex Slider for Contao 4+
 *
 * Copyright (C) 2018 Andrew Stevens Consulting
 *
 * @package    asconsulting/flexslider
 * @link       https://andrewstevens.consulting
 */
 

 
namespace FlexSlider\Backend;

use Contao\FilesModel;
use Contao\Backend as Contao_Backend;
use Contao\DataContainer;
use Contao\Database;


class FlexImage extends Contao_Backend
{
    /**
     * Add the type of input field
     *
     * @param array
     * @return string
     */
    public function getImage($arrRow) {
        $objFile = FilesModel::findByUuid($arrRow['singleSRC']);
        $strImage = \Image::get($objFile->path, 150, 150, 'center_center');

        return '<div class="cte_type ' .($arrRow['published'] ? 'published' : 'unpublished') .'" style="color:#444;"> ' .$arrRow['name'] .'</div><div class="limit_height h64 block' .(!$GLOBALS['TL_CONFIG']['doNotCollapse'] ? ' h52' : '') . ' block"><div style="float: left; margin-right: 10px;"><img src="' .$strImage .'" /></div></div>' ."\n";
    }

	/**
	 * Return the "toggle visibility" button
	 * @param array
	 * @param string
	 * @param string
	 * @param string
	 * @param string
	 * @param string
	 * @return string
	 */
	public function toggleIcon($row, $href, $label, $title, $icon, $attributes)
	{
		if (strlen(\Input::get('tid')))
		{
			$this->toggleVisibility(\Input::get('tid'), (\Input::get('state') == 1), (@func_get_arg(12) ?: null));
			$this->redirect($this->getReferer());
		}

		$href .= '&amp;tid='.$row['id'].'&amp;state='.($row['published'] ? '' : 1);

		if (!$row['published'])
		{
			$icon = 'invisible.gif';
		}

		return '<a href="'.$this->addToUrl($href).'" title="'.specialchars($title).'"'.$attributes.'>'.\Image::getHtml($icon, $label).'</a> ';
	}	
	
	
	/**
	 * Disable/enable a user group
	 * @param integer
	 * @param boolean
	 * @param \DataContainer
	 */
	public function toggleVisibility($intId, $blnVisible, \DataContainer $dc=null)
	{
		$objVersions = new \Versions('tl_flex_image', $intId);
		$objVersions->initialize();

		// Trigger the save_callback
		if (is_array($GLOBALS['TL_DCA']['tl_flex_image']['fields']['published']['save_callback']))
		{
			foreach ($GLOBALS['TL_DCA']['tl_flex_image']['fields']['published']['save_callback'] as $callback)
			{
				if (is_array($callback))
				{
					$this->import($callback[0]);
					$blnVisible = $this->$callback[0]->$callback[1]($blnVisible, ($dc ?: $this));
				}
				elseif (is_callable($callback))
				{
					$blnVisible = $callback($blnVisible, ($dc ?: $this));
				}
			}
		}

		// Update the database
		$this->Database->prepare("UPDATE tl_flex_image SET tstamp=". time() .", published='" . ($blnVisible ? 1 : '') . "' WHERE id=?")
					   ->execute($intId);

		$objVersions->create();
		$this->log('A new version of record "tl_flex_image.id='.$intId.'" has been created'.$this->getParentEntries('tl_flex_image', $intId), __METHOD__, TL_GENERAL);
	}	
    
	
	public function loadPalette(DataContainer $dc) {
    	if (!$dc->id){
			return;
    	}
   
    	if ($this->Input->get('act'))  {
			$objConfig = $this->Database->prepare("SELECT c.pid, p.imgLinks, p.imgDesc FROM tl_flexPictures c, tl_flexSlider p WHERE c.id=? AND p.id=c.pid")->execute($dc->id);
    		if ($objConfig->imgLinks) {
				$GLOBALS['TL_DCA']['tl_flex_image']['palettes']['default'] = str_replace('singleSRC', 'singleSRC;{link_legend},linkTarget,fullsize;', $GLOBALS['TL_DCA']['tl_flex_image']['palettes']['default']);
			}
			if ($objConfig->imgDesc) {
				$GLOBALS['TL_DCA']['tl_flex_image']['palettes']['default']=str_replace('singleSRC', 'singleSRC;{desc_legend},description,fadeDesc,cssID;', $GLOBALS['TL_DCA']['tl_flex_image']['palettes']['default']);
			}
		}
	}
	
	public static function updatePublished() {
		Database::getInstance()->prepare("UPDATE tl_flex_image SET published='1' WHERE start <= ? AND (stop >= ? OR stop='')")->execute(time(), time());
		Database::getInstance()->prepare("UPDATE tl_flex_image SET published='' WHERE stop <= ? AND stop!=''")->execute(time());
	}
}
