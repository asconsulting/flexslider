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
 * Table tl_flex_slider
 */
$GLOBALS['TL_DCA']['tl_flex_slider'] = array
(
 
    // Config
    'config' => array
    (
        'dataContainer'               => 'Table',
		'ctable'					  => array('tl_flex_image'),
        'enableVersioning'            => true,
        'switchToEdit'                => true,
        'sql' => array
        (
            'keys' => array
            (
                'id' => 'primary'
            )
        )
    ),
 
    // List
    'list' => array
    (
		'sorting' => array
		(
			'mode' 					=> 1,
			'fields' 				=> array('title'),
			'flag' 					=> 1,
            'panelLayout' 			=> 'search'
		),
		'label' => array
		(
			'fields' 				=> array('title'),
			'format' 				=> '%s',
            'label_callback' 		=> array('FlexSlider\Backend\FlexSlider', 'addImageCount')
		),
        'global_operations' => array
        (            
			'install' => array
            (
                'label'               => &$GLOBALS['TL_LANG']['tl_flex_slider']['install'],
                'href'                => 'key=install',
                'class'               => 'header_install',
				'icon'  			  => 'changelog.gif',
            ),
            'all' => array
            (
                'label' 			=> &$GLOBALS['TL_LANG']['MSC']['all'],
                'href' 				=> 'act=select',
                'class' 			=> 'header_edit_all',
                'attributes' 		=> 'onclick="Backend.getScrollOffset()" accesskey="e"'
            )
        ),
        'operations' => array
        (
			'edit' => array
			(
				'label'               => &$GLOBALS['TL_LANG']['tl_flex_slider']['edit'],
				'href'                => 'table=tl_flex_image',
				'icon'                => 'edit.svg'
			),
			'editheader' => array
            (
                'label'               => &$GLOBALS['TL_LANG']['tl_flex_slider']['editheader'],
                'href'                => 'act=edit',
                'icon'                => 'header.svg',
            ),
			'copy' => array
			(
				'label'               => &$GLOBALS['TL_LANG']['tl_flex_slider']['copy'],
				'href'                => 'act=copy',
				'icon'                => 'copy.svg'
			),
			'delete' => array
			(
				'label'               => &$GLOBALS['TL_LANG']['tl_flex_slider']['delete'],
				'href'                => 'act=delete',
				'icon'                => 'delete.svg',
				'attributes'          => 'onclick="if (!confirm(\'' . $GLOBALS['TL_LANG']['MSC']['deleteConfirm'] . '\')) return false; Backend.getScrollOffset();"'
			),
            'toggle' => array
            (
                'label'               => &$GLOBALS['TL_LANG']['tl_flex_slider']['toggle'],
                'icon'                => 'visible.svg',
                'attributes'          => 'onclick="Backend.getScrollOffset(); return AjaxRequest.toggleVisibility(this, %s);"',
                'button_callback'     => array('FlexSlider\Backend\FlexSlider', 'toggleIcon')
           ),
			'show' => array
			(
				'label'               => &$GLOBALS['TL_LANG']['tl_flex_slider']['show'],
				'href'                => 'act=show',
				'icon'                => 'show.svg'
			)
        )
    ),
 
    // Palettes
    'palettes' => array
    (
		'__selector__'                => array('carousel', 'css_theme'),
		'default'                     => '{title_legend},title,alias;{configuration_legend},slideshowSpeed,animationSpeed,animation,direction,jqeasing,controlNav,directionNav,randomize,pauseOnHover,imgLinks,imgDesc,carousel;{publish_legend},published'
    ),
	
	// Subpalettes
	'subpalettes' => array
	(
		 'carousel'                  => 'itemWidth,itemMargin'
	),
	
    // Fields
    'fields' => array
    (
        'id' => array
        (
            'sql'                     => "int(10) unsigned NOT NULL auto_increment"
        ),
        'tstamp' => array
        (
            'sql'                     => "int(10) unsigned NOT NULL default '0'"
        ),
		'title' => array
		(
            'label'                   => &$GLOBALS['TL_LANG']['tl_flex_slider']['title'],
			'search'                  => true,
			'sorting'                 => true,
			'flag'                    => 1,
            'inputType'               => 'text',
            'eval'                    => array('maxlength'=>255, 'tl_class'=>'w50', 'mandatory'=>true),
            'sql'                     => "varchar(255) NOT NULL default ''"		
		),
        'alias' => array
        (
            'label'                   => &$GLOBALS['TL_LANG']['tl_flex_slider']['alias'],
            'exclude'                 => true,
            'inputType'               => 'text',
            'eval'                    => array('rgxp'=>'alnum', 'doNotCopy'=>true, 'spaceToUnderscore'=>true, 'maxlength'=>128, 'tl_class'=>'w50'),
            'save_callback' => array
            (
				array('FlexSlider\Backend\FlexSlider', 'generateAlias')
            ),            
			'sql'                     => "varchar(255) NOT NULL default ''"		
        ),
		'slideshowSpeed' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_flex_slider']['slideshowSpeed'],
            'default'                 => '3000',
			'inputType'               => 'text',
			'eval'                    => array('rgxp'=>'natural', 'mandatory'=>true, 'maxlength'=>10, 'tl_class'=>'w50'),
            'sql'                     => "int(10) unsigned NOT NULL default '0'"
		),

		'animationSpeed' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_flex_slider']['animationSpeed'],
            'default'                 => '600',
			'inputType'               => 'text',
			'eval'                    => array('rgxp'=>'natural', 'mandatory'=>true, 'maxlength'=>10, 'tl_class'=>'w50'),
            'sql'                     => "int(10) unsigned NOT NULL default '0'"
		),
        'animation' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_flex_slider']['animation'],
            'default'                 => 'slide',
			'inputType'               => 'select',
            'options'                 => array('fade', 'slide'),
			'reference'               => &$GLOBALS['TL_LANG']['tl_flex_slider'],
			'eval'                    => array('includeBlankOption'=>false, 'tl_class'=>'w50'),
            'sql'                     => "varchar(64) NOT NULL default ''"
		),
		'direction' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_flex_slider']['direction'],
            'default'                 => 'horizontal',
			'inputType'               => 'select',
            'options'                 => array('horizontal', 'vertical'),
			'reference'               => &$GLOBALS['TL_LANG']['tl_flex_slider'],
			'eval'                    => array('includeBlankOption'=>false, 'tl_class'=>'w50'),
            'sql'                     => "varchar(64) NOT NULL default ''"
		),
		'jqeasing' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_flex_slider']['jqeasing'],
            'default'                 => '',
			'inputType'               => 'select',
            'options'                 => array('easeInQuad', 'easeOutQuad', 'easeInOutQuad', 'easeInCubic', 'easeOutCubic', 'easeInOutCubic', 'easeInQuart', 'easeOutQuart', 'easeInOutQuart', 'easeInQuint', 'easeOutQuint', 'easeInOutQuint', 'easeInSine', 'easeOutSine', 'easeInOutSine', 'easeInExpo', 'easeOutExpo', 'easeInOutExpo', 'easeInCirc', 'easeOutCirc', 'easeInOutCirc', 'easeInElastic', 'easeOutElastic', 'easeInOutElastic', 'easeInBack', 'easeOutBack', 'easeInOutBack', 'easeInBounce', 'easeOutBounce', 'easeInOutBounce'),
			'reference'               => &$GLOBALS['TL_LANG']['tl_flex_slider'],
			'eval'                    => array('includeBlankOption'=>true, 'tl_class'=>'clr w50'),
            'sql'                     => "varchar(64) NOT NULL default ''"
		),
		'controlNav' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_flex_slider']['controlNav'],
			'exclude'                 => false,
			'inputType'               => 'checkbox',
			'eval'                    => array('tl_class'=>'clr w50 m12'),
			'sql'                     => "char(1) NOT NULL default ''"
		), 
		'directionNav' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_flex_slider']['directionNav'],
			'exclude'                 => false,
			'inputType'               => 'checkbox',
			'eval'                    => array('tl_class'=>'w50 m12'),
			'sql'                     => "char(1) NOT NULL default ''"
		), 
        'randomize' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_flex_slider']['randomize'],
			'exclude'                 => false,
			'inputType'               => 'checkbox',
			'eval'                    => array('isBoolean' => true, 'tl_class'=>'w50 m12'),
			'sql'                     => "char(1) NOT NULL default ''"
		), 
		'pauseOnHover' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_flex_slider']['pauseOnHover'],
			'inputType'               => 'checkbox',
			'eval'                    => array('tl_class'=>'w50 m12'),
			'sql'                     => "char(1) NOT NULL default ''"
		), 
		'imgLinks' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_flex_slider']['imgLinks'],
			'inputType'               => 'checkbox',
			'eval'                    => array('isBoolean' => true, 'tl_class'=>'w50 m12'),
			'sql'                     => "char(1) NOT NULL default ''"
		), 
		'imgDesc' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_flex_slider']['imgDesc'],
			'inputType'               => 'checkbox',
			'eval'                    => array('isBoolean' => true, 'tl_class'=>'w50 m12'),
			'sql'                     => "char(1) NOT NULL default ''"
		), 
		'carousel' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_flex_slider']['carousel'],
			'inputType'               => 'checkbox',
			'eval'                    => array('submitOnChange'=>true, 'tl_class'=>'clr m12 long'),
			'sql'                     => "char(1) NOT NULL default ''"
		), 
		'itemWidth' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_flex_slider']['itemWidth'],
            'default'                 => '250',
			'inputType'               => 'text',
			'eval'                    => array('rgxp'=>'digit', 'mandatory'=>true, 'maxlength'=>12, 'tl_class'=>'w50'),
			'sql'                     => "varchar(12) NOT NULL default ''"
		),
		'itemMargin' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_flex_slider']['itemMargin'],
            'default'                 => '5',
			'inputType'               => 'text',
			'eval'                    => array('rgxp'=>'digit', 'mandatory'=>true, 'maxlength'=>12, 'tl_class'=>'w50'),
			'sql'                     => "varchar(12) NOT NULL default ''"
		),
		'published' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_flex_slider']['published'],
			'inputType'               => 'checkbox',
			'filter'                  => true,
			'eval'                    => array('doNotCopy'=>true),
			'sql'                     => "char(1) NOT NULL default ''"
		)
    )
);
