<?php
require_once("./assets/config.php");
require_once("./assets/php/services/UserService.php");

$smarty = new Config();
$userService = new UserService();

try {
    $smarty->assign("current_view","home.tpl");
    $smarty->assign("all_reviews",$userService-> getAllReviews());
    $smarty->display("index.tpl");
} catch (Exception $e) {
    $smarty->assign("current_view","404.tpl");
    $smarty->display("index.tpl");
}
?>