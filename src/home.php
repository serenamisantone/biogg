<?php
require_once("./assets/config.php");
require_once("./assets/php/services/UserService.php");
require_once("./assets/php/services/CartService.php");
require_once("./assets/php/services/WishlistService.php");
require_once("assets/php/services/ProductService.php");
session_start();
$smarty = new Config();
$userService = new UserService();
$productService = new ProductService();
$cartService = new CartService();

try {
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
    if (!isset($_SESSION['wishlist'])) {
        //   $wishlistService->createWishlist();        
    }
    $smarty->assign("all_reviews", $userService->getAllReviews());
    $smarty->assign("current_view", "home.tpl");

    $smarty->display("index.tpl");
} catch (Exception $e) {
    $smarty->assign("current_view", "404.tpl");
    $smarty->display("index.tpl");
}
?>