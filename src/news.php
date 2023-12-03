<?php
require_once("./assets/Config.php");
require_once("./assets/php/services/CartService.php");
session_start();
$cartService = new CartService();
$smarty = new Config();

try {
    $smarty->assignCartVariables($smarty, $cartService);
    $smarty->assign("current_view","news.tpl");
    $smarty->display("index.tpl");
} catch (SmartyException $e) {
    $smarty->assign("content_load","404.tpl");
    $smarty->display("index.tpl");
}
?>
