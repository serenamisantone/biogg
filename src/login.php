<?php

require_once("./assets/Config.php");
require_once("./assets/php/DbConnection.php");
require_once("./assets/php/services/UserService.php");
require_once("./assets/php/services/CartService.php");
require_once("./assets/php/services/WishlistService.php");
session_start();
$smarty = new Config();
$loginService = new UserService();
$cartService = new CartService();
$wishlistService = new WishlistService();
if (!isset($_SESSION['cart'])) {
    $cartService->createShoppingCart();
    
}


    if(isset($_POST['submit'])){
       
        $isLogged = $loginService->check($_POST['username'],$_POST['password']);
        if($isLogged){
            header("Location: myAccount.php");
        }else{
          // $smarty->assign("cart",$_SESSION['cart']);
            $smarty->assign("current_view","404.tpl");
            $smarty->display("index.tpl");
        }
        
    }
   

