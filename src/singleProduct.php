<?php
require_once("./assets/config.php");

require_once("./assets/php/services/ProductService.php");
require_once("./assets/php/services/WishlistService.php");
require_once("./assets/php/services/CartService.php");
session_start();

$smarty = new Config();
$productService = new ProductService;
$wishlistService = new WishlistService();
$cartService = new CartService();
try {
    if (!isset($_SESSION['cart'])) {
        $cartService->createShoppingCart();
    }
    if (isset($_SESSION['auth']['cart'])) {
        $smarty->assign('cart', $_SESSION['auth']['cart']);
       
    } else {
        $smarty->assign('cart', $_SESSION['cart']);
        
    }

    $smarty->assign('cartProducts', $cartService->getCartProducts());
    $smarty->assign('totalPrice', $cartService->getTotalPrice());
  
    $smarty->assign("product", $productService->getProductById($_GET['id']));
    $smarty->assign("product_info", $productService->getProductInfoById($_GET['id']));
    $smarty->assign("current_view", "singleProduct.tpl");
    $smarty->display("index.tpl");
} catch (SmartyException $e) {
    $smarty->assign("content_load", "404.tpl");
    $smarty->display("index.tpl");
}