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
 * Add palettes to tl_module
 */
$GLOBALS['TL_DCA']['tl_content']['palettes']['flexSlider'] = '{type_legend},type,headline;{flexslider_legend},flexslider;{template_legend:hide},customTpl;{protected_legend:hide},protected;{expert_legend:hide},guests,cssID,space';

/**
 * Add fields to tl_module
 */
$GLOBALS['TL_DCA']['tl_content']['fields']['flexslider'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_content']['flexslider'],
	'exclude'                 => true,
	'inputType'               => 'radio',
	'foreignKey'              => 'tl_flexSlider.title',
	'eval'                    => array('mandatory'=>true)
);
