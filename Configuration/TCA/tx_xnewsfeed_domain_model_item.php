<?php

defined('TYPO3_MODE') or die();

$ll = 'LLL:EXT:x_newsfeed/Resources/Private/Language/locallang.xlf:';

return [
  'ctrl' => [
    'title' => $ll.'tx_xnewsfeed_domain_model_item',
    'label' => 'title',
    'tstamp' => 'tstamp',
    'crdate' => 'crdate',
    'cruser_id' => 'cruser_id',
    'dividers2tabs' => true,
    'sortby' => 'sorting',
    'languageField' => 'sys_language_uid',
    'transOrigPointerField' => 'l10n_parent',
    'transOrigDiffSourceField' => 'l10n_diffsource',
    'translationSource' => 'l10n_source',
    'delete' => 'deleted',
    'enablecolumns' => [
      'disabled' => 'hidden',
      'starttime' => 'starttime',
      'endtime' => 'endtime',
    ],
    'searchFields' => 'uid,title,heading,bodytext,linktext',
    'iconfile' => 'EXT:x_newsfeed/Resources/Public/Icons/Extension.svg',
  ],
  'interface' => [
    'showRecordFieldList' => 'sys_language_uid,l10n_parent,hidden,title,slug,itemdate,image,additional_images,bodytext,link',
  ],
  'types' => [
    0 => [
      'showitem' => 'hidden;;1, title, slug, itemdate, image, additional_images, bodytext, link, --div--;LLL:EXT:cms/locallang_ttc.xlf:tabs.access, starttime, endtime, --palette--;;hiddenLanguagePalette',
    ],
  ],
  'palettes' => [
    'hiddenLanguagePalette' => [
      'showitem' => 'sys_language_uid, l10n_parent',
      'isHiddenPalette' => true,
    ],
  ],
  'columns' => [
    'sys_language_uid' => [
      'exclude' => true,
      'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.language',
      'config' => [
        'type' => 'select',
        'renderType' => 'selectSingle',
        'foreign_table' => 'sys_language',
        'foreign_table_where' => 'ORDER BY sys_language.title',
        'items' => [
          ['LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.allLanguages', -1],
          ['LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.default_value', 0],
        ],
        'default' => 0,
        'fieldWizard' => [
          'selectIcons' => [
            'disabled' => false,
          ],
        ],
      ]
    ],
    'l10n_parent' => [
      'displayCond' => 'FIELD:sys_language_uid:>:0',
      'exclude' => true,
      'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.l18n_parent',
      'config' => [
        'type' => 'select',
        'renderType' => 'selectSingle',
        'items' => [
          ['', 0],
        ],
        'foreign_table' => 'tx_xnewsfeed_domain_model_item',
        'foreign_table_where' => 'AND tx_xnewsfeed_domain_model_item.pid=###CURRENT_PID###',
      ],
    ],
    'l10n_diffsource' => [
      'config' => [
        'type' => 'passthrough',
        'default' => '',
      ],
    ],
    'l10n_source' => [
      'config' => [
        'type' => 'passthrough',
        'default' => 0,
      ],
    ],
    'pid' => [
      'label' => 'pid',
      'config' => [
        'type' => 'passthrough',
      ],
    ],
    'crdate' => [
      'label' => 'crdate',
      'config' => [
        'type' => 'passthrough',
      ],
    ],
    'tstamp' => [
      'label' => 'tstamp',
      'config' => [
        'type' => 'passthrough',
      ],
    ],
    'hidden' => [
      'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.hidden',
      'config' => [
        'type' => 'check',
        'default' => 0,
      ],
    ],
    'title' => [
      'label' => $ll.'tx_xnewsfeed_domain_model_item.title',
      'l10n_mode' => 'prefixLangTitle',
      'config' => [
        'type' => 'input',
        'size' => 30,
        'eval' => 'trim,required',
        'max' => 128,
      ],
    ],
    'slug' => [
      'label' => $ll.'tx_xnewsfeed_domain_model_item.slug',
      'config' => [
        'type' => 'slug',
        'generatorOptions' => [
          'fields' => ['title'],
          'replacements' => [
            '©' => '',
            '®' => '',
            '™' => '',
            '(' => '',
            ')' => '',
            '[' => '',
            ']' => '',
            '{' => '',
            '}' => '',
            '!' => '',
            '?' => '',
            '/' => '',
          ],
        ],
        'eval' => 'uniqueInPid',
      ],
    ],
    'itemdate' => [
      'exclude' => true,
      'label' => $ll.'tx_xnewsfeed_domain_model_item.itemdate',
      'config' => [
        'type' => 'input',
        'renderType' => 'inputDateTime',
        'dbType' => 'date',
        'eval' => 'date',
        'size' => 16,
        'default' => 0,
        'behaviour' => [
          'allowLanguageSynchronization' => true,
        ],
      ]
    ],
    'bodytext' => [
      'l10n_mode' => 'prefixLangTitle',
      'label' => $ll.'tx_xnewsfeed_domain_model_item.bodytext',
      'config' => [
        'type' => 'text',
        'cols' => '80',
        'rows' => '15',
        'enableRichtext' => true,
      ]
    ],
    'image' => [
      'label' => $ll.'tx_xnewsfeed_domain_model_item.image',
      'config' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::getFileFieldTCAConfig(
        'image',
        [
          'appearance' => [
            'createNewRelationLinkTitle' => 'LLL:EXT:cms/locallang_ttc.xlf:images.addFileReference',
          ],
          'overrideChildTca' => [
            'types' => [
              '0' => [
                'showitem' => '
                                --palette--;LLL:EXT:lang/Resources/Private/Language/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
                                --palette--;;filePalette'
              ],
              \TYPO3\CMS\Core\Resource\File::FILETYPE_TEXT => [
                'showitem' => '
                                --palette--;LLL:EXT:lang/Resources/Private/Language/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
                                --palette--;;filePalette'
              ],
              \TYPO3\CMS\Core\Resource\File::FILETYPE_IMAGE => [
                'showitem' => '
                                --palette--;LLL:EXT:lang/Resources/Private/Language/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
                                --palette--;;filePalette'
              ],
              \TYPO3\CMS\Core\Resource\File::FILETYPE_AUDIO => [
                'showitem' => '
                                --palette--;LLL:EXT:lang/Resources/Private/Language/locallang_tca.xlf:sys_file_reference.audioOverlayPalette;audioOverlayPalette,
                                --palette--;;filePalette'
              ],
              \TYPO3\CMS\Core\Resource\File::FILETYPE_VIDEO => [
                'showitem' => '
                                --palette--;LLL:EXT:lang/Resources/Private/Language/locallang_tca.xlf:sys_file_reference.videoOverlayPalette;videoOverlayPalette,
                                --palette--;;filePalette'
              ],
              \TYPO3\CMS\Core\Resource\File::FILETYPE_APPLICATION => [
                'showitem' => '
                                --palette--;LLL:EXT:lang/Resources/Private/Language/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
                                --palette--;;filePalette'
              ]
            ],
          ],
          'minitems' => 1,
          'maxitems' => 1,
        ],
        $GLOBALS['TYPO3_CONF_VARS']['GFX']['imagefile_ext']
      ),
    ],
    'additional_images' => [
      'label' => $ll.'tx_xnewsfeed_domain_model_item.additional_images',
      'config' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::getFileFieldTCAConfig(
        'additional_images',
        [
          'appearance' => [
            'createNewRelationLinkTitle' => 'LLL:EXT:cms/locallang_ttc.xlf:images.addFileReference',
          ],
          'overrideChildTca' => [
            'types' => [
              '0' => [
                'showitem' => '
                                --palette--;LLL:EXT:lang/Resources/Private/Language/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
                                --palette--;;filePalette'
              ],
              \TYPO3\CMS\Core\Resource\File::FILETYPE_TEXT => [
                'showitem' => '
                                --palette--;LLL:EXT:lang/Resources/Private/Language/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
                                --palette--;;filePalette'
              ],
              \TYPO3\CMS\Core\Resource\File::FILETYPE_IMAGE => [
                'showitem' => '
                                --palette--;LLL:EXT:lang/Resources/Private/Language/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
                                --palette--;;filePalette'
              ],
              \TYPO3\CMS\Core\Resource\File::FILETYPE_AUDIO => [
                'showitem' => '
                                --palette--;LLL:EXT:lang/Resources/Private/Language/locallang_tca.xlf:sys_file_reference.audioOverlayPalette;audioOverlayPalette,
                                --palette--;;filePalette'
              ],
              \TYPO3\CMS\Core\Resource\File::FILETYPE_VIDEO => [
                'showitem' => '
                                --palette--;LLL:EXT:lang/Resources/Private/Language/locallang_tca.xlf:sys_file_reference.videoOverlayPalette;videoOverlayPalette,
                                --palette--;;filePalette'
              ],
              \TYPO3\CMS\Core\Resource\File::FILETYPE_APPLICATION => [
                'showitem' => '
                                --palette--;LLL:EXT:lang/Resources/Private/Language/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
                                --palette--;;filePalette'
              ]
            ],
          ],
          'minitems' => 0,
          'maxitems' => 100,
        ],
        $GLOBALS['TYPO3_CONF_VARS']['GFX']['imagefile_ext']
      ),
    ],
    'link' => [
      'label' => $ll.'tx_xnewsfeed_domain_model_item.link',
      'l10n_mode' => 'exclude',
      'l10n_display' => 'defaultAsReadonly',
      'config' => [
        'type' => 'input',
        'size' => 30,
        'max' => 256,
        'eval' => 'trim',
        'wizards' => [
          '_PADDING' => 2,
          'link' => [
            'type' => 'popup',
            'title' => 'LLL:EXT:cms/locallang_ttc.xlf:header_link_formlabel',
            'icon' => 'link_popup.gif',
            'module' => [
              'name' => 'wizard_element_browser',
              'urlParameters' => [
                'mode' => 'wizard'
              ]
            ],
            'JSopenParams' => 'height=300,width=500,status=0,menubar=0,scrollbars=1'
          ]
        ],
        'softref' => 'typolink',
      ],
    ],
  ],
];
