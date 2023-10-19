<?php

require_once("assets/php/services/CartService.php");
require_once("assets/php/services/UserService.php");
require_once("assets/php/services/ProductService.php");
require_once("assets/config.php");

session_start();
$cartService = new CartService();
$userService = new UserService();
$productService = new ProductService();
$smarty = new Config();
try {

    if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["productId"]) && isset($_POST["cartId"])) {
        $productId = $_POST["productId"];
        $cartId = $_POST["cartId"];
    
    
        // Aggiungi istruzioni di debug
        var_dump($productId, $cartId);
    
        $cartService->removeFromCart($productId, $cartId);
    }
   
    
    
    
    
    
    if (!isset($_SESSION['cart'])) {
        $cartService->createShoppingCart();
    }
    if (isset($_SESSION['auth']['cart'])) {
        $smarty->assign("cart", $_SESSION['auth']['cart']);
        $smarty->assign('cartProducts', $productService->getCartProducts($_SESSION['auth']['cart']));
        $smarty->assign("totalPrice", $productService->getTotalPrice($_SESSION['auth']['cart']));
    } else {
        $smarty->assign("cart", $_SESSION['cart']);
        $smarty->assign('cartProducts', $productService->getCartProducts($_SESSION['cart']));
        $smarty->assign("totalPrice", $productService->getTotalPrice($_SESSION['cart']));
        $totalPrice=$productService->getTotalPrice($_SESSION['cart']);
    }

    $smarty->assign("all_reviews", $userService->getAllReviews());
    $smarty->display("index.tpl");
} catch (SmartyException $e) {
    $smarty->assign("content_load", "404.tpl");
    $smarty->display("404.tpl");
}