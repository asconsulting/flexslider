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
		
		/*
		$ch = curl_init("https://github.com/woocommerce/FlexSlider/archive/master.zip");
		curl_setopt($ch, CURLOPT_HEADER, 1);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_BINARYTRANSFER, 1);
		curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
		$binRawData = curl_exec($ch);

		if (curl_errno($ch)) {
			$strError = curl_error($ch);
		}
		curl_close($ch);
		if ($strError) {
			return "<h4>Unable to get ZIP file</h4>" .$strError;
		}
		
		
		file_put_contents(TL_ROOT .'/files/flexslider-master.zip', $binRawData);
		*/
		
		
	//	\File::putContent('/files/flexslider-master.zip', $binRawData);
		if (is_readable(TL_ROOT .'/files/flexslider-master.zip')) {
			$objZipReader = new ZipReader('files/flexslider-master.zip');
			$objFolder = new \Folder('files/flexslider');
			while ($objZipReader->next()) {
				if (substr($objZipReader->file_name, 0, 17) == 'FlexSlider-master') {
					echo substr($objZipReader->file_name, 17) .'<br>';
					//\File::putContent('/files/flexslider' .substr($objZipReader->file_name, 17), $objZipReader->unzip());
				}
			}

			die("Maybe?");
			/*
			$zip = new \ZipArchive;
			if ($zip->open(TL_ROOT .'/files/flexslider-master.zip') === TRUE) {
				$zip->extractTo(TL_ROOT .'/var/cache/flexslider/');
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
			*/
		} else {
			die ("Zip not readable");
		}
		return $boolSuccess;
    }

}
