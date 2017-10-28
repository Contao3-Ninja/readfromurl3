<?php 

/**
 * Contao Open Source CMS, Copyright (C) 2005-2017 Leo Feyer
 *
 * PHP version 5
 * @copyright  Christopher Pleines 2005
 * @author     Christopher Pleines <chris@pleinesoft.de>
 * @package    Frontend
 * @license    LGPL
 * @filesource
 * 
 * Module readfromurl3
 * @copyright  Glen Langer 2017 <http://contao.ninja>
 * @author     Glen Langer (BugBuster)
 */

/**
 * Run in a custom namespace, so the class can be replaced
 */
namespace BugBuster\RFU3;

/**
 * Class ReadFromUrl 
 *
 * @copyright  Christopher Pleines 
 * @author     Christopher Pleines 
 * @package    Controller
 */
class ReadFromUrl extends \ContentElement
{

	/**
	 * Template
	 * @var string
	 */
	protected $strTemplate = 'rfu_content';
	
	protected $url = '';

    /**
	 * Display a wildcard in the back end
	 * @return string
	 */
	public function generate()
	{
	    if (TL_MODE == 'BE')
	    {
	        $objTemplate = new \BackendTemplate('be_wildcard');
	        $objTemplate->wildcard = '### ReadFromUrl Module ###';
	        return $objTemplate->parse();
	    }
	    return parent::generate();
	}
	
	public function __construct($objElement=null, $strColumn='main')
	{
	    if ($objElement !== null)
	    {
	        parent::__construct($objElement, $strColumn);
	    }	        
	}
	
	/**
	 * Replace Insert Tags
	 * - {{request_vars}} => $GLOBALS['_REQUEST'] url-conformed
	 */
	public function replaceInsertTagsRfu3($strTag)
	{
	    if ($strTag != 'request_vars')
	    {
	        return false; // nicht für uns
	    }
	    return http_build_query($GLOBALS['_REQUEST']);
	}
	
	/**
	 * Compile module
	 */
	protected function compile()
	{
        if ($this->readfromurl_template)
        {
            $this->strTemplate = $this->readfromurl_template;
        }
        
        $this->Template = new \FrontendTemplate($this->strTemplate);
        
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
	private function read_rawdata() 
	{
        $options = array( 
            'http' => array(
                'max_redirects' => 10,          // stop after 10 redirects
                'timeout'       => 120,         // timeout on response
            ) 
        );
        $context = stream_context_create( $options );
        $url_content = @file_get_contents($this->url, false, $context);
        if (!$url_content)
        {
            $this->log('ReadFromURL: Could not read from URL ' . $this->url, 'ReadFromUrl read_rawdata()', TL_ERROR);
        }

        return $url_content;
    }

	/**
	 * Process simple content
	 */		
	private function read_content() 
	{
        $url_content = $this->read_rawdata();
        if ($this->encode_utf8) $url_content = utf8_encode($url_content);
        if ($this->decode_utf8) $url_content = utf8_decode($url_content);        
        $this->Template->url_content = $url_content;
    }

	/**
	 * Process serialized content
	 */    
	private function read_serialized() 
	{
        $url_content = $this->read_rawdata();
        $arr = @unserialize($url_content);
        if (!$arr)
        {
            $this->log('ReadFromURL: Could not unserialize Array/Object from ' . $this->url, 'ReadFromUrl read_serialized()', TL_ERROR);
        }
        $this->Template->url_content = $arr;
    }

	/**
	 * Process XML content
	 */     
	private function read_xml() 
	{
        $url_content = $this->read_rawdata();
        $xml = @simplexml_load_string($url_content);
        if (!xml)
        {
            $this->log('ReadFromURL: Could not read valid XML from ' . $this->url, 'ReadFromUrl read_xml()', TL_ERROR);
        }
        $this->Template->url_content = $xml;
    }   

}

