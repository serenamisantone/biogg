<?php
require_once("./assets/Config.php");
require_once("./assets/php/DbConnection.php");
require_once("./assets/php/services/ProductService.php");
require_once("./assets/php/services/CartService.php");
$smarty = new Config();
session_start();
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['usernameOrEmail'])) {
$usernameOrEmail = $_POST['usernameOrEmail'];


}
try {

    $smarty->assign("current_view","forgotPassword.tpl");
    $smarty->display("index.tpl");
} catch (SmartyException $e) {
    $smarty->assign("content_load","404.tpl");
    $smarty->display("index.tpl");
}
?>