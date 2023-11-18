<?php
require_once("./assets/Config.php");

require_once("./assets/php/services/ProductService.php");
require_once("./assets/php/services/WishlistService.php");
require_once("./assets/php/services/CartService.php");
session_start();

$smarty = new Config();
$productService = new ProductService;
$wishlistService = new WishlistService();
$cartService = new CartService();

    if (!isset($_SESSION['cart'])) {
        $cartService->createShoppingCart();
    }
    if (isset($_SESSION['auth']['cart'])) {
        $smarty->assign('cart', $_SESSION['auth']['cart']);
       
    } else {
        $smarty->assign('cart', $_SESSION['cart']);
        
    }
    try {
    $smarty->assign('quantityProduct',$cartService->getQuantity($_GET['id']));
    
    $smarty->assign("singleProduct", $productService->getProductById($_GET['id']));
    $smarty->assign("product_info", $productService->getProductInfoById($_GET['id']));
    $smarty->assign('cartProducts', $cartService->getCartProducts());
    $smarty->assign('totalPrice', $cartService->getTotalPrice());
  
   
    $smarty->assign("current_view", "singleProduct.tpl");
    $smarty->display("index.tpl");
} catch (SmartyException $e) {
    $smarty->assign("content_load", "404.tpl");
    $smarty->display("index.tpl");
}