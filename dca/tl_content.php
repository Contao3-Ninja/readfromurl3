<?php 

/**
 * TYPOlight webCMS
 * Copyright (C) 2005 Leo Feyer
 *
 * This program is free software: you can redistribute it and/or
 * modify it under the terms of the GNU Lesser General Public
 * License as published by the Free Software Foundation, either
 * version 2.1 of the License, or (at your option) any later version.
 * 
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU
 * Lesser General Public License for more details.
 * 
 * You should have received a copy of the GNU Lesser General Public
 * License along with this program. If not, please visit the Free
 * Software Foundation website at http://www.gnu.org/licenses/.
 *
 * PHP version 5
 * @copyright  Christopher Pleines 2005
 * @author     Christopher Pleines <chris@pleinesoft.de>
 * @package    Frontend
 * @license    LGPL
 * @filesource
 */


/**
 * Table tl_content
 */

// Palettes
$GLOBALS['TL_DCA']['tl_content']['palettes']['__selector__'][]          = 'readfromurl_source';
$GLOBALS['TL_DCA']['tl_content']['palettes']['readfromurl']             = 'type;headline;readfromurl_source,readfromurl_template,readfromurl;guests,protected;align,space,cssID';
$GLOBALS['TL_DCA']['tl_content']['palettes']['readfromurlrfu_content']  = 'type;headline;readfromurl_source,encode_utf8,decode_utf8,readfromurl_template,readfromurl;guests,protected;align,space,cssID';

// Fields
$GLOBALS['TL_DCA']['tl_content']['fields']['readfromurl_source'] = array
        (
        	'label'					  => &$GLOBALS['TL_LANG']['tl_content']['readfromurl_source'],
        	'default'				  => 'rfu_content',
        	'exclude'				  => true,
        	'filter'                  => true,
        	'inputType'				  => 'radio',
        	'options'				  => array('rfu_content','rfu_serialized','rfu_xml'),
        	'reference'				  => &$GLOBALS['TL_LANG']['tl_content']['readfromurl_source'],
            'sql'                     => "varchar(255) NOT NULL default '0'",
        	'eval'                    => array('submitOnChange' => true)
        );

$GLOBALS['TL_DCA']['tl_content']['fields']['readfromurl'] = array
        (
            'label'                   => &$GLOBALS['TL_LANG']['tl_content']['readfromurl'],
            'inputType'               => 'text',
            'exclude'                 => true,
            'sql'                     => "varchar(255) NOT NULL default ''",
            'eval'                    => array('rgxp' => 'url', 'mandatory' => true, 'maxlength' => 255)
        );        

$GLOBALS['TL_DCA']['tl_content']['fields']['readfromurl_template'] = array
        (
        	'label'                   => &$GLOBALS['TL_LANG']['tl_content']['readfromurl_template'],
        	'default'                 => 'rfu_content',
        	'exclude'                 => true,
        	'inputType'               => 'select',
        	'options'                 => $this->getTemplateGroup('rfu_'),
            'sql'                     => "char(255) NOT NULL default ''"
        );

$GLOBALS['TL_DCA']['tl_content']['fields']['encode_utf8'] = array
        (
            'label'                   => &$GLOBALS['TL_LANG']['tl_content']['encode_utf8'],
            'inputType'               => 'checkbox',
            'exclude'                 => true,
            'sql'                     => "char(1) NOT NULL default ''"
        );
        
$GLOBALS['TL_DCA']['tl_content']['fields']['decode_utf8'] = array
        (
            'label'                   => &$GLOBALS['TL_LANG']['tl_content']['decode_utf8'],
            'inputType'               => 'checkbox',
            'exclude'                 => true,
            'sql'                     => "char(1) NOT NULL default ''"
        );
