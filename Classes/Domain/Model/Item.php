<?php

namespace X\XNewsfeed\Domain\Model;

use TYPO3\CMS\Extbase\DomainObject\AbstractEntity;
use TYPO3\CMS\Extbase\Persistence\ObjectStorage;

class Item extends AbstractEntity
{
  /**
   * @var string
   */
  protected $title;

  /**
   * @var \TYPO3\CMS\Extbase\Domain\Model\FileReference
   */
  protected $image;

  /**
   * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\TYPO3\CMS\Extbase\Domain\Model\FileReference>
   * @TYPO3\CMS\Extbase\Annotation\ORM\Cascade("remove")
   */
  protected $additionalImages;

  /**
   * @var string
   */
  protected $link;

  /**
   * @var \DateTime
   */
  protected $itemdate;

  /**
   * @var string
   */
  protected $bodytext;

  public function __construct() {
    $this->additionalImages = new ObjectStorage();
  }

  public function getTitle() {
    return $this->title;
  }

  public function setTitle($title) {
    $this->title = $title;

    return $this;
  }

  public function getItemdate() {
    return $this->itemdate;
  }

  public function setItemdate($itemdate) {
    $this->itemdate = $itemdate;

    return $this;
  }

  public function getBodytext() {
    return $this->bodytext;
  }

  public function setBodytext($bodytext) {
    $this->bodytext = $bodytext;

    return $this;
  }

  public function getImage() {
    return $this->image;
  }

  public function setImage($image) {
    $this->image = $image;
    return $this;
  }

  public function getAdditionalImages()
  {
    return $this->additionalImages;
  }

  public function setAdditionalImages(ObjectStorage $additionalImages)
  {
    $this->additionalImages = $additionalImages;

    return $this;
  }

  public function getLink() {
    return $this->link;
  }

  public function setLink($link) {
    $this->link = $link;

    return $this;
  }
}
