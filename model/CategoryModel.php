<?php
class CategoryModel
{
  public $name;
  public $photoURL;

  public function __construct($cName, $cPhotoURL)
  {
    $this->name = $cName;
    $this->photoURL = $cPhotoURL;
  }

}