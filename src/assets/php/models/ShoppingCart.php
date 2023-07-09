<?php
class ShoppingCart{
    private $shoppingCartId;
    private $user;
    private $isOpen;

    
    public function __construct($shoppingCartId, $user, $isOpen)
    {
        $this->shoppingCartId = $shoppingCartId;
        $this->user = $user;
        $this->isOpen = $isOpen;
}


	public function getShoppingCartId() {
		return $this->shoppingCartId;
	}

	public function setShoppingCartId($shoppingCartId) {
		$this->shoppingCartId = $shoppingCartId;
	}


  public function getUser() {
    return $this->user;
  }

  public function setUser($user) {
    $this->user = $user;
  }

  
  public function getIsOpen() {
    return $this->isOpen;
  }

  public function setIsOpen($isOpen) {
    $this->isOpen = $isOpen;
  }
}
