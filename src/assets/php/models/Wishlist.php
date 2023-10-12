<?php
require_once("assets/php/models/User.php");

class Wishlist
{
  private $wishlistId;
  private $user;
  private $productsId;

  public function __construct()
  {
    $this->productsId = [];
    $this->wishlistId = null;
    $this->user = new User();
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

  public function getProductsId()
  {
    return $this->productsId;
  }

  public function setProductsId($productsId)
  {
    $this->productsId = $productsId;
  }
  public function addProducts($addedproduct)
  {
    $found = false;
    foreach ($this->productsId as $product) {
      if ($product == $addedproduct) {
        $found = true;
      }
    }
    if (!$found) {
      array_push($this->productsId, $addedproduct);
      return true;
    }
    return false;
  }
}
