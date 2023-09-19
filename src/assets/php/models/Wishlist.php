<?php
class Wishlist{
    private $wishlistId;
    private $user;
    private $product;

    /*public function __construct($wishlistId, $user, $product)
    {
        $this->wishlistId = $wishlistId;
        $this->user = $user;
        $this->product = $product;
}*/


	public function getWishlistId() {
		return $this->wishlistId;
	}

	public function setWishlistId($wishlistId) {
		$this->wishlistId = $wishlistId;
	}


  public function getUser() {
    return $this->user;
  }

  public function setUser($user) {
    $this->user = $user;
  }
  public function getProduct() {
    return $this->product;
  }

  public function setProduct($product) {
    $this->product = $product;
  }
}
