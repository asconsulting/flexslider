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
 *
 * Backend Modules
 *
 */
$GLOBALS['BE_MOD']['content']['flexSlider'] = array (
    
    'icon'       => 'system/modules/flexslider/assets/images/fs_icon.png',
    'tables'     => array('tl_flexSlider', 'tl_flexPictures')
);


/**
 *
 * Frontend Modules
 *
 */
array_insert($GLOBALS['FE_MOD']['application'], 0, array (

    'flexSlider' => 'ModuleFlexSlider'
));


/**
 *
 * Content Element
 *
 */
$GLOBALS['TL_CTE']['media']['flexSlider'] = 'ContentFlexSlider';
