<?php

namespace X\XNewsfeed\Controller;

use X\XNewsfeed\Domain\Model\Item;
use X\XNewsfeed\Domain\Repository\ItemRepository;
use TYPO3\CMS\Extbase\Mvc\Controller\ActionController;

class NewsfeedController extends ActionController
{
  /**
   * @var ItemRepository
   **/
  protected $items;

  public function listAction()
  {
    $this->view->assign('mqs', $this->parseMq());
    $this->view->assign('items', $this->items->findAll()->toArray());
 }

  public function showAction(Item $item)
  {
    $this->view->assign('item', $item);
  }

  public function injectItems(ItemRepository $items)
  {
    $this->items = $items;
  }

  protected function parseMq()
  {
    $mq = $this->settings['mq'] ?? '';
    $mq = explode(';', $mq);
    $result = [['bp' => 0, 'el' => (int)array_shift($mq)]];

    foreach ($mq as $el) {
      [$breakpoint, $elements] = explode(',', $el);

      $result[] = ['bp' => (int)$breakpoint, 'el' => (int)$elements];
    }

    return $result;
  }

}
