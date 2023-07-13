<?php
require_once("./assets/config.php");

$smarty = new Config();

try {
   
    $smarty->display("login.tpl");
} catch (SmartyException $e) {
    $smarty->assign("content_load","404.tpl");
    $smarty->display("index.tpl");
}
?>