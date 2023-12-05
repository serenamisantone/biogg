<?php
require_once("./assets/Config.php");
require_once("./assets/php/services/ProductService.php");
require_once("./assets/php/services/CartService.php");
session_start();
$smarty = new Config();
$cartService = new CartService();
try {
    $smarty->assignCartVariables($smarty, $cartService);  
    $smarty->assign("current_view","about.tpl");
    $smarty->display("index.tpl");
} catch (SmartyException $e) {
    $smarty->assign("content_load","404.tpl");
    $smarty->display("index.tpl");
}
?>

