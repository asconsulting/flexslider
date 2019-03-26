<?php

/**
 * Flex Slider for Contao 4+
 *
 * Copyright (C) 2018 Andrew Stevens Consulting
 *
 * @package	   asconsulting/flexslider
 * @link	   https://andrewstevens.consulting
 */
 


/**
 * Run in a custom namespace, so the class can be replaced
 */
namespace FlexSlider\ContentElement;

use FlexSlider\Model\FlexImage as FlexImageModel;
use FlexSlider\Model\FlexSlider as FlexSliderModel;
use Contao\ContentElement as Contao_ContentElement;
use Contao\FilesModel;
use Contao\Environment;


class FlexSlider extends Contao_ContentElement {

    /**
     * Template
     * @var string
     */
    protected $strTemplate = 'ce_flexslider';
	

    /**
     * Generate module
     */
    protected function compile() {

		$arrImages = array();
		
		FlexImageModel::updatePublished();	
	
		$objFlexSlider = FlexSliderModel::findByPk($this->flexslider, array('return' => 'Model'));
		$objFlexImage = FlexImageModel::findBy('pid', $this->flexslider, array('return' => 'Collection'));

		if ($objFlexSlider) {
			$GLOBALS['TL_CSS'][] = Environment::get('url'). '/flexslider/flexslider.css';
			$GLOBALS['TL_JAVASCRIPT'][] = Environment::get('url'). '/flexslider/jquery.flexslider-min.js';
			$this->Template->configuration = $objFlexSlider->row();
			if ($objFlexSlider->jqeasing) {
				$GLOBALS['TL_JAVASCRIPT'][] = 'https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js';
			}
			
			if ($objFlexImage->count()) {
				while($objFlexImage->next()) {
					$objFile = FilesModel::findByUuid($objFlexImage->singleSRC);
					
					if ($objFile) {
						$arrImage = array();
						$strImagePath = $objFile->path;
						$arrImage['singleSRC'] = $strImagePath;
						$arrImage['alt'] = $objFlexImage->alt;
						if ($objFlexSlider->imgDesc) {
							$arrImage['description'] = $objFlexImage->description;
							$arrImage['fadeDesc'] = $objFlexImage->fadeDesc;
						}
						
						if ($objFlexSlider->imgLinks) {
							if ($objFlexImage->linkTarget) {
								if ($objFlexImage->fullsize) {
									if (preg_match('/\.(jpe?g|gif|png)$/', $objFlexImage->linkTarget)) {
										if (strncmp($objFlexImage->linkTarget, 'http://', 7) !== 0 && strncmp($objFlexImage->linkTarget, 'https://', 8) !== 0) {
											$arrImage['linkTarget'] = ' href="' .TL_FILES_URL .$objFlexImage->linkTarget .'"';					
										} else {
											$arrImage['linkTarget'] = ' href="' .$objFlexImage->linkTarget .'"';
										}
										$arrImage['attributes'] = ' data-lightbox="' .$objSlider->alias . '"';
									} else {
										$arrImage['linkTarget'] = ' href="' .$objFlexImage->linkTarget .'"';
										$arrImage['attributes'] = ' target="_blank"';
									}
								} else {
									$arrImage['linkTarget'] = ' href="' .$objFlexImage->linkTarget .'"';
								}
							} elseif ($objFlexImage->fullsize && $objFlexImage->linkTarget == '') {
								$arrImage['linkTarget'] = ' href="' .$strImagePath .'"';
								$arrImage['attributes'] = ' data-lightbox="' .$objSlider->alias . '"';
							}
						}
						
						if ($objFlexImage->cssID) {
							$arrCss = deserialize($objFlexImage->cssID); 
							$arrImage['cssID'] = $arrCss[0];
							$arrImage['cssCLASS'] = $arrCss[1];
						}
						$arrImages[$objFlexImage->id] = $arrImage;
					}
				}
			}
			$this->Template->images = $arrImages;
		} else {
			return 'Flexslider not found';
		}
	}
	
}