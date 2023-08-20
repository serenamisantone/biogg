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
        if(isset($_SESSION['auth']['group'])){  
            switch($_SESSION['auth']['group']){
             case "customer" : {
            $smarty->assign("current_view","customerAccount.tpl");
            break;
                 }
            case "admin" : {
                $smarty->assign("current_view","adminAccount.tpl");
                break;
            }
            case "employee" : {
                $smarty->assign("current_view","employeeAccount.tpl");
                break;
            }
    
        } 
            }else
            {
            $smarty->display("login.tpl");
                }
                if (!isset($_SESSION['cart'])) {
                    $cartService->createShoppingCart();        
                }
        $smarty->assign("cart",$_SESSION['cart']);
        $smarty->display("index.tpl");

    }else{
        $smarty->display("login.tpl"); 
    }
   }catch (SmartyException $e) {
    $smarty->assign("current_view","404.tpl");
    $smarty->display("index.tpl");
}
   