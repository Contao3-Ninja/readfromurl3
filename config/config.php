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

$GLOBALS['TL_CTE']['includes']['readfromurl'] = 'BugBuster\RFU3\ReadFromUrl';

// Hook for {{request_vars}}
$GLOBALS['TL_HOOKS']['replaceInsertTags'][] = array('BugBuster\RFU3\ReadFromUrl', 'replaceInsertTagsRfu3');
 
