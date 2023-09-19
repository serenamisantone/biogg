<?php
require_once("assets/php/models/User.php");

class ShoppingCart
{
  private $shoppingCartId;
  private $user;
  private $isOpen;
  private $products;
  private $totalPrice;

  public function __construct()
  {
    $this->products = [];
    $this->shoppingCartId = null;
    $this->user = new User();
    $this->totalPrice = 0;
    $this->isOpen = true;
  }


  public function getShoppingCartId()
  {
    return $this->shoppingCartId;
  }

  public function setShoppingCartId($shoppingCartId)
  {
    $this->shoppingCartId = $shoppingCartId;
  }


  public function getUser()
  {
    return $this->user;
  }

  public function setUser($user)
  {
    $this->user = $user;
  }


  public function getIsOpen()
  {
    return $this->isOpen;
  }

  public function setIsOpen($isOpen)
  {
    $this->isOpen = $isOpen;
  }

  public function addProduct($addedProduct)
  {
    $found = false;
    foreach ($this->products as $product) {
      if ($product->getProduct()->getId() === $addedProduct->getProduct()->getId()) {
        $found = true;
        $product->setAddedQuantity($addedProduct->getAddedQuantity() + $product->getAddedQuantity());
        $this->totalPrice += $addedProduct->getProduct()->getPrice();
      }
    }
    if (!$found) {
      array_push($this->products, $addedProduct);
      $this->totalPrice += $addedProduct->getProduct()->getPrice();
    }
  }

  public function getProducts()
  {
    if (isset($this->products)) {
      return $this->products;
    } else
      return null;
  }

  public function getTotalPrice()
  {
    return $this->totalPrice;
  }

  public function __toString()
  {

    if (!empty($this->products)) {
      foreach ($this->products as $product)
        $string = $string + $product->getProduct()->getName();
      return $string;
    }
    return 'Questo è un carrello vuoto';
  }

}