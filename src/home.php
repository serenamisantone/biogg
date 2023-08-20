<?php
require_once("./assets/config.php");
require_once("./assets/php/services/UserService.php");
session_start();
$smarty = new Config();
$userService = new UserService();

try {
    if (!isset($_SESSION['cart'])) {
        $cartService->createShoppingCart();        
    }
    $smarty->assign("current_view","home.tpl");
    $smarty->assign("all_reviews",$userService-> getAllReviews());
    $smarty->display("index.tpl");
} catch (Exception $e) {
    $smarty->assign("current_view","404.tpl");
    $smarty->display("index.tpl");
}
?>