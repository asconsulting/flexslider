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
	'FlexSlider\Backend\FlexImage'		=> 'system/modules/asc_flexslider/library/FlexSlider/Backend/FlexImage.php',
	'FlexSlider\Backend\FlexSlider'		=> 'system/modules/asc_flexslider/library/FlexSlider/Backend/FlexSlider.php',
	
	// Frontend classes
	'FlexSlider\Frontend\FlexSlider'	=> 'system/modules/asc_flexslider/library/FlexSlider/Frontend/FlexSlider.php',

	// Elements
	'FlexSlider\Elements\FlexSlider' 	=> 'system/modules/asc_flexslider/library/FlexSlider/Elements/FlexSlider.php',

	// Modules
	'FlexSlider\Module\FlexSlider'  	=> 'system/modules/asc_flexslider/library/FlexSlider/Module/FlexSlider.php',
	
	// Models
	'Contao\FlexPicturesModel'  => 'system/modules/asc_flexslider/models/FlexPicturesModel.php',
	'Contao\FlexSliderModel'  	=> 'system/modules/asc_flexslider/models/FlexSliderModel.php',
));


/**
 * Register the templates
 */
TemplateLoader::addFiles(array
(
	'mod_flexslider' 			=> 'system/modules/asc_flexslider/templates/modules',
));
