<?php
class ShoppingCartProduct{
    private $shoppingCart;
    private $product;
    private $addedQuantity;
    private $actualPrice;

    
    public function __construct($shoppingCart, $product, $addedQuantity, $actualPrice)
    {
        $this->shoppingCart = $shoppingCart;
        $this->product = $product;
        $this->addedQuantity = $addedQuantity;
        $this->actualPrice = $actualPrice;
}


	public function getShoppingCart() {
		return $this->shoppingCart;
	}

	public function setShoppingCart($shoppingCart) {
		$this->shoppingCart = $shoppingCart;
	}


  public function getProduct() {
    return $this->product;
  }

  public function setProduct($product) {
    $this->product = $product;
  }


  public function getAddedQuantity() {
    return $this->addedQuantity;
  }

  public function setAddedQuantity($addedQuantity) {
    $this->addedQuantity = $addedQuantity;
  }

  
  public function getActualPrice() {
    return $this->actualPrice;
  }

  public function setActualPrice($actualPrice) {
    $this->actualPrice = $actualPrice;
  }
}
