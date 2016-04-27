<?php
if (!defined('TYPO3_MODE')) {
	die('Access denied.');
}

/*
 * add hooks to clear cache
 */
// The Backend-MenuItem in ClearCache-Pulldown
$GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['additionalBackendItems']['cacheActions']['tx_csclearimages'] = 'EXT:cs_clear_images/Classes/Hook/ClearImages.php:&Clickstorm\\CsClearImages\\Hook\\ClearImages';

// The AjaxCall to clear the cache
$GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['t3lib/class.t3lib_tcemain.php']['clearCachePostProc'][] = 'EXT:cs_clear_images/Classes/Hook/ClearImages.php:&Clickstorm\\CsClearImages\\Hook\\ClearImages->clear';