<?php
require_once("./assets/Config.php");
require_once("./assets/php/services/UserService.php");
require_once("./assets/php/models/User.php");

$user = new User();
$userService = new UserService();
$user -> $userService.getUserById($_SESSION['auth']['user']);

try {
    $smarty->assign("menu","orders.tpl");
    $smarty->assign("current_view","myAccount.tpl");
    $smarty->display("index.tpl");
} catch (Exception $e) {
    $smarty->assign("current_view","404.tpl");
    $smarty->display("index.tpl");
}
?>