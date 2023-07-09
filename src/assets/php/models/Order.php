<?php
class Order{
    private $orderId;
    private $user;
    private $shoppingCart;
    private $total;
    private $date;

    
    public function __construct($orderId, $user, $shoppingCart, $total, $date)
    {
        $this->orderId = $orderId;
        $this->user = $user;
        $this->shoppingCart = $shoppingCart;
        $this->total = $total;
        $this->date = $date;

}


	public function getOrderId() {
		return $this->orderId;
	}

	public function setOrderId($orderId) {
		$this->orderId = $orderId;
	}


  public function getUser() {
    return $this->user;
  }

  public function setUser($user) {
    $this->user = $user;
  }


  public function getShoppingCart() {
    return $this->shoppingCart;
  }

  public function setShoppingCart($shoppingCart) {
    $this->shoppingCart = $shoppingCart;
  }


  public function getTotal() {
    return $this->total;
  }

  public function setTotal($total) {
    $this->total = $total;
  }

  
  public function getDate() {
    return $this->date;
  }

  public function setDate($date) {
    $this->date = $date;
  }
}
