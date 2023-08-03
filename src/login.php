<?php

require_once("./assets/Config.php");
require_once("./assets/php/DbConnection.php");
require_once("./assets/php/services/UserService.php");
session_start();
$smarty = new Config();
$loginService = new UserService;
$menuItems = array();
   try{
    if(isset($_SESSION['auth'])){ 
        $smarty->assign("menuItems",$_SESSION['auth']['service']);
        $smarty->assign("menu","orders.tpl");
        $smarty->assign("current_view","myAccount.tpl");
        $smarty->display("index.tpl");

    }else{
        $smarty->display("login.tpl"); 
    }
   }catch (SmartyException $e) {
    $smarty->assign("content_load","404.tpl");
    $smarty->display("index.tpl");
   }
    function openMenu($script){
    $smarty->assign("menu",$script);
   }

