<?php

/**
 * Contao Open Source CMS
 *
 * Copyright (C) 2005-2012 Leo Feyer
 *
 * @package FlexSlider
 * @link    http://www.contao.org
 * @license http://www.gnu.org/licenses/lgpl-3.0.html LGPL
 */

 

/**
 * Add palettes to tl_module
 */
$GLOBALS['TL_DCA']['tl_module']['palettes']['flexslider'] = '{title_legend},name,type,headline;{flexslider_legend},flexslider;{template_legend:hide},customTpl;{config_legend},align,space,cssID';


/**
 * Add fields to tl_module
 */
$GLOBALS['TL_DCA']['tl_module']['fields']['flexslider'] = array
(
    'label'                   => &$GLOBALS['TL_LANG']['tl_module']['flexslider'],
    'exclude'                 => true,
    'inputType'               => 'radio',
    'foreignKey'              => 'tl_flex_slider.title',
    'eval'                    => array('mandatory'=>true)
);
