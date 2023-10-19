<?php

require_once("./assets/Config.php");
require_once("./assets/php/DbConnection.php");
require_once("./assets/php/services/UserService.php");
require_once("./assets/php/services/CartService.php");
require_once("./assets/php/services/WishlistService.php");
require_once("./assets/php/services/ProductService.php");
session_start();
$smarty = new Config();
$loginService = new UserService;
$cartService = new CartService;
$wishlistService = new WishlistService;
$productService = new productService;
$menuItems = array();
try {
    if (isset($_SESSION['auth']['group'])) {
        
            switch ($_SESSION['auth']['group']) {
                case "customer": {
                        $smarty->assign("current_view", "customerAccount.tpl");
                        break;
                    }
                case "admin": {
                        $smarty->assign("current_view", "adminAccount.tpl");
                        break;
                    }
                case "employee": {
                        $smarty->assign("current_view", "employeeAccount.tpl");
                        break;
                    }

            }
            
            if (!isset($_SESSION['cart'])) {
                $cartService->createShoppingCart();
            }
            if(isset($_SESSION['auth']['cart'])){
                $smarty->assign("cart", $_SESSION['auth']['cart']);
                
            }else{
                $smarty->assign("cart", $_SESSION['cart']);
                
            }
            $smarty->assign('cartProducts', $cartService->getCartProducts());
            $smarty->assign("totalPrice", $cartService->getTotalPrice() );
        $smarty->display("index.tpl");

    } else {
        $smarty->display("login.tpl");
    }
} catch (SmartyException $e) {
    $smarty->assign("current_view", "404.tpl");
    $smarty->display("index.tpl");
}