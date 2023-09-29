<?php
require_once("./assets/config.php");
require_once("./assets/php/DbConnection.php");
require_once("./assets/php/services/ProductService.php");
require_once("./assets/php/services/WishlistService.php");
//require_once("./assets/php/services/CartService.php"); 
session_start();
$smarty = new Config();
$productService = new ProductService();
$wishlistService = new WishlistService();
//$cartService = new CartService(); 

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['product_id'])) {
    $addedToWishlist = false;
    $productId = $_POST['product_id'];
    if (isset($_SESSION['auth']['wishlist'])) {
       $addedToWishlist= $wishlistService->addProductToWishlist($productId);
    } else {
        if (isset($_SESSION['wishlist'])) {
            $addedToWishlist=$wishlistService->addProductToWishlist($productId);
        } else {
            $_SESSION['wishlist'] = new Wishlist();
            $addedToWishlist=$wishlistService->addProductToWishlist($productId);
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
} elseif ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['addProduct'])) {
    $productId = $_POST['addProduct'];
    $cart_product = new ShoppingCartProduct($productService->getProductById($productId), 1);
    if (isset($_SESSION['auth']['cart'])) {
        $cartService->addProduct($cart_product);
    } else {
        if (isset($_SESSION['cart'])) {
            $cartService->addProduct($cart_product);
        } else {
            $_SESSION['cart'] = new ShoppingCart();
            $cartService->addProduct($cart_product);
        }
    }
    header("location: shop.php");
    exit();
} else {
    try {
        $smarty->assign("current_view", "shop.tpl");
        $smarty->assign("all_products", $productService->getAllProductsOnline());
        $smarty->assign("all_categories", $productService->getAllCategories());
        $smarty->display("index.tpl");
    } catch (SmartyException $e) {
        $smarty->assign("content_load", "404.tpl");
        $smarty->display("index.tpl");
    }
}
?>
