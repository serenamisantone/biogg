<?php
require_once("./assets/Config.php");

$smarty = new Config();

try {
    $smarty->assign("current_view","news.tpl");
    $smarty->display("index.tpl");
} catch (SmartyException $e) {
    $smarty->assign("content_load","404.tpl");
    $smarty->display("index.tpl");
}
?>
