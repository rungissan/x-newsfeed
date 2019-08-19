<?php

$EM_CONF[$_EXTKEY] = array(
  'title' => 'Newsfeed',
  'description' => '',
  'category' => 'plugin',
  'author' => '',
  'author_email' => '',
  'state' => 'stable',
  'internal' => '',
  'uploadfolder' => '0',
  'createDirs' => '',
  'clearCacheOnLoad' => 1,
  'version' => '1.1.0',
  'constraints' => array(
    'depends' => array(
      'typo3' => '8.7.0-8.99.99',
      'mrs_template' => '1.0.0-1.99.99'
    ),
    'conflicts' => array(
    ),
    'suggests' => array(
    ),
  ),
  'autoload' => array(
    'psr-4' => array(
      'X\\XNewsfeed\\' => 'Classes',
    ),
  ),
);
