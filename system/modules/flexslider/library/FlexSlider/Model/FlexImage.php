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



namespace FlexSlider\Model;


class FlexImage extends \Model {

    /**
     * Fix Contao 3.4 issue
     */
    protected static $strTable = 'tl_flex_image'; 
	
	
	public static function updatePublished() {
		Database::getInstance()->prepare("UPDATE tl_flex_image SET published='1' WHERE start <= ? AND (stop >= ? OR stop='')")->execute(time(), time());
		Database::getInstance()->prepare("UPDATE tl_flex_image SET published='' WHERE stop <= ? AND stop!=''")->execute(time());
	}
	
}
?>