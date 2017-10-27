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
 * Class ReadFromUrl 
 *
 * @copyright  Christopher Pleines 
 * @author     Christopher Pleines 
 * @package    Controller
 */
class ReadFromUrl extends ContentElement
{

	/**
	 * Template
	 * @var string
	 */
	protected $strTemplate = 'rfu_content';

	/**
	 * Compile module
	 */
	protected function compile()
	{
        if ($this->readfromurl_template)
            $this->strTemplate = $this->readfromurl_template;
        
        $this->Template = new FrontendTemplate($this->strTemplate);
        
        // Replace insert tags/entity decode
        $this->url = html_entity_decode($this->replaceInsertTags($this->readfromurl));

        switch ($this->readfromurl_source):
            case 'rfu_content':
                $this->read_content();
            break;
            case 'rfu_serialized':
                $this->read_serialized();
            break;
            case 'rfu_xml':
                $this->read_xml();
            break;
        endswitch;
        
	}

	/**
	 * Read raw data from $this->url
	 */	
	private function read_rawdata() {
        $options = array( 'http' => array(
            'max_redirects' => 10,          // stop after 10 redirects
            'timeout'       => 120,         // timeout on response
        ) );
        $context = stream_context_create( $options );
        $url_content = @file_get_contents($this->url, false, $context);
        if (!$url_content)
            $this->log('ReadFromURL: Could not read from URL ' . $this->url, 'ReadFromUrl read_rawdata()', TL_ERROR);

        return $url_content;
    }

	/**
	 * Process simple content
	 */		
	private function read_content() {
        $url_content = $this->read_rawdata();
        if ($this->encode_utf8) $url_content = utf8_encode($url_content);
        if ($this->decode_utf8) $url_content = utf8_decode($url_content);        
        $this->Template->url_content = $url_content;
    }

	/**
	 * Process serialized content
	 */    
	private function read_serialized() {
        $url_content = $this->read_rawdata();
        $arr = @unserialize($url_content);
        if (!$arr)
            $this->log('ReadFromURL: Could not unserialize Array/Object from ' . $this->url, 'ReadFromUrl read_serialized()', TL_ERROR);
        $this->Template->url_content = $arr;
    }

	/**
	 * Process XML content
	 */     
	private function read_xml() {
        $url_content = $this->read_rawdata();
        $xml = @simplexml_load_string($url_content);
        if (!xml)
            $this->log('ReadFromURL: Could not read valid XML from ' . $this->url, 'ReadFromUrl read_xml()', TL_ERROR);
        $this->Template->url_content = $xml;
    }

	/**
	 * Replace Insert Tags
	 * - {{request_vars}} => $GLOBALS['_REQUEST'] url-conformed	 
	 */     
    protected function replaceInsertTags($strTag) {
        $replace = http_build_query($GLOBALS['_REQUEST']);
        $replaced_string = str_replace('{{request_vars}}', $replace, $strTag);
        return $replaced_string;
    }        
    
}

