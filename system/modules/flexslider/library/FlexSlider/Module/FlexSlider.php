<?php

/**
 * Flex Slider for Contao 4+
 *
 * Copyright (C) 2018 Andrew Stevens Consulting
 *
 * @package    asconsulting/flexslider
 * @link       https://andrewstevens.consulting
 */

 
namespace FlexSlider\Module;

use Contao\Module as Contao_Module;
use FlexSlider\ContentElement\FlexSlider as FlexSliderElement;

class FlexSlider extends Contao_Module {

    /**
     * Template
     * @var string
     */
    protected $strTemplate = 'mod_flexslider';


    /**
     * Display a wildcard in the back end
     * @return string
     */
    public function generate()
    {
        if (TL_MODE == 'BE')
        {
            $objTemplate = new \BackendTemplate('be_wildcard');
 
            $objTemplate->wildcard = '### ' . utf8_strtoupper($GLOBALS['TL_LANG']['FMD']['flexslider'][0]) . ' ###';
            $objTemplate->title = $this->headline;
            $objTemplate->id = $this->id;
            $objTemplate->link = $this->name;
            $objTemplate->href = 'contao/main.php?do=themes&table=tl_module&act=edit&id=' . $this->id;
 
            return $objTemplate->parse();
        }
 
        return parent::generate();
    }
	
	
    /**
     * Generate module
     */
    protected function compile() {

		$arrImages = array();
	
		$objFlexSlider = FlexSliderModel::findByPk($this->flexslider, array('return' => 'Model'));
		$objFlexImage = FlexImageModel::findBy('pid', $this->flexslider, array('order' => 'sorting', 'return' => 'Collection'));

		if ($objFlexSlider) {
			
			$this->Template->configuration = $objFlexSlider->row();
			
			if (!in_array(Environment::get('url'). '/files/flexslider/flexslider.css', $GLOBALS['TL_CSS'])) {
				$GLOBALS['TL_CSS'][] = Environment::get('url'). '/files/flexslider/flexslider.css';
			}
			if (!in_array(Environment::get('url'). '/files/flexslider/jquery.flexslider-min.js', $GLOBALS['TL_JAVASCRIPT'])) {
				$GLOBALS['TL_JAVASCRIPT'][] = Environment::get('url'). '/files/flexslider/jquery.flexslider-min.js';
			}
			if ($objFlexSlider->jqeasing) {
				if (!in_array('https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js', $GLOBALS['TL_JAVASCRIPT'])) {
					$GLOBALS['TL_JAVASCRIPT'][] = 'https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js';
				}
			}
			
			if ($objFlexImage->count()) {
				while($objFlexImage->next()) {
					if ($objFlexImage->published) {
					
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
			}
			$this->Template->images = $arrImages;
		} else {
			return 'Flexslider not found';
		}
    }
}
?>