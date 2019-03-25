<?php

/**
 * Flex Slider for Contao 4+
 *
 * Copyright (C) 2018 Andrew Stevens Consulting
 *
 * @package	   asconsulting/flexslider
 * @link	   https://andrewstevens.consulting
 */
 

 
namespace FlexSlider\Backend;

use FlexSlider\Installer;
use Contao\FilesModel;
use Contao\Backend as Contao_Backend;
use Contao\File;
use Contao\DataContainer;


class FlexSlider extends Contao_Backend
{
	
	public function installFlexslider() {
		$objInstaller = new Installer();
		$boolSuccess = $objInstaller->install();
		return ($boolSuccess ? "FlexSlider has been installed" : "Failed to install FlexSlider.");
	}
	
	public function addImageCount($row, $label) {
		$objImage = $this->Database->prepare("SELECT COUNT(*) AS count FROM tl_flex_image WHERE pid=?")->execute($row['id']);
		$label .= ' <span style="color:#b3b3b3; padding-left:3px;">' . sprintf('[%s ' . $GLOBALS['TL_LANG']['tl_flex_slider']['images'] . ']', $objChildren->count) . '</span>';
		return $label;
	}
	
	
	/**
	 * Auto-generate an alias if it has not been set yet
	 * @param mixed
	 * @param \DataContainer
	 * @return string
	 * @throws \Exception
	 */
	public function generateAlias($varValue, \DataContainer $dc)
	{
		$autoAlias = false;
		
		// Generate an alias if there is none
		if ($varValue == '')
		{
			$autoAlias = true;
			$varValue = standardize(\StringUtil::restoreBasicEntities($dc->activeRecord->title));
			
		}

		$objAlias = $this->Database->prepare("SELECT id FROM tl_flex_slider WHERE id=? OR alias=?")
								   ->execute($dc->id, $varValue);

		// Check whether the page alias exists
		if ($objAlias->numRows > 1)
		{
			if (!$autoAlias)
			{
				throw new Exception(sprintf($GLOBALS['TL_LANG']['ERR']['aliasExists'], $varValue));
			}

			$varValue .= '-' . $dc->id;
		}

		return $varValue;
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
	public function installIcon($row, $href, $label, $title, $icon, $attributes)
	{
		$objFile = new File('files/flexslider/flexslider.css');
		if ($objFile) {
			$title = str_replace('Install', 'Update/Re-install', $title);
		};
		
		return '<a href="'.$this->addToUrl($href).'" title="'.specialchars($title).'"'.$attributes.'>'.\Image::getHtml($icon, $label).'</a> ';
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
		$objVersions = new \Versions('tl_flex_slider', $intId);
		$objVersions->initialize();

		// Trigger the save_callback
		if (is_array($GLOBALS['TL_DCA']['tl_flex_slider']['fields']['published']['save_callback']))
		{
			foreach ($GLOBALS['TL_DCA']['tl_flex_slider']['fields']['published']['save_callback'] as $callback)
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
		$this->Database->prepare("UPDATE tl_flex_slider SET tstamp=". time() .", published='" . ($blnVisible ? 1 : '') . "' WHERE id=?")
					   ->execute($intId);

		$objVersions->create();
		$this->log('A new version of record "tl_flex_slider.id='.$intId.'" has been created'.$this->getParentEntries('tl_flex_slider', $intId), __METHOD__, TL_GENERAL);
	}	

}
