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
    //arrai associativo formato da id prodotto e quantità
    $this->products = [];
    $this->shoppingCartId = null;
    $this->user = new User();

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

  // Getter per $totalPrice
  public function getTotalPrice() {
    return $this->totalPrice;
}

// Setter per $totalPrice
public function setTotalPrice($totalPrice) {
    $this->totalPrice = $totalPrice;
}

  public function addProduct($id, $quantity)
  {
    if (isset($this->products[$id])) {
      // Il prodotto è già presente nel carrello, incrementa la quantità
      $this->products[$id] += $quantity;
  } else {
      // Il prodotto non è presente nel carrello, aggiungilo
      $this->products[$id] = $quantity;
  }

  }


  public function removeProduct($id)
  {
    unset($this->product[$id]);
  }

  

  public function setProducts($products)
  {
    $this->products = $products;
  }

  public function getProducts()
  {
    return $this->products;
  }



  public function __toString()
  {

    if (!empty($this->products)) {
      foreach ($this->products as $product)
        $string = $string . $product->getProduct()->getName();
      return $string;
    }
    return 'Questo è un carrello vuoto';
  }

}