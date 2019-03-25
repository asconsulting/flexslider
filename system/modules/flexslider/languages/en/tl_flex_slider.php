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
 * Fields
 */
$GLOBALS['TL_LANG']['tl_flex_slider']['title'] 					= array('Title', 'Please enter the slideshow title.');
$GLOBALS['TL_LANG']['tl_flex_slider']['alias'] 					= array('Alias', 'This alias is a unique reference to the FlexSlider which can be called instead of its numeric ID.');
$GLOBALS['TL_LANG']['tl_flex_slider']['slideshowSpeed'] 		= array('Slideshow speed', 'Speed of the slideshow cycling in milliseconds.');
$GLOBALS['TL_LANG']['tl_flex_slider']['animationSpeed'] 		= array('Animation speed', 'Speed of animations in milliseconds.');
$GLOBALS['TL_LANG']['tl_flex_slider']['animation'] 				= array('Animation type', 'Select your animation type, "fade" or "slide".');
$GLOBALS['TL_LANG']['tl_flex_slider']['direction'] 				= array('Sliding direction', 'Select the sliding direction, "horizontal" or "vertical".');
$GLOBALS['TL_LANG']['tl_flex_slider']['jqeasing'] 				= array('jQuery Easing', 'Select easing type or leave blank, so plugin script will not be loaded');
$GLOBALS['TL_LANG']['tl_flex_slider']['controlNav'] 			= array('Disable control navigation', 'Disable the control navigation under the slideshow.');
$GLOBALS['TL_LANG']['tl_flex_slider']['directionNav'] 			= array('Disable direction navigation', 'Disable the direction navigation on sides of the slideshow.');
$GLOBALS['TL_LANG']['tl_flex_slider']['randomize'] 				= array('Randomize', 'Randomize slide order.');
$GLOBALS['TL_LANG']['tl_flex_slider']['pauseOnHover'] 			= array('Pause on hover', 'Pause the slideshow when hovering over slider, then resume when no longer hovering.');
$GLOBALS['TL_LANG']['tl_flex_slider']['imgLinks'] 				= array('Enable image links', 'Make it possible assign links to images or show images in lightbox.');
$GLOBALS['TL_LANG']['tl_flex_slider']['imgDesc'] 				= array('Enable image description', 'Show images with descripton.');
$GLOBALS['TL_LANG']['tl_flex_slider']['carousel'] 				= array('Show thumbnails', 'Enables thumbnail carousel visible under the slideshow. Automaticly disables Randomize option.');
$GLOBALS['TL_LANG']['tl_flex_slider']['itemWidth'] 				= array('Width', 'Box-model width of individual carousel items, including horizontal borders and padding.');
$GLOBALS['TL_LANG']['tl_flex_slider']['itemMargin'] 			= array('Margin', 'Margin between carousel items.');
$GLOBALS['TL_LANG']['tl_flex_slider']['published']   			= array('Publish slideshow', 'Make the slideshow visible on the website.');


/**
 * Legends
 */
$GLOBALS['TL_LANG']['tl_flex_slider']['title_legend']   		= 'Title and alias';
$GLOBALS['TL_LANG']['tl_flex_slider']['configuration_legend'] 	= 'Configuration';
$GLOBALS['TL_LANG']['tl_flex_slider']['publish_legend']   		= 'Publish';


/**
 * Buttons
 */
$GLOBALS['TL_LANG']['tl_flex_slider']['install']    			= array('Instal FlexSlider', 'Installs FlexSlider from GitHub.');
$GLOBALS['TL_LANG']['tl_flex_slider']['new']    				= array('New slideshow', 'Create a new slideshow');
$GLOBALS['TL_LANG']['tl_flex_slider']['edit']   				= array('Edit slideshow pictures', 'Edit pictures of this slideshow ID %s');
$GLOBALS['TL_LANG']['tl_flex_slider']['editheader']   			= array('Edit slideshow', 'Edit this slideshow ID %s');
$GLOBALS['TL_LANG']['tl_flex_slider']['copy']   				= array('Duplicate slideshow', 'Duplicate this slideshow ID %s');
$GLOBALS['TL_LANG']['tl_flex_slider']['delete'] 				= array('Delete slideshow', 'Delete this slideshow ID %s');
$GLOBALS['TL_LANG']['tl_flex_slider']['toggle'] 				= array('Publish/unpublish slideshow', 'Publish/unpublish this slideshow ID %s');
$GLOBALS['TL_LANG']['tl_flex_slider']['show']   				= array('FlexSlider details', 'Show the details of this slideshow ID %s');


/**
 * Reference
 */
$GLOBALS['TL_LANG']['tl_flex_slider']['fade'] 					= 'fade';
$GLOBALS['TL_LANG']['tl_flex_slider']['slide'] 					= 'slide';
$GLOBALS['TL_LANG']['tl_flex_slider']['horizontal'] 			= 'horizontal';
$GLOBALS['TL_LANG']['tl_flex_slider']['vertical'] 				= 'vertical';
$GLOBALS['TL_LANG']['tl_flex_slider']['white'] 					= 'white border';
$GLOBALS['TL_LANG']['tl_flex_slider']['black'] 					= 'black border';
$GLOBALS['TL_LANG']['tl_flex_slider']['light'] 					= 'transparent white';
$GLOBALS['TL_LANG']['tl_flex_slider']['dark'] 					= 'transparent black';
$GLOBALS['TL_LANG']['tl_flex_slider']['custom'] 				= 'custom';

$GLOBALS['TL_LANG']['tl_flex_slider']['easeInQuad'] 			= 'easeInQuad';
$GLOBALS['TL_LANG']['tl_flex_slider']['easeOutQuad'] 			= 'easeOutQuad';
$GLOBALS['TL_LANG']['tl_flex_slider']['easeInOutQuad'] 			= 'easeInOutQuad';
$GLOBALS['TL_LANG']['tl_flex_slider']['easeInCubic'] 			= 'easeInCubic';
$GLOBALS['TL_LANG']['tl_flex_slider']['easeOutCubic'] 			= 'easeOutCubic';
$GLOBALS['TL_LANG']['tl_flex_slider']['easeInOutCubic'] 		= 'easeInOutCubic';
$GLOBALS['TL_LANG']['tl_flex_slider']['easeInQuart'] 			= 'easeInQuart';
$GLOBALS['TL_LANG']['tl_flex_slider']['easeOutQuart'] 			= 'easeOutQuart';
$GLOBALS['TL_LANG']['tl_flex_slider']['easeInOutQuart'] 		= 'easeInOutQuart';
$GLOBALS['TL_LANG']['tl_flex_slider']['easeInQuint'] 			= 'easeInQuint';
$GLOBALS['TL_LANG']['tl_flex_slider']['easeOutQuint'] 			= 'easeOutQuint';
$GLOBALS['TL_LANG']['tl_flex_slider']['easeInOutQuint'] 		= 'easeInOutQuint';
$GLOBALS['TL_LANG']['tl_flex_slider']['easeInSine'] 			= 'easeInSine';
$GLOBALS['TL_LANG']['tl_flex_slider']['easeOutSine'] 			= 'easeOutSine';
$GLOBALS['TL_LANG']['tl_flex_slider']['easeInOutSine'] 			= 'easeInOutSine';
$GLOBALS['TL_LANG']['tl_flex_slider']['easeInExpo'] 			= 'easeInExpo';
$GLOBALS['TL_LANG']['tl_flex_slider']['easeOutExpo'] 			= 'easeOutExpo';
$GLOBALS['TL_LANG']['tl_flex_slider']['easeInOutExpo'] 			= 'easeInOutExpo';
$GLOBALS['TL_LANG']['tl_flex_slider']['easeInCirc'] 			= 'easeInCirc';
$GLOBALS['TL_LANG']['tl_flex_slider']['easeOutCirc'] 			= 'easeOutCirc';
$GLOBALS['TL_LANG']['tl_flex_slider']['easeInOutCirc'] 			= 'easeInOutCirc';
$GLOBALS['TL_LANG']['tl_flex_slider']['easeInElastic'] 			= 'easeInElastic';
$GLOBALS['TL_LANG']['tl_flex_slider']['easeOutElastic'] 		= 'easeOutElastic';
$GLOBALS['TL_LANG']['tl_flex_slider']['easeInOutElastic'] 		= 'easeInOutElastic';
$GLOBALS['TL_LANG']['tl_flex_slider']['easeInBack'] 			= 'easeInBack';
$GLOBALS['TL_LANG']['tl_flex_slider']['easeOutBack'] 			= 'easeOutBack';
$GLOBALS['TL_LANG']['tl_flex_slider']['easeInOutBack'] 			= 'easeInOutBack';
$GLOBALS['TL_LANG']['tl_flex_slider']['easeInBounce'] 			= 'easeInBounce';
$GLOBALS['TL_LANG']['tl_flex_slider']['easeOutBounce'] 			= 'easeOutBounce';
$GLOBALS['TL_LANG']['tl_flex_slider']['easeInOutBounce'] 		= 'easeInOutBounce';
