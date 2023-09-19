<?php
require_once("./assets/config.php");
require_once("./assets/php/services/UserService.php");
require_once("./assets/php/services/CartService.php");
session_start();
$smarty = new Config();
$userService = new UserService();

$cartService = new CartService();
try {
    if (!isset($_SESSION['cart'])) {
        $cartService->createShoppingCart();        
    }
    $smarty->assign("all_reviews",$userService-> getAllReviews());
    $smarty->assign("current_view","home.tpl");
    
    $smarty->display("index.tpl");
} catch (Exception $e) {
    $smarty->assign("current_view","404.tpl");
    $smarty->display("index.tpl");
}
?>