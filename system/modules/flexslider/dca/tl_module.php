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
$GLOBALS['TL_DCA']['tl_module']['palettes']['flexSlider'] = '{title_legend},name,type,headline;{select_flexSlider_legend},select_flexSlider;{template_legend:hide},flexSlider_template;{config_legend},align,space,cssID';

/**
 * Add fields to tl_module
 */
$GLOBALS['TL_DCA']['tl_module']['fields']['select_flexSlider'] = array
(
    'label'                   => &$GLOBALS['TL_LANG']['tl_module']['select_flexSlider'],
    'exclude'                 => true,
    'inputType'               => 'radio',
    'foreignKey'              => 'tl_flexSlider.title',
    'eval'                    => array('mandatory'=>true)
);

$GLOBALS['TL_DCA']['tl_module']['fields']['flexSlider_template'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_module']['flexSlider_template'],
	'default'                 => 'flexSlider_default',
	'exclude'                 => true,
	'inputType'               => 'select',
	'options_callback'        => array('tl_module_flexSlider', 'getflexSliderTemplates'),
	'eval'                    => array('tl_class'=>'w50'),
	'sql'                     => "varchar(64) NOT NULL default ''"
);

/**
 * Class tl_module_flexSlider
 *
 * Provide miscellaneous methods that are used by the data configuration array.
 */
class tl_module_flexSlider extends Backend
{

	/**
	 * Return all list templates as array
	 * @param \DataContainer
	 * @return array
	 */
	public function getflexSliderTemplates(DataContainer $dc)
	{
		$intPid = $dc->activeRecord->pid;

		if (Input::get('act') == 'overrideAll')
		{
			$intPid = Input::get('id');
		}

		return $this->getTemplateGroup('flexSlider_', $intPid);
	}
}

?>