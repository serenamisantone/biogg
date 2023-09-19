<?php

require_once("assets/php/services/CartService.php");
require_once("assets/config.php");

session_start();
$cartService = new CartService();
$smarty = new Config();
try {
    if (isset($_SESSION['cart'])) {
        $smarty->assign("cart", $_SESSION['cart']);
    } else {
        $cartService->createShoppingCart();
        $smarty->assign("cart", $_SESSION['cart']);
    }
    $smarty->display("index.tpl");
} catch (SmartyException $e) {
    $smarty->assign("content_load", "404.tpl");
    $smarty->display("404.tpl");
}