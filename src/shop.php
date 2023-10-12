<?php
require_once("./assets/config.php");
require_once("./assets/php/DbConnection.php");
require_once("./assets/php/services/ProductService.php");
require_once("./assets/php/services/WishlistService.php");
require_once("./assets/php/services/CartService.php");
session_start();
$smarty = new Config();
$productService = new ProductService();
$wishlistService = new WishlistService();
$cartService = new CartService(); 

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['product_id'])) {
    $addedToWishlist = false;
    $productId = $_POST['product_id'];
    if (isset($_SESSION['auth']['wishlist'])) {
        $addedToWishlist = $wishlistService->addProductToWishlist($productId);
    } else {
        if (isset($_SESSION['wishlist'])) {
            $addedToWishlist = $wishlistService->addProductToWishlist($productId);
        } else {
            $_SESSION['wishlist'] = new Wishlist();
            $addedToWishlist = $wishlistService->addProductToWishlist($productId);
        }
    }

    if ($addedToWishlist) {
        header('Content-Type: application/json');
        $response = ['success' => true];
        echo json_encode($response);
    } else {
        header('Content-Type: application/json');
        $response = ['success' => false, 'message' => 'Prodotto già nella wishlist'];
        echo json_encode($response);
    }
}
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['addProduct'])) {
    $productId = $_POST['addProduct'];
   // $cart_product = new ShoppingCartProduct($productService->getProductById($productId), 1);
   $cartService->addProduct($productId, '1');
    
    header("location: shop.php");
    exit();
}



if (!isset($_SESSION['cart'])) {
    $cartService->createShoppingCart();
}
if(isset($_SESSION['auth']['cart'])){
    $smarty->assign("cart", $_SESSION['auth']['cart']);
    $smarty->assign('cartProducts', $productService->getCartProducts($_SESSION['auth']['cart']));
    $smarty->assign("totalPrice", $productService->getTotalPrice($_SESSION['auth']['cart']) );
}else{
    $smarty->assign("cart", $_SESSION['cart']);
    $smarty->assign('cartProducts', $productService->getCartProducts($_SESSION['cart']));
    $smarty->assign("totalPrice", $productService->getTotalPrice($_SESSION['cart']) );
}

try {
    
    $smarty->assign("current_view", "shop.tpl");
    $smarty->assign("all_products", $productService->getAllProductsOnline());
    $smarty->assign("all_categories", $productService->getAllCategories());
    $smarty->display("index.tpl");
} catch (SmartyException $e) {
    $smarty->assign("content_load", "404.tpl");
    $smarty->display("index.tpl");
}

?>