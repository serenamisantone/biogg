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


try {
    $smarty->assignCartVariables($smarty, $cartService);
    $smarty->assign('quantityProduct', $cartService->getQuantity($_GET['id']));
    $smarty->assign("singleProduct", $productService->getProductById($_GET['id']));
    $smarty->assign("product_info", $productService->getProductInfoById($_GET['id']));
    $categoryId = $productService->getProductById($_GET['id'])->getCategory()->getId();
    $smarty->assign("categoryProducts", $productService->getSuggestedProducts($categoryId, $_GET['id']));
    $smarty->assign("current_view", "singleProduct.tpl");
    $smarty->display("index.tpl");
} catch (SmartyException $e) {
    $smarty->assign("content_load", "404.tpl");
    $smarty->display("index.tpl");
}