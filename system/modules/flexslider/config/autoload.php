<?php

/**
 * Flex Slider for Contao 4+
 *
 * Copyright (C) 2018 Andrew Stevens Consulting
 *
 * @package    asconsulting/flexslider
 * @link       https://andrewstevens.consulting
 */


 
/**
 * Register the classes
 */
ClassLoader::addClasses(array
(
	// Backend classes
	'FlexSlider\Backend\FlexImage'						=> 'system/modules/flexslider/library/FlexSlider/Backend/FlexImage.php',
	'FlexSlider\Backend\FlexSlider'						=> 'system/modules/flexslider/library/FlexSlider/Backend/FlexSlider.php',
	
	// Content Element
	'FlexSlider\ContentElement\FlexSlider'				=> 'system/modules/flexslider/library/FlexSlider/ContentElement/FlexSlider.php',
	
	// Event Listener
	'FlexSlider\EventListener\SymlinkCommandListener'	=> 'system/modules/flexslider/library/FlexSlider/EventListener/SymlinkCommandListener.php',
	
	// Frontend classes
	'FlexSlider\Frontend\FlexSlider'					=> 'system/modules/flexslider/library/FlexSlider/Frontend/FlexSlider.php',

	// Elements
	'FlexSlider\Elements\FlexSlider' 	=> 'system/modules/flexslider/library/FlexSlider/Elements/FlexSlider.php',

	// Modules
	'FlexSlider\Module\FlexSlider'  	=> 'system/modules/flexslider/library/FlexSlider/Module/FlexSlider.php',
	
	// Models
	'Contao\FlexPicturesModel'  		=> 'system/modules/flexslider/models/FlexPicturesModel.php',
	'Contao\FlexSliderModel'  			=> 'system/modules/flexslider/models/FlexSliderModel.php',
	
	// Contao Manager
	'FlexSlider\ContaoManager\Plugin'	=> 'system/modules/flexslider/ContaoManager/Plugin.php'
));


/**
 * Register the templates
 */
TemplateLoader::addFiles(array
(
	'mod_flexslider' 					=> 'system/modules/flexslider/templates/modules',
	'ce_flexslider' 					=> 'system/modules/flexslider/templates/content',
));
