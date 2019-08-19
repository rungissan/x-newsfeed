<?php

defined('TYPO3_MODE') or die();

call_user_func(
  function ($vendor, $extKey) {
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_xnewsfeed_domain_model_item');
  },
  'X', 'x_newsfeed'
);
