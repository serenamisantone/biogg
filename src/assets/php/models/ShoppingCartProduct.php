<?php
require_once("assets/php/models/Product.php");
class ShoppingCartProduct
{
  private $product;
  private $addedQuantity;
  private $actualPrice;


  public function __construct($product, $addedQuantity)
  {

    $this->product = $product;
    $this->addedQuantity = $addedQuantity;
    $this->actualPrice = $product->getPrice();
  }

  public function getProduct()
  {
    return $this->product;
  }

  public function setProduct($product)
  {
    $this->product = $product;
  }


  public function getAddedQuantity()
  {
    return $this->addedQuantity;
  }

  public function setAddedQuantity($addedQuantity)
  {
    $this->addedQuantity = $addedQuantity;
  }


  public function getActualPrice()
  {
    return $this->product->getPrice();
  }

}