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
 * Table tl_flex_image
 */
$GLOBALS['TL_DCA']['tl_flex_image'] = array
(
 
    // Config
    'config' => array
    (
        'dataContainer'               => 'Table',
		'ptable'					  => 'tl_flex_slider',
        'enableVersioning'            => true,
		'onload_callback'             => array
		(
			array('FlexSlider\Backend\FlexImage', 'loadPalette')
		),
        'sql' => array
        (
            'keys' => array
            (
                'id' 	=> 'primary',
				'pid'	=> 'index'
            )
        )
    ),
 
    // List
    'list' => array
    (
        'sorting' => array
        (
            'mode' 					=> 4,
            'fields' 				=> array('sorting'),
            'flag' 					=> 11,
            'panelLayout' 			=> 'filter;search,limit',
            'headerFields' 			=> array('title', 'slideshowSpeed', 'animationSpeed', 'animation', 'direction', 'css_theme', 'jqeasing','controlNav', 'directionNav','randomize', 'pauseOnHover', 'imgLinks', 'imgDesc', 'carousel', 'itemWidth', 'itemMargin', 'published'),
            'child_record_callback' => array('FlexSlider\Backend\FlexImage', 'getImage')
        ),
        'global_operations' => array
        (
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
                'label'               => &$GLOBALS['TL_LANG']['tl_flex_image']['edit'],
                'href'                => 'act=edit',
                'icon'                => 'edit.svg'
            ),
            'copy' => array
            (
                'label'               => &$GLOBALS['TL_LANG']['tl_flex_image']['copy'],
                'href'                => 'act=copy',
                'icon'                => 'copy.svg'
            ),
            'cut' => array
            (
                'label'               => &$GLOBALS['TL_LANG']['tl_flex_image']['cut'],
                'href'                => 'act=paste&amp;mode=cut',
                'icon'                => 'cut.svg'
            ),
            'delete' => array
            (
                'label'               => &$GLOBALS['TL_LANG']['tl_flex_image']['delete'],
                'href'                => 'act=delete',
                'icon'                => 'delete.svg',
                'attributes'          => 'onclick="if(!confirm(\'' . $GLOBALS['TL_LANG']['MSC']['deleteConfirm'] . '\'))return false;Backend.getScrollOffset()"'
            ),
            'toggle' => array
			(
				'label'               => &$GLOBALS['TL_LANG']['tl_flex_image']['toggle'],
				'icon'                => 'visible.svg',
				'attributes'          => 'onclick="Backend.getScrollOffset();return AjaxRequest.toggleVisibility(this,%s)"',
				'button_callback'     => array('FlexSlider\Backend\FlexImage', 'toggleIcon')
			),
            'show' => array
            (
                'label'               => &$GLOBALS['TL_LANG']['tl_flex_image']['show'],
                'href'                => 'act=show',
                'icon'                => 'show.svg'
            )
        )
    ),
 
    // Palettes
    'palettes' => array
    (
        'default'                     => '{picture_legend},name,alt,singleSRC;{publish_legend},start,stop,published'
    ),
 
    // Fields
    'fields' => array
    (
        'id' => array
        (
            'sql'                     => "int(10) unsigned NOT NULL auto_increment"
        ),
		'pid' => array
		(
			'sql'                     => "int(10) unsigned NOT NULL default '0'"
		),
		'sorting' => array
		(
			'sql'                     => "int(10) unsigned NOT NULL default '0'"
		),
        'tstamp' => array
        (
            'sql'                     => "int(10) unsigned NOT NULL default '0'"
        ),
		'name' => array
		(
            'label'                   => &$GLOBALS['TL_LANG']['tl_flex_image']['name'],
			'search'                  => true,
            'inputType'               => 'text',
            'eval'                    => array('maxlength'=>255, 'tl_class'=>'w50', 'mandatory'=>true),
            'sql'                     => "varchar(255) NOT NULL default ''"		
		),
		'alt' => array
        (
            'label'                   => &$GLOBALS['TL_LANG']['tl_flex_image']['alt'],
            'search'                  => true,
            'inputType'               => 'text',
            'eval'                    => array('maxlength'=>255, 'tl_class'=>'w50'),
            'sql'                     => "varchar(255) NOT NULL default ''"
        ),
		'singleSRC' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_flex_image']['singleSRC'],
			'inputType'               => 'fileTree',
			'eval'                    => array('filesOnly'=>true, 'fieldType'=>'radio', 'mandatory'=>true, 'tl_class'=>'clr'),
			'sql'                     => "binary(16) NULL"
		),
		'description' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_flex_image']['description'],
			'search'                  => true,
			'inputType'               => 'textarea',
			'eval'                    => array('rte'=>'tinyMCE', 'helpwizard'=>true, 'class'=>'clr long'),
			'explanation'             => 'insertTags',
			'sql'                     => "mediumtext NULL"
		),
		'fadeDesc' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_flex_image']['fadeDesc'],
			'inputType'               => 'checkbox',
			'eval'                    => array('tl_class'=>'clr w50 m12'),
			'sql'                     => "char(1) NOT NULL default ''"
		),
		'cssID' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_flex_image']['cssID'],
			'exclude'                 => true,
			'inputType'               => 'text',
			'eval'                    => array('multiple'=>true, 'size'=>2, 'tl_class'=>'clr w50'),
			'sql'                     => "varchar(255) NOT NULL default ''"
		),
		'linkUrl' => array
        (
            'label'                   => &$GLOBALS['TL_LANG']['tl_flex_image']['linkUrl'],
            'search'                  => true,
            'inputType'               => 'text',
            'eval'                    => array('rgxp'=>'url', 'decodeEntities'=>true, 'maxlength'=>255, 'tl_class'=>'w50 wizard'),
			'sql'                     => "varchar(255) NOT NULL default ''"
        ),
		'fullsize' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_flex_image']['fullsize'],
			'exclude'                 => true,
			'inputType'               => 'checkbox',
			'eval'                    => array('tl_class'=>'w50 m12'),
			'sql'                     => "char(1) NOT NULL default ''"
		),
		'published' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_flex_image']['published'],
			'inputType'               => 'checkbox',
			'filter'                  => true,
			'eval'                    => array('doNotCopy'=>true, 'tl_class'=>'clr m12'),
			'sql'                     => "char(1) NOT NULL default ''"
		),
		'start' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_flex_image']['start'],
			'inputType'               => 'text',
			'eval'                    => array('rgxp'=>'datim', 'datepicker'=>true, 'tl_class'=>'clr w50 wizard'),
			'sql'                     => "varchar(10) NOT NULL default ''"
		),
		'stop' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_flex_image']['stop'],
			'inputType'               => 'text',
			'eval'                    => array('rgxp'=>'datim', 'datepicker'=>true, 'tl_class'=>'w50 wizard'),
			'sql'                     => "varchar(10) NOT NULL default ''"
		)
    )
);
