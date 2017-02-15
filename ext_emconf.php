<?php

/***************************************************************
 * Extension Manager/Repository config file for ext "cs_clear_images".
 *
 * Auto generated 09-02-2017 15:06
 *
 * Manual updates:
 * Only the data in the array - everything else is removed by next
 * writing. "version" and "dependencies" must not be touched!
 ***************************************************************/

$EM_CONF[$_EXTKEY] = array (
	'title' => '[clickstorm] Clear Processed Images',
	'description' => 'The extension adds a link to the clear cache menu (flush caches) for editors and admins, to delete the processed images and clear the frontend cache afterwards.',
	'category' => 'plugin',
	'author' => 'Angela Dudtkowski - clickstorm GmbH',
	'author_email' => 'dudtkowski@clickstorm.de',
	'author_company' => 'clickstorm GmbH',
	'state' => 'stable',
	'uploadfolder' => false,
	'createDirs' => '',
	'clearCacheOnLoad' => 0,
	'version' => '2.0.0',
	'constraints' => 
	array (
		'depends' => 
		array (
			'typo3' => '7.6.0-7.6.99',
		),
		'conflicts' => 
		array (
		),
		'suggests' => 
		array (
		),
	),
	'clearcacheonload' => false,
);

