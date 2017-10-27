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
 * Content elements
 */
$GLOBALS['TL_LANG']['CTE']['readfromurl']  = array('Read from URL', 'This element reads from a defined url the content and returns it.');

 /**
 * Fields
 */
$GLOBALS['TL_LANG']['tl_content']['readfromurl']     = array('URL', 'Please enter the source URL, which you want to read from.');
$GLOBALS['TL_LANG']['tl_content']['encode_utf8']     = array('Encode UTF8 content', 'Encode the content to UTF8?');
$GLOBALS['TL_LANG']['tl_content']['decode_utf8']     = array('Decode UTF8 content', 'Decode the content to UTF8?');

$GLOBALS['TL_LANG']['tl_content']['readfromurl_source']     = array('Data format of the source', 'Please choose the data format. Content directly reads the content of the url, serialized array unserializes a serialized array and assigns it to the template, serialisiertes array hängt das deserialisiertes array an das template, XML assigns a <a href="http://en.php.net/simplexml" onclick="window.open(this.href); return false">SimpleXML</a> object to the template.');
    // Source Options
    $GLOBALS['TL_LANG']['tl_content']['readfromurl_source']['rfu_content']      = 'Content';
    $GLOBALS['TL_LANG']['tl_content']['readfromurl_source']['rfu_serialized']   = 'Serialized Array/Objekt (which was created with unserialize())';
    $GLOBALS['TL_LANG']['tl_content']['readfromurl_source']['rfu_xml']          = 'XML';

$GLOBALS['TL_LANG']['tl_content']['readfromurl_template']    = array('Template', 'Please choose the template in which you want to display your data.');

 
