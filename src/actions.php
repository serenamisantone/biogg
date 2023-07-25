<?php

require_once("./assets/Config.php");
require_once("./assets/php/DbConnection.php");
require_once("./assets/php/services/UserService.php");
session_start();
$smarty = new Config();
$loginService = new UserService();

    if(isset($_POST['submit'])){
       
        $isLogged = $loginService->check($_POST['username'],$_POST['password']);
        if($isLogged){
            header("Location: login.php");
        }else{
          // $smarty->assign("cart",$_SESSION['cart']);
            $smarty->assign("current_view","404.tpl");
            $smarty->display("index.tpl");
        }
        
    }