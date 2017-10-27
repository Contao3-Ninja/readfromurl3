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
$GLOBALS['TL_LANG']['CTE']['readfromurl']  = array('Von URL lesen', 'Dieses Element liest von einer definierten URL den Inhalt ein und gibt ihn aus.');


 /**
 * Fields
 */
$GLOBALS['TL_LANG']['tl_content']['readfromurl']            = array('URL', 'Geben Sie die URL ein, die ausgelesen und ausgegeben werden soll. Es werden Insert-Tags unterstützt.');
$GLOBALS['TL_LANG']['tl_content']['encode_utf8']            = array('Inhalt UTF8 encodieren', 'Soll der Inhalt UTF8 encodiert werden?');
$GLOBALS['TL_LANG']['tl_content']['decode_utf8']            = array('Inhalt UTF8 decodieren', 'Soll der Inhalt UTF8 decodiert werden?');

$GLOBALS['TL_LANG']['tl_content']['readfromurl_source']     = array('Datenformat der Quelle', 'Bitte wählen Sie das Datenformat. Inhalt liest direkt den Inhalt der URL ein, serialisiertes Array hängt das deserialisiertes Array an das Template, XML hängt ein <a href="http://de.php.net/simplexml" onclick="window.open(this.href); return false">SimpleXML</a> Objekt mit in das Template.');
    // Source Options
    $GLOBALS['TL_LANG']['tl_content']['readfromurl_source']['rfu_content']      = 'Inhalt';
    $GLOBALS['TL_LANG']['tl_content']['readfromurl_source']['rfu_serialized']   = 'Serialisiertes Array/Objekt (das mit unserialize() erstellt wurde)';
    $GLOBALS['TL_LANG']['tl_content']['readfromurl_source']['rfu_xml']          = 'XML';

$GLOBALS['TL_LANG']['tl_content']['readfromurl_template']    = array('Template', 'Bitte wählen Sie das Template, das verwendet werden soll.');

