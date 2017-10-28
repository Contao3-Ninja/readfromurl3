<?php

/**
 * Contao Open Source CMS
 *
 * Copyright (c) 2005-2017 Leo Feyer
 *
 * @license LGPL-3.0+
 */


/**
 * Register the namespaces
 */
ClassLoader::addNamespaces(array
(
	'BugBuster',
));


/**
 * Register the classes
 */
ClassLoader::addClasses(array
(
	'BugBuster\RFU3\ReadFromUrl' => 'system/modules/readfromurl3/ReadFromUrl.php',
));


/**
 * Register the templates
 */
TemplateLoader::addFiles(array
(
	'rfu_serialized' => 'system/modules/readfromurl3/templates',
	'rfu_content'    => 'system/modules/readfromurl3/templates',
	'rfu_xml'        => 'system/modules/readfromurl3/templates',
));
