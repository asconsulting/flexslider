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
 * Back end modules
 */
if (!is_array($GLOBALS['BE_MOD']['flexslider']))
{
    array_insert($GLOBALS['BE_MOD'], 1, array('flexslider' => array()));
}

array_insert($GLOBALS['BE_MOD']['flexslider'], 0, array
( 
	'flexslider' => array
	(
		'tables' => array('tl_flex_slider', 'tl_flex_image')
	)
));


/**
 * Front end modules
 */ 
$GLOBALS['FE_MOD']['flexslider']['flexslider'] 	= 'FlexSlider\Module\FlexSlider';


/**
 * Content Element
 */
$GLOBALS['TL_CTE']['media']['flexslider'] 		= 'FlexSlider\ContentElement\Flexslider';


/**
 * Models
 */
$GLOBALS['TL_MODELS']['tl_flex_slider'] 		= 'FlexSlider\Model\FlexSlider';
$GLOBALS['TL_MODELS']['tl_flex_image'] 			= 'FlexSlider\Model\FlexImage';


/**
 * Styles
 */
 if (version_compare(VERSION, '4.4', '>=')) {
	$GLOBALS['TL_CSS'][] = 'system/modules/flexslider/assets/css/backend-contao4.css|static';
}
