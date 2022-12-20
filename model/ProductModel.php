<?php
class ProductModel
{
  public $name;
  public $price;
  public $weight;
  public $vote;
  public $stockID;
  public $photoURL;
  public $description;
  public $categoryID;

  public function __construct($pName, $pPrice, $pWeight, $pVote, $pStockID, $pPhotoURL, $pDescription, $pCategoryID)
  {
    $this->name = $pName;
    $this->price = $pPrice;
    $this->weight = $pWeight;
    $this->vote = $pVote;
    $this->stockID = $pStockID;
    $this->photoURL = $pPhotoURL;
    $this->description = $pDescription;
    $this->categoryID = $pCategoryID;
  }
}