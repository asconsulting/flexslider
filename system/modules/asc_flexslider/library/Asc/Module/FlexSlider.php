<?php

/**
 * Flex Slider for Contao 4+
 *
 * Copyright (C) 2018 Andrew Stevens Consulting
 *
 * @package    asconsulting/flexslider
 * @link       https://andrewstevens.consulting
 */

 
namespace Asc\Module;

use Contao\Module as Contao_Module;

/**
 * Class ModuleFlexSlider
 *
 * @copyright  Jozef Dvorský
 * @author     Jozef Dvorský
 * @package    Controller
 */
class FlexSlider extends Contao_Module {

    /**
     * Template
     * @var string
     */
    protected $strTemplate = 'flexSlider_default';

    /**
     * Display a wildcard in the back end
     *
     * @access public
     * @return string
     */
    public function generate() {
        if (TL_MODE == 'BE') {
            $objTemplate = new \BackendTemplate('be_wildcard');
            $objTemplate->wildcard = '### MODULE FLEXSLIDER ###';
            $objTemplate->title = $this->headline;
            $objTemplate->id = $this->id;
            $objTemplate->link = $this->name;
            $objTemplate->href = 'contao/main.php?do=themes&amp;table=tl_module&amp;act=edit&amp;id=' . $this->id;

            return $objTemplate->parse();
        }
        
		// Fallback to the default template
		if ($this->flexSlider_template == '')
		{
			$this->flexSlider_template = 'flexSlider_default';
		}

		$this->strTemplate = $this->flexSlider_template;
		
       if (TL_MODE == 'FE') {
		    
			
            $objTheme = $this->Database->execute("SELECT css_theme, jqeasing, cssSRC FROM tl_flexSlider WHERE id=$this->select_flexSlider");
			
			
			if ($objTheme->css_theme == '') {
                $GLOBALS['TL_CSS'][] = 'system/modules/flexslider/assets/css/flexslider_styles.css';
            }
			 elseif ($objTheme->css_theme == 'custom'){
				
				$cssSRC = String::binToUuid($objTheme->cssSRC); 
				if ($cssSRC != ''){
				$objFile = \FilesModel::findByUuid($cssSRC);  
				$GLOBALS['TL_CSS'][] = $objFile->path;
				}
				else {
					if (file_exists('system/modules/flexslider/assets/css/fstyles_custom.css') || is_file('system/modules/flexslider/assets/css/fstyles_custom.css')){
						$GLOBALS['TL_CSS'][] = 'system/modules/flexslider/assets/css/fstyles_custom.css';
					}
					else {
						$GLOBALS['TL_CSS'][] = 'system/modules/flexslider/assets/css/flexslider_styles.css';
					}
				}
			}
            else {
				$GLOBALS['TL_CSS'][] = 'system/modules/flexslider/assets/css/fstyles_'.$objTheme->css_theme.'.css';
			}
            if (version_compare(VERSION, '3', '>=')) {
                $GLOBALS['TL_JAVASCRIPT'][] = 'system/modules/flexslider/assets/js/flexslider-min.js|static';
            }
            else {
                $GLOBALS['TL_JAVASCRIPT'][] = 'system/modules/flexslider/assets/js/flexslider-min.js';
            }
			if ($objTheme->jqeasing != '') {
                $GLOBALS['TL_JAVASCRIPT'][] = 'system/modules/flexslider/assets/js/jquery.easing.1.3.js';
            }
        }
        return parent::generate();
    }

    /**
     * Generate module
     */
    protected function compile() {
        $this->Template = new \FrontendTemplate($this->flexSlider_template);
        $this->import('Database');
        $flexSlider = new FlexSlider();
        $flexSlider->compileListPicturesTemplate($this->Database,$this->select_flexSlider, $this->Template);
    }
}
?>