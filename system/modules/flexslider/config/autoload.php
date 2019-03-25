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
	
	// Frontend classes
	'FlexSlider\Frontend\FlexSlider'					=> 'system/modules/flexslider/library/FlexSlider/Frontend/FlexSlider.php',

	// Elements
	'FlexSlider\Elements\FlexSlider' 					=> 'system/modules/flexslider/library/FlexSlider/Elements/FlexSlider.php',

	// Modules
	'FlexSlider\Module\FlexSlider'  					=> 'system/modules/flexslider/library/FlexSlider/Module/FlexSlider.php',
	
	// Models
	'FlexSlider\Model\FlexImage'  						=> 'system/modules/flexslider/library/FlexSlider/Model/FlexImage.php',
	'FlexSlider\Model\FlexSlider'  						=> 'system/modules/flexslider/library/FlexSlider/Model/FlexSlider.php',	
	
	// Frontend classes
	'FlexSlider\Installer'								=> 'system/modules/flexslider/library/FlexSlider/Installer.php',
));


/**
 * Register the templates
 */
TemplateLoader::addFiles(array
(
	'mod_flexslider' 					=> 'system/modules/flexslider/templates/modules',
	'ce_flexslider' 					=> 'system/modules/flexslider/templates/content',
));
