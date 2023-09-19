<?php
require_once("./assets/config.php");
require_once("./assets/php/services/ProductService.php");
require_once("./assets/php/services/WishlistService.php");

$smarty = new Config();
$productService = new ProductService();
$wishlistService = new WishlistService();

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['product_id'])) {
    $productId = $_GET['product_id'];
    $userId = $_SESSION['auth']['user']['id'];
    $addedToWishlist = $wishlistService->addToWishlist($userId,$productId);

try {
    if (isset($_SESSION['cart'])) {
        $smarty->assign("cart", $_SESSION['cart']);
        $smarty->assign("totalPrice", $_SESSION['cart']->GetTotalPrice());

    }
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['addProduct'])) {
        $productId = $_POST['addProduct'];
        $cart_product = new ShoppingCartProduct($productService->getProductById($productId), 1);
        if(isset($_SESSION['auth']['cart'])){
            $cartService->addProduct($cart_product);
        }else{
        if (isset($_SESSION['cart'])) {
            //se ho un carrello aggiungo il prodotto
            $cartService->addProduct($cart_product);
        } else {
            //se non ho un carrello prima lo creo
            $_SESSION['cart'] = new ShoppingCart();
            $cartService->addProduct($cart_product);
        }

    }
        header("location: shop.php");
        exit();
    }
    $smarty->assign("current_view", "shop.tpl");

    $smarty->assign("all_products", $productService->getAllProductsOnline());
    $smarty->assign("all_categories", $productService->getAllCategories());
    $smarty->display("index.tpl");
} catch (SmartyException $e) {
    $smarty->assign("content_load", "404.tpl");
    $smarty->display("index.tpl");
}
}
/*?>
    if ($addedToWishlist) {
        header('Content-Type: application/json');
        echo json_encode(['success' => true]);
    } else {
        header('Content-Type: application/json');
        echo json_encode(['success' => false, 'message' => 'Errore durante l\'aggiunta alla wishlist']);
    }
} else {
    try {
        $smarty->assign("current_view","shop.tpl");
        $smarty->assign("all_products", $productService->getAllProductsOnline());
        $smarty->assign("all_categories", $productService->getAllCategories());
        $smarty->display("index.tpl");
    } catch (SmartyException $e) {
        $smarty->assign("content_load","404.tpl");
        $smarty->display("index.tpl");
    }
}
?>*/

