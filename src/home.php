<?php
require_once("./assets/config.php");
require_once("./assets/php/smarty/libs/sysplugins/smartyexception.php");

$smarty = new Config();

try {
    $smarty->assign("current_view","home.tpl");
    $smarty->display("index.tpl");
} catch (Exception $e) {
    $smarty->assign("current_view","404.tpl");
    $smarty->display("index.tpl");
}
?>