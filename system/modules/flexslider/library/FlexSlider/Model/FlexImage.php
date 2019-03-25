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
 * Run in a custom namespace, so the class can be replaced
 */
namespace Contao;



class FlexImage extends \Model {

    /**
     * Fix Contao 3.4 issue
     */
    protected static $strTable = 'tl_flex_image'; 
}
?>