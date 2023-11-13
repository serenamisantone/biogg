<?php
require_once("./assets/config.php");

require_once("./assets/php/services/ProductService.php");

session_start();

$smarty = new Config();
$productService = new ProductService;
$productId= $_GET['id'];

try {
    $smarty->assign("products", $productService->getProductById($productId));
    $smarty->assign("product_infos", $productService->getProductInfoById($productId));
    $smarty->assign("current_view", "singleProduct.tpl");
    $smarty->display("index.tpl");
} catch (SmartyException $e) {
    $smarty->assign("content_load", "404.tpl");
    $smarty->display("index.tpl");
}