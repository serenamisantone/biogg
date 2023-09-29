<?php
require_once("assets/php/models/User.php");

class Wishlist
{
  private $wishlistId;
  private $user;
  private $isOpen;
  private $products;

  public function __construct()
  {
    $this->products = [];
    $this->wishlistId = null;
    $this->user = new User();
    $this->isOpen = true;
  }


  public function getWishlistId()
  {
    return $this->wishlistId;
  }

  public function setWishlistId($wishlistId)
  {
    $this->wishlistId = $wishlistId;
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

  public function getProducts()
  {
    return $this->products;
  }

  public function setProducts($products)
  {
    $this->products = $products;
  }

}