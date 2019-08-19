<?php

defined('TYPO3_MODE') or die();

(function($vendor, $extKey) {
  \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile($extKey, 'Configuration/TypoScript', 'Newsfeed');
})('X', 'x_newsfeed');
