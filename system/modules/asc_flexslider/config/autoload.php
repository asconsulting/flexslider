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
	// Classes
	'Asc\Frontend\FlexSlider'	=> 'system/modules/asc_flexslider/library/Asc/Frontend/FlexSlider.php',

	// Elements
	'Asc\Elements\FlexSlider' 	=> 'system/modules/asc_flexslider/library/Asc/Elements/FlexSlider.php',

	// Modules
	'Asc\Module\FlexSlider'  	=> 'system/modules/asc_flexslider/library/Asc/Module/FlexSlider.php',
	
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
