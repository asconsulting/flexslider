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

use Contao\Folder;
use Contao\Files;
use Contao\File;
use Contao\ZipReader;


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
		$arrFiles = array();
		$boolSuccess = false;
		$strError = false;
		
		$fh = fopen(TL_ROOT .'/files/flexslider-master.zip', 'w');
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, "https://github.com/woocommerce/FlexSlider/archive/master.zip"); 
		curl_setopt($ch, CURLOPT_FILE, $fh); 
		curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true); 
		curl_exec($ch);
		curl_close($ch);
		fclose($fh);

		if (is_readable(TL_ROOT .'/files/flexslider-master.zip')) {
			$objZipReader = new ZipReader('files/flexslider-master.zip');
			$objFolder = new \Folder('files/flexslider');
			while ($objZipReader->next()) {
				if (substr($objZipReader->file_name, 0, 17) == 'FlexSlider-master') {
					$strFilename = substr($objZipReader->file_name, 18);
					if ($strFilename) {
						\File::putContent('files/flexslider/' .$strFilename, $objZipReader->unzip());
						$arrFiles[] = 'files/flexslider/' .$strFilename;
					}
				}
			}
			unset($objZipReader);
			
			$objFolder->unprotect();
			
			$objZipFile = new File('files/flexslider-master.zip');
			$objZipFile->delete();
		}
		return (empty($arrFiles) ? false : $arrFiles);
    }

}
