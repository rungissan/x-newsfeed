<?php

namespace X\XNewsfeed\Domain\Repository;

use TYPO3\CMS\Extbase\Persistence\Generic\Typo3QuerySettings;
use TYPO3\CMS\Extbase\Persistence\QueryInterface;
use TYPO3\CMS\Extbase\Persistence\Repository;

class ItemRepository extends Repository
{
  protected $defaultOrderings = [
    'sorting' => QueryInterface::ORDER_ASCENDING,
    'uid' => QueryInterface::ORDER_ASCENDING,
  ];

  public function initializeObject() {
    $querySettings = $this->objectManager->get(Typo3QuerySettings::class);

    $querySettings
      ->setLanguageOverlayMode(false)
      ->setRespectStoragePage(false);

    $this->setDefaultQuerySettings($querySettings);
  }
}
