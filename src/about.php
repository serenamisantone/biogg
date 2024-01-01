<?php
require_once("./assets/Config.php");
require_once("./assets/php/services/ProductService.php");
require_once("./assets/php/services/CartService.php");
require_once("./assets/php/services/HomeService.php");
session_start();
$smarty = new Config();
$cartService = new CartService();
$homeService = new HomeService();
try {
    $smarty->assignCartVariables($smarty, $cartService);  
    $smarty->assign("data_about", $homeService->getAboutUs());
    $smarty->assign("current_view","about.tpl");
    $smarty->display("index.tpl");
} catch (SmartyException $e) {
    $smarty->assign("content_load","404.tpl");
    $smarty->display("index.tpl");
}
?>

