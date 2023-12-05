<?php
require_once("./assets/Config.php");
require_once("./assets/php/services/UserService.php");
require_once("./assets/php/services/CartService.php");
require_once("./assets/php/services/WishlistService.php");
require_once("assets/php/services/ProductService.php");
require_once("assets/php/services/HomeService.php");
session_start();
$smarty = new Config();
$userService = new UserService();
$productService = new ProductService();
$cartService = new CartService();
$homeService = new HomeService();

try {
    $smarty->assignCartVariables($smarty, $cartService);
    $smarty->assign("all_reviews", $userService->getAllReviews());
    $smarty->assign("data_slider", $homeService->getSlider());
    $smarty->assign("current_view", "home.tpl");

    $smarty->display("index.tpl");
} catch (Exception $e) {
    $smarty->assign("current_view", "404.tpl");
    $smarty->display("index.tpl");
}
?>