<?php

/**
 * Contao Open Source CMS
 *
 * Copyright (C) 2005-2012 Leo Feyer
 *
 * @package flexSlider
 * @link    http://www.contao.org
 * @license http://www.gnu.org/licenses/lgpl-3.0.html LGPL
 */


/**
 * Table tl_flexSlider
 */
$GLOBALS['TL_DCA']['tl_flexSlider'] = array
(

	// Config
	'config' => array
	(
		'dataContainer'               => 'Table',
        'ctable'                      => array('tl_flex_image'),
        'switchToEdit'                => true,
		'enableVersioning'            => true
	),

	// List
	'list' => array
	(
		'sorting' => array
		(
			'mode'                    => 1,
			'fields'                  => array('title'),
			'flag'                    => 1,
            'panelLayout'             => 'search'
		),
		'label' => array
		(
			'fields'                  => array('title'),
			'format'                  => '%s',
            'label_callback'          => array('tl_flexSlider', 'addPicturesNumber')
		),
		'global_operations' => array
		(
			'all' => array
			(
				'label'               => &$GLOBALS['TL_LANG']['MSC']['all'],
				'href'                => 'act=select',
				'class'               => 'header_edit_all',
				'attributes'          => 'onclick="Backend.getScrollOffset();" accesskey="e"'
			)
		),
		'operations' => array
		(
			'edit' => array
			(
				'label'               => &$GLOBALS['TL_LANG']['tl_flexSlider']['edit'],
				'href'                => 'table=tl_flexPictures',
				'icon'                => 'edit.gif'
			),
			'editheader' => array
            (
                'label'               => &$GLOBALS['TL_LANG']['tl_flexSlider']['editheader'],
                'href'                => 'act=edit',
                'icon'                => 'header.gif',
            ),
			'copy' => array
			(
				'label'               => &$GLOBALS['TL_LANG']['tl_flexSlider']['copy'],
				'href'                => 'act=copy',
				'icon'                => 'copy.gif'
			),
			'delete' => array
			(
				'label'               => &$GLOBALS['TL_LANG']['tl_flexSlider']['delete'],
				'href'                => 'act=delete',
				'icon'                => 'delete.gif',
				'attributes'          => 'onclick="if (!confirm(\'' . $GLOBALS['TL_LANG']['MSC']['deleteConfirm'] . '\')) return false; Backend.getScrollOffset();"'
			),
            'toggle' => array
            (
                'label'               => &$GLOBALS['TL_LANG']['tl_flexSlider']['toggle'],
                'icon'                => 'visible.gif',
                'attributes'          => 'onclick="Backend.getScrollOffset(); return AjaxRequest.toggleVisibility(this, %s);"',
                'button_callback'     => array('tl_flexSlider', 'toggleIcon')
                        ),
			'show' => array
			(
				'label'               => &$GLOBALS['TL_LANG']['tl_flexSlider']['show'],
				'href'                => 'act=show',
				'icon'                => 'show.gif'
			)
		)
	),

	// Palettes
	'palettes' => array
	(
		'__selector__'                => array('carousel', 'css_theme'),
		'default'                     => '{title_legend},title,alias;{configuration_legend},slideshowSpeed,animationSpeed,animation,direction,css_theme,jqeasing,controlNav,directionNav,randomize,pauseOnHover,imgLinks,imgDesc,carousel;{publish_legend},published'
	),
	
	// Subpalettes
	'subpalettes' => array
	(
		 'carousel'                  => 'itemWidth,itemMargin',
		 'css_theme_custom'          => 'cssSRC'
	),

	// Fields
	'fields' => array
	(
         'title' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_flexSlider']['title'],
			'exclude'                 => true,
			'search'                  => true,
			'sorting'                 => true,
			'flag'                    => 1,
			'inputType'               => 'text',
			'eval'                    => array('mandatory'=>true, 'maxlength'=>255, 'tl_class'=>'w50')
		),

        'alias' => array
        (
            'label'                   => &$GLOBALS['TL_LANG']['tl_flexSlider']['alias'],
            'exclude'                 => true,
            'inputType'               => 'text',
            'eval'                    => array('rgxp'=>'alnum', 'doNotCopy'=>true, 'spaceToUnderscore'=>true, 'maxlength'=>128, 'tl_class'=>'w50'),
            'save_callback' => array
            (
                   array('tl_flexSlider', 'generateAlias')
             )
        ),

		'slideshowSpeed' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_flexSlider']['slideshowSpeed'],
			'exclude'                 => true,
            'default'                 => '3000',
			'inputType'               => 'text',
			'eval'                    => array('rgxp'=>'digit', 'mandatory'=>true, 'maxlength'=>255, 'tl_class'=>'w50')
		),

		'animationSpeed' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_flexSlider']['animationSpeed'],
			'exclude'                 => true,
            'default'                 => '600',
			'inputType'               => 'text',
			'eval'                    => array('rgxp'=>'digit', 'mandatory'=>true, 'maxlength'=>255, 'tl_class'=>'w50')
		),

        'animation' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_flexSlider']['animation'],
			'exclude'                 => true,
            'default'                 => 'slide',
			'inputType'               => 'select',
            'options'                 => array('fade', 'slide'),
			'reference'               => &$GLOBALS['TL_LANG']['tl_flexSlider'],
			'eval'                    => array('includeBlankOption'=>false, 'tl_class'=>'w50')
		),
		
		'direction' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_flexSlider']['direction'],
			'exclude'                 => true,
            'default'                 => 'horizontal',
			'inputType'               => 'select',
            'options'                 => array('horizontal', 'vertical'),
			'reference'               => &$GLOBALS['TL_LANG']['tl_flexSlider'],
			'eval'                    => array('includeBlankOption'=>false, 'tl_class'=>'w50')
		),
		
		'css_theme' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_flexSlider']['css_theme'],
			'exclude'                 => true,
            'default'                 => '',
			'inputType'               => 'select',
            'options'                 => array('white', 'black', 'light', 'dark', 'custom'),
			'reference'               => &$GLOBALS['TL_LANG']['tl_flexSlider'],
			'eval'                    => array('submitOnChange'=>true, 'includeBlankOption'=>true, 'tl_class'=>'w50')
		),
		
		'cssSRC' => array
            (
            'label'                   => &$GLOBALS['TL_LANG']['tl_flexSlider']['cssSRC'],
            'exclude'                 => true,
            'inputType'               => 'fileTree',
            'eval'                    => array('fieldType' => 'radio', 'files' => true, 'filesOnly' => true, 'extensions' => 'css',  'tl_class'=>'w50 m12')
        ),
		
		'jqeasing' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_flexSlider']['jqeasing'],
			'exclude'                 => true,
            'default'                 => '',
			'inputType'               => 'select',
            'options'                 => array('easeInQuad', 'easeOutQuad', 'easeInOutQuad', 'easeInCubic', 'easeOutCubic', 'easeInOutCubic', 'easeInQuart', 'easeOutQuart', 'easeInOutQuart', 'easeInQuint', 'easeOutQuint', 'easeInOutQuint', 'easeInSine', 'easeOutSine', 'easeInOutSine', 'easeInExpo', 'easeOutExpo', 'easeInOutExpo', 'easeInCirc', 'easeOutCirc', 'easeInOutCirc', 'easeInElastic', 'easeOutElastic', 'easeInOutElastic', 'easeInBack', 'easeOutBack', 'easeInOutBack', 'easeInBounce', 'easeOutBounce', 'easeInOutBounce'),
			'reference'               => &$GLOBALS['TL_LANG']['tl_flexSlider'],
			'eval'                    => array('includeBlankOption'=>true, 'tl_class'=>'clr w50')
		),
		
		'controlNav' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_flexSlider']['controlNav'],
			'exclude'                 => false,
			'inputType'               => 'checkbox',
			'eval'                    => array('isBoolean' => false, 'tl_class'=>'clr w50 m12')
		), 
		
		'directionNav' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_flexSlider']['directionNav'],
			'exclude'                 => false,
			'inputType'               => 'checkbox',
			'eval'                    => array('isBoolean' => false, 'tl_class'=>'w50 m12')
		), 

        'randomize' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_flexSlider']['randomize'],
			'exclude'                 => false,
			'inputType'               => 'checkbox',
			'eval'                    => array('isBoolean' => true, 'tl_class'=>'w50 m12')
		), 
		
		'pauseOnHover' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_flexSlider']['pauseOnHover'],
			'exclude'                 => true,
			'inputType'               => 'checkbox',
			'eval'                    => array('isBoolean' => true, 'tl_class'=>'w50 m12')
		), 
		
		'imgLinks' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_flexSlider']['imgLinks'],
			'exclude'                 => true,
			'inputType'               => 'checkbox',
			'eval'                    => array('isBoolean' => true, 'tl_class'=>'w50 m12')
			
		), 
		
		'imgDesc' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_flexSlider']['imgDesc'],
			'exclude'                 => true,
			'inputType'               => 'checkbox',
			'eval'                    => array('isBoolean' => true, 'tl_class'=>'w50 m12')
			
		), 
		
		'carousel' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_flexSlider']['carousel'],
			'exclude'                 => true,
			'inputType'               => 'checkbox',
			'eval'                    => array('submitOnChange'=>true, 'tl_class'=>'clr m12 long')
		), 
		
		'itemWidth' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_flexSlider']['itemWidth'],
			'exclude'                 => true,
            'default'                 => '250',
			'inputType'               => 'text',
			'eval'                    => array('rgxp'=>'digit', 'mandatory'=>true, 'maxlength'=>255, 'tl_class'=>'w50')
		),

		'itemMargin' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_flexSlider']['itemMargin'],
			'exclude'                 => true,
            'default'                 => '5',
			'inputType'               => 'text',
			'eval'                    => array('rgxp'=>'digit', 'mandatory'=>true, 'maxlength'=>255, 'tl_class'=>'w50')
		),

        'published' => array
        (
            'label'                   => &$GLOBALS['TL_LANG']['tl_flexSlider']['published'],
            'exclude'                 => true,
            'filter'                  => true,
            'flag'                    => 2,
            'inputType'               => 'checkbox',
            'eval'                    => array('doNotCopy'=>true, 'tl_class'=>'w50 m12')
        )
	)
);


/**
 * Class tl_flexSlider
 *
 * Provide miscellaneous methods that are used by the data configuration array.
 * @package Controller
 */
class tl_flexSlider extends Backend {

    /**
     * Count the number of courses in the database
     * @param array
     * @param string
     * @return string
     */
    public function addPicturesNumber($row, $label) {
		
		$objChildren = $this->Database->prepare("SELECT COUNT(*) AS count FROM tl_flexPictures WHERE pid=?")
                ->execute($row['id']);

        $label .= ' <span style="color:#b3b3b3; padding-left:3px;">' . sprintf('[%s ' . $GLOBALS['TL_LANG']['tl_flexSlider']['pictures'] . ']', $objChildren->count) . '</span>';

        return $label;
    }

    /**
     * Autogenerate a news alias if it has not been set yet
     * @param mixed
     * @param object
     * @return string
     */
    public function generateAlias($varValue, DataContainer $dc) {
        $autoAlias = false;

        // Generate alias if there is none
        if (!strlen($varValue)) {
            $autoAlias = true;
            $key = $dc->activeRecord->title;
            if(strlen($dc->activeRecord->title) > 0) {
                $keyAlias = $key;
            }
            $varValue = standardize($keyAlias);
        }

        $objAlias = $this->Database->prepare("SELECT id FROM tl_flexSlider WHERE id=? OR alias=?")
                ->execute($dc->id, $varValue);

        // Check whether the page alias exists
        if ($objAlias->numRows > 1) {
            if (!$autoAlias) {
                throw new Exception(sprintf($GLOBALS['TL_LANG']['ERR']['aliasExists'], $varValue));
            }

            $varValue .= '-' . $dc->id;
        }

        return $varValue;
    }

    /**
     * Return the "toggle visibility" button
     * @param array
     * @param string
     * @param string
     * @param string
     * @param string
     * @param string
     * @return string
     */
    public function toggleIcon($row, $href, $label, $title, $icon, $attributes) {

        if (strlen($this->Input->get('tid'))) {

            $this->toggleVisibility($this->Input->get('tid'), ($this->Input->get('state') == 1));
            $this->redirect($this->getReferer());
        }

        $href .= '&amp;tid='.$row['id'].'&amp;state='.($row['published'] ? '' : 1);

        if (!$row['published']) {

            $icon = 'invisible.gif';
        }

        return '<a href="'.$this->addToUrl($href).'" title="'.specialchars($title).'"'.$attributes.'>'.$this->generateImage($icon, $label).'</a> ';
    }


    /**
     * Disable/enable a user group
     * @param integer
     * @param boolean
     */
    public function toggleVisibility($intId, $blnVisible) {

        $this->createInitialVersion('tl_flexSlider', $intId);

        // Trigger the save_callback
        if (is_array($GLOBALS['TL_DCA']['tl_flexSlider']['fields']['published']['save_callback'])) {

            foreach ($GLOBALS['TL_DCA']['tl_flexSlider']['fields']['published']['save_callback'] as $callback) {

                $this->import($callback[0]);
                $blnVisible = $this->$callback[0]->$callback[1]($blnVisible, $this);
            }
        }

        // Update the database
        $this->Database->prepare("UPDATE tl_flexSlider SET published='" . ($blnVisible ? 1 : '') . "' WHERE id=?")
                ->execute($intId);

        $this->createNewVersion('tl_flexSlider', $intId);

    }

}
?>