<?php
require_once("./assets/config.php");
require_once("./assets/php/services/ProductService.php");

$smarty = new Config();
$productService = new ProductService();
try {
    $smarty->assign("current_view","shop.tpl");
    $smarty->assign("all_products", $productService->getAllProductsOnline());
    $smarty->assign("all_categories", $productService->getAllCategories());
    $smarty->display("index.tpl");
} catch (SmartyException $e) {
    $smarty->assign("content_load","404.tpl");
    $smarty->display("index.tpl");
}
?>
