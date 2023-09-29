<?php
require_once("assets/php/models/Product.php");
class WishlistProduct
{
  private $wishlist;
  private $product;
 


  public function __construct($wishlist,$product)
  {
    $this->wishlist = $wishlist;
    $this->product = $product;
  }
  public function getWishlist()
  {
    return $this->wishlist;
  }

  public function setWishlist($wishlist)
  {
    $this->wishlist = $wishlist;
  }


  public function getProduct()
  {
    return $this->product;
  }

  public function setProduct($product)
  {
    $this->product = $product;
  }

}