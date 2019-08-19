<?php

defined('TYPO3_MODE') or die();

call_user_func(
  function($vendor, $extKey, $inBackend) {
    $extPath = \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extPath($extKey);

    if ($inBackend) {
      $iconRegistry = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(\TYPO3\CMS\Core\Imaging\IconRegistry::class);
      $iconRegistry->registerIcon(
        'tx-xnewsfeed-newsfeed',
        \TYPO3\CMS\Core\Imaging\IconProvider\SvgIconProvider::class,
        ['source' => 'EXT:' . $extKey . '/Resources/Public/Icons/Extension.svg']
      );
    }

    \TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
      'X.' . $extKey,
      'Newsfeed',
      ['Newsfeed' => 'list,show'],
      ['Newsfeed' => '']
    );
  },
  'X',
  'x_newsfeed',
  TYPO3_MODE === 'BE'
);
