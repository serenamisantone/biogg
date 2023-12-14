<?php
class Order
{
  private $orderId;
  private $user;
  private $shoppingCart;
  private $total;
  private $date;
  private $addressId; // New property for address_id
  private $status;

  private $products;
  public function __construct($orderId, $user, $shoppingCart, $total, $date, $addressId)
  {
    $this->products=[];
    $this->orderId = $orderId;
    $this->user = $user;
    $this->shoppingCart = $shoppingCart;
    $this->total = $total;
    $this->date = $date;
    $this->addressId = $addressId; // Set the address_id in the constructor
  }
  public function getStatus()
  {
    return $this->status;
  }
  public function setStatus($status)
  {
    $this->status = $status;
  }
  public function getOrderId()
  {
    return $this->orderId;
  }

  public function setOrderId($orderId)
  {
    $this->orderId = $orderId;
  }

  public function getUser()
  {
    return $this->user;
  }

  public function setUser($user)
  {
    $this->user = $user;
  }

  public function getShoppingCart()
  {
    return $this->shoppingCart;
  }

  public function setShoppingCart($shoppingCart)
  {
    $this->shoppingCart = $shoppingCart;
  }

  public function getTotal()
  {
    return $this->total;
  }

  public function setTotal($total)
  {
    $this->total = $total;
  }

  public function getDate()
  {
    return $this->date;
  }

  public function setDate($date)
  {
    $this->date = $date;
  }

  // Getter and setter for address_id
  public function getAddressId()
  {
    return $this->addressId;
  }

  public function setAddressId($addressId)
  {
    $this->addressId = $addressId;
  }
  public function setProducts($products)
  {
    $this->products = $products;
  }

  public function getProducts()
  {
    
    return $this->products;
  }
}
