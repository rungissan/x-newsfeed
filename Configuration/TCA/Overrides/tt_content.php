<?php

defined('TYPO3_MODE') or die();

(function ($vendor, $extKey) {
  $ll = "LLL:EXT:$extKey/Resources/Private/Language/locallang.xlf:";

  \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPlugin(
    [
      'LLL:EXT:x_newsfeed/Resources/Private/Language/locallang.xlf:newsfeed',
      'xnewsfeed_newsfeed',
      'EXT:x_newsfeed/Resources/Public/Icons/Extension.svg'
    ],
    'CType',
    'x_newsfeed'
  );

  $GLOBALS['TCA']['tt_content']['types']['list']['subtypes_addlist']["xnewsfeed_newsfeed"] = 'pi_flexform';
  \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPiFlexFormValue("xnewsfeed_newsfeed", "FILE:EXT:$extKey/Configuration/FlexForms/Newsfeed.xml");

  \TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
    "$vendor.$extKey",
    'Newsfeed',
    $ll . 'newsfeed',
    'EXT:' . $extKey . '/Resources/Public/Icons/Extension.svg'
  );
})('X', 'x_newsfeed');
