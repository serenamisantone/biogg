<?php
require_once("./assets/php/models/ShoppingCart.php");
require_once("./assets/php/services/UserService.php");
class CartService
{
    private $userService;
    public function __construct()
    {

    }

    public function createShoppingCart()
    {
        if (!isset($_SESSION['cart'])) {
            $_SESSION['cart'] = new ShoppingCart();                   
        }
         print($_SESSION['cart']);
    }
    function addProduct($cart_product)
    {
        $_SESSION['cart']->addProduct($cart_product);
    }

    function removeProduct($productId)
    {
        $out = array();
        foreach ($_SESSION['cart']->getProducts() as $product) {
            if (!$product->getId() == $productId) {
                $out[] = $product;
            }
        }
        $_SESSION['cart']->setProducts($out);
    }
}