<?php if (!defined('TL_ROOT')) die('You can not access this file directly!');

/**
 * Contao Open Source CMS
 * Copyright (C) 2005-2010 Leo Feyer
 *
 * Formerly known as TYPOlight Open Source CMS.
 *
 * This program is free software: you can redistribute it and/or
 * modify it under the terms of the GNU Lesser General Public
 * License as published by the Free Software Foundation, either
 * version 3 of the License, or (at your option) any later version.
 * 
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU
 * Lesser General Public License for more details.
 * 
 * You should have received a copy of the GNU Lesser General Public
 * License along with this program. If not, please visit the Free
 * Software Foundation website at <http://www.gnu.org/licenses/>.
 *
* PHP version 5
 * @copyright  FlexSlider by Jozef Dvorský
 * @author     Jozef Dvorský
 * @package    Language
 * @license    GPL2 
 * @filesource
 */



/**
 * Fields
 */
$GLOBALS['TL_LANG']['tl_flexSlider']['title'] = array('Title', 'Please enter the slideshow title.');
$GLOBALS['TL_LANG']['tl_flexSlider']['alias'] = array('Alias', 'This alias is a unique reference to the FlexSlider which can be called instead of its numeric ID.');
$GLOBALS['TL_LANG']['tl_flexSlider']['slideshowSpeed'] = array('Slideshow speed', 'Speed of the slideshow cycling in milliseconds.');
$GLOBALS['TL_LANG']['tl_flexSlider']['animationSpeed'] = array('Animation speed', 'Speed of animations in milliseconds.');
$GLOBALS['TL_LANG']['tl_flexSlider']['animation'] = array('Animation type', 'Select your animation type, "fade" or "slide".');
$GLOBALS['TL_LANG']['tl_flexSlider']['direction'] = array('Sliding direction', 'Select the sliding direction, "horizontal" or "vertical".');
$GLOBALS['TL_LANG']['tl_flexSlider']['css_theme'] = array('CSS theme', 'Select one of the prearranged themes. By choosing "custom" you can add your own CSS file.');
$GLOBALS['TL_LANG']['tl_flexSlider']['cssSRC'] = array('Source file', 'Here you can add style sheets from the file system (e.g. files/css/style.css|screen|static).');
$GLOBALS['TL_LANG']['tl_flexSlider']['jqeasing'] = array('jQuery Easing', 'Select easing type or leave blank, so plugin script will not be loaded');
$GLOBALS['TL_LANG']['tl_flexSlider']['controlNav'] = array('Disable control navigation', 'Disable the control navigation under the slideshow.');
$GLOBALS['TL_LANG']['tl_flexSlider']['directionNav'] = array('Disable direction navigation', 'Disable the direction navigation on sides of the slideshow.');
$GLOBALS['TL_LANG']['tl_flexSlider']['randomize'] = array('Randomize', 'Randomize slide order.');
$GLOBALS['TL_LANG']['tl_flexSlider']['pauseOnHover'] = array('Pause on hover', 'Pause the slideshow when hovering over slider, then resume when no longer hovering.');
$GLOBALS['TL_LANG']['tl_flexSlider']['imgLinks'] = array('Enable image links', 'Make it possible assign links to images or show images in lightbox.');
$GLOBALS['TL_LANG']['tl_flexSlider']['imgDesc'] = array('Enable image description', 'Show images with descripton.');
$GLOBALS['TL_LANG']['tl_flexSlider']['carousel'] = array('Show thumbnails', 'Enables thumbnail carousel visible under the slideshow. Automaticly disables Randomize option.');
$GLOBALS['TL_LANG']['tl_flexSlider']['itemWidth'] = array('Width', 'Box-model width of individual carousel items, including horizontal borders and padding.');
$GLOBALS['TL_LANG']['tl_flexSlider']['itemMargin'] = array('Margin', 'Margin between carousel items.');

$GLOBALS['TL_LANG']['tl_flexSlider']['published']   = array('Publish slideshow', 'Make the slideshow visible on the website.');


/**
 * Reference
 */
$GLOBALS['TL_LANG']['tl_flexSlider']['fade'] = 'fade';
$GLOBALS['TL_LANG']['tl_flexSlider']['slide'] = 'slide';
$GLOBALS['TL_LANG']['tl_flexSlider']['horizontal'] = 'horizontal';
$GLOBALS['TL_LANG']['tl_flexSlider']['vertical'] = 'vertical';
$GLOBALS['TL_LANG']['tl_flexSlider']['white'] = 'white border';
$GLOBALS['TL_LANG']['tl_flexSlider']['black'] = 'black border';
$GLOBALS['TL_LANG']['tl_flexSlider']['light'] = 'transparent white';
$GLOBALS['TL_LANG']['tl_flexSlider']['dark'] = 'transparent black';
$GLOBALS['TL_LANG']['tl_flexSlider']['custom'] = 'custom';


$GLOBALS['TL_LANG']['tl_flexSlider']['easeInQuad'] = 'easeInQuad';
$GLOBALS['TL_LANG']['tl_flexSlider']['easeOutQuad'] = 'easeOutQuad';
$GLOBALS['TL_LANG']['tl_flexSlider']['easeInOutQuad'] = 'easeInOutQuad';
$GLOBALS['TL_LANG']['tl_flexSlider']['easeInCubic'] = 'easeInCubic';
$GLOBALS['TL_LANG']['tl_flexSlider']['easeOutCubic'] = 'easeOutCubic';
$GLOBALS['TL_LANG']['tl_flexSlider']['easeInOutCubic'] = 'easeInOutCubic';
$GLOBALS['TL_LANG']['tl_flexSlider']['easeInQuart'] = 'easeInQuart';
$GLOBALS['TL_LANG']['tl_flexSlider']['easeOutQuart'] = 'easeOutQuart';
$GLOBALS['TL_LANG']['tl_flexSlider']['easeInOutQuart'] = 'easeInOutQuart';
$GLOBALS['TL_LANG']['tl_flexSlider']['easeInQuint'] = 'easeInQuint';
$GLOBALS['TL_LANG']['tl_flexSlider']['easeOutQuint'] = 'easeOutQuint';
$GLOBALS['TL_LANG']['tl_flexSlider']['easeInOutQuint'] = 'easeInOutQuint';
$GLOBALS['TL_LANG']['tl_flexSlider']['easeInSine'] = 'easeInSine';
$GLOBALS['TL_LANG']['tl_flexSlider']['easeOutSine'] = 'easeOutSine';
$GLOBALS['TL_LANG']['tl_flexSlider']['easeInOutSine'] = 'easeInOutSine';
$GLOBALS['TL_LANG']['tl_flexSlider']['easeInExpo'] = 'easeInExpo';
$GLOBALS['TL_LANG']['tl_flexSlider']['easeOutExpo'] = 'easeOutExpo';
$GLOBALS['TL_LANG']['tl_flexSlider']['easeInOutExpo'] = 'easeInOutExpo';
$GLOBALS['TL_LANG']['tl_flexSlider']['easeInCirc'] = 'easeInCirc';
$GLOBALS['TL_LANG']['tl_flexSlider']['easeOutCirc'] = 'easeOutCirc';
$GLOBALS['TL_LANG']['tl_flexSlider']['easeInOutCirc'] = 'easeInOutCirc';
$GLOBALS['TL_LANG']['tl_flexSlider']['easeInElastic'] = 'easeInElastic';
$GLOBALS['TL_LANG']['tl_flexSlider']['easeOutElastic'] = 'easeOutElastic';
$GLOBALS['TL_LANG']['tl_flexSlider']['easeInOutElastic'] = 'easeInOutElastic';
$GLOBALS['TL_LANG']['tl_flexSlider']['easeInBack'] = 'easeInBack';
$GLOBALS['TL_LANG']['tl_flexSlider']['easeOutBack'] = 'easeOutBack';
$GLOBALS['TL_LANG']['tl_flexSlider']['easeInOutBack'] = 'easeInOutBack';
$GLOBALS['TL_LANG']['tl_flexSlider']['easeInBounce'] = 'easeInBounce';
$GLOBALS['TL_LANG']['tl_flexSlider']['easeOutBounce'] = 'easeOutBounce';
$GLOBALS['TL_LANG']['tl_flexSlider']['easeInOutBounce'] = 'easeInOutBounce';




/**
 * Legends
 */
$GLOBALS['TL_LANG']['tl_flexSlider']['title_legend']   = 'Title and alias';
$GLOBALS['TL_LANG']['tl_flexSlider']['configuration_legend'] = 'Configuration';
$GLOBALS['TL_LANG']['tl_flexSlider']['publish_legend']   = 'Publish';


/**
 * Buttons
 */
$GLOBALS['TL_LANG']['tl_flexSlider']['new']    = array('New slideshow', 'Create a new slideshow');
$GLOBALS['TL_LANG']['tl_flexSlider']['edit']   = array('Edit slideshow pictures', 'Edit pictures of this slideshow ID %s');
$GLOBALS['TL_LANG']['tl_flexSlider']['editheader']   = array('Edit slideshow', 'Edit this slideshow ID %s');
$GLOBALS['TL_LANG']['tl_flexSlider']['copy']   = array('Duplicate slideshow', 'Duplicate this slideshow ID %s');
$GLOBALS['TL_LANG']['tl_flexSlider']['delete'] = array('Delete slideshow', 'Delete this slideshow ID %s');
$GLOBALS['TL_LANG']['tl_flexSlider']['toggle'] = array('Publish/unpublish slideshow', 'Publish/unpublish this slideshow ID %s');
$GLOBALS['TL_LANG']['tl_flexSlider']['show']   = array('FlexSlider details', 'Show the details of this slideshow ID %s');


/**
 * Labels
 */

$GLOBALS['TL_LANG']['tl_flexSlider']['pictures'] = 'pictures';
?>