<?php
namespace Clickstorm\CsClearImages\Hook;

/***************************************************************
 *
 *  Copyright notice
 *
 *  (c) 2016 Angela Dudtkowski
 *
 *  All rights reserved
 *
 *  This script is part of the TYPO3 project. The TYPO3 project is
 *  free software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation; either version 3 of the License, or
 *  (at your option) any later version.
 *
 *  The GNU General Public License can be found at
 *  http://www.gnu.org/copyleft/gpl.html.
 *
 *  This script is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU General Public License for more details.
 *
 *  This copyright notice MUST APPEAR in all copies of the script!
 ***************************************************************/

use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Core\Utility\ExtensionManagementUtility;
use TYPO3\CMS\Backend\Utility\IconUtility;
use TYPO3\CMS\Extbase\Utility\LocalizationUtility;

class ClearImages implements \TYPO3\CMS\Backend\Toolbar\ClearCacheActionsHookInterface
{
    /**
     * Add an entry to the CacheMenuItems array
     *
     * @param array $cacheActions Array of CacheMenuItems
     * @param array $optionValues Array of AccessConfigurations-identifiers (typically  used by userTS with options.clearCache.identifier)
     */
    public function manipulateCacheActions(&$cacheActions, &$optionValues) {
        $title = LocalizationUtility::translate('cache_action.title', 'cs_clear_images');
        $icon = '<img ' . IconUtility::skinImg($GLOBALS['BACK_PATH'],
                ExtensionManagementUtility::extRelPath('cs_clear_images') . 'Resources/Public/Images/clear_cache_icon.png',
                'width="16" height="16"') . ' alt="" title="' . $title . '"/>';

        // Clearing of processed images
        $cacheActions[] = array(
            'id'    => 'tx_csclearimages',
            'title' => $title,
            'href'  => $this->backPath . 'tce_db.php?vC=' . $GLOBALS['BE_USER']->veriCode() . '&cacheCmd=tx_csclearimages&ajaxCall=1' . \TYPO3\CMS\Backend\Utility\BackendUtility::getUrlToken('tceAction'),
            'icon'  => $icon
        );
    }

    /**
     * This method is called by the CacheMenuItem in the Backend
     * @param \array $_params
     * @param \TYPO3\CMS\Core\DataHandling\DataHandler $dataHandler
     */
    public static function clear($_params, $dataHandler) {
        if ($_params['cacheCmd'] == 'tx_csclearimages') {
            $repository = GeneralUtility::makeInstance('TYPO3\\CMS\\Core\\Resource\\ProcessedFileRepository');
            $cacheManager = GeneralUtility::makeInstance('TYPO3\\CMS\\Core\\Cache\\CacheManager');

            // remove all processed files
            $repository->removeAll();

            // clear page caches
            $cacheManager->flushCachesInGroup('pages');
        }
    }
}