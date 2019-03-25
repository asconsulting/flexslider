<?php

/**
 * Flex Slider Installer for Contao 4+
 *
 * Copyright (C) 2018 Andrew Stevens Consulting
 *
 * @package    asconsulting/flexslider_installer
 * @link       https://andrewstevens.consulting
 */
 
 

namespace FlexSlider;

class Installer extends \Controller
{

    /**
     * Initialize the object
     */
    public function __construct()
    {
        parent::__construct();

        $GLOBALS['TL_CONFIG']['debugMode'] = false;
    }


    /**
     * Install from zip
     */
    public function install()
    {
		$boolSuccess = false;
		$strError = false;
		$ch = curl_init("https://github.com/woocommerce/FlexSlider/archive/master.zip");
		curl_setopt($ch, CURLOPT_HEADER, 1);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_BINARYTRANSFER, 1);
		curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 0);
		$binRawData = curl_exec($ch);

		if (curl_errno($ch)) {
			$strError = curl_error($ch);
		}
		curl_close($ch);
		if ($strError) {
			return "Unable to get ZIP file";
		}
		
		var_dump($binRawData);
		
		\File::putContent('/files/flexslider-master.zip', $binRawData);
		if (is_readable(TL_ROOT .'/files/flexslider-master.zip')) {
			$zip = new \ZipArchive;
			if ($zip->open($this->rootDir . '/files/flexslider-master.zip') === TRUE) {
				$zip->extractTo($this->rootDir . '/var/cache/flexslider/');
				$zip->close();
				
				$objAssetsFolder = new \Folder('/var/cache/flexslider/FlexSlider-master');
				$objAssetsFolder->renameTo('/files/flexslider');
				
				$objCacheFolder = new \Folder('/var/cache/flexslider');
				$objCacheFolder->delete();
				
				$objZipFile = new \File('/files/flexslider-master.zip');
				$objZipFile->delete();
				
				\File::putContent('/files/flexslider/.public', '');
				
				if (is_readable(TL_ROOT .'/files/flexslider/flexslider.css')) {
					$boolSuccess = true;
				}
				
			}
		} else {
			die ("Zip not readable");
		}
		return $boolSuccess;
    }

}
