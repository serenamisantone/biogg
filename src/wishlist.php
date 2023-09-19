<?php
require_once("./assets/config.php");
require_once("./assets/php/services/WishlistService.php");
session_start();
$smarty = new Config();
$wishlistService = new WishlistService();
try {
    if(isset($_SESSION['auth']['user']['id'])) {
    $userId = $_SESSION['auth']['user']['id'];
    $smarty->assign("wishlistItems", $wishlistService->getUserWishlist($userId));
    $smarty->assign("current_view","wishlist.tpl");
    $smarty->display("index.tpl");
    } else{
        $smarty->assign("current_view","login.tpl");
        $smarty->display("index.tpl");
    }
} catch (Exception $e) {
    $smarty->assign("current_view","404.tpl");
    $smarty->display("index.tpl");
}
?>