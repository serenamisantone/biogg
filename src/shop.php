<?php
require_once("./assets/Config.php");
require_once("./assets/php/DbConnection.php");
require_once("./assets/php/services/ProductService.php");
require_once("./assets/php/services/WishlistService.php");
require_once("./assets/php/services/CartService.php");
require_once("./assets/php/models/Product.php");
session_start();
$smarty = new Config();
$productService = new ProductService();
$wishlistService = new WishlistService();
$cartService = new CartService();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['wishlist_product_id'])) {
    $addedToWishlist = false;
    $productId = $_POST['wishlist_product_id'];
    $addedToWishlist = $wishlistService->addProductToWishlist($productId);

    if ($addedToWishlist) {
        header('Content-Type: application/json');
        $response = ['success' => true];
        echo json_encode($response);
        exit;
    } else {
        header('Content-Type: application/json');
        $response = ['success' => false, 'message' => 'Prodotto già nella wishlist'];
        echo json_encode($response);
        exit;
    }
}
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['cart_product_id']) && isset($_POST['quantity_to_add'])) {
    $productId = $_POST['cart_product_id'];
    $quantityToAdd = $_POST['quantity_to_add'];
    $success = $cartService->addProduct($productId, $quantityToAdd);
    if ($success) {
        $updatedCartData = [
            'totalPrice' => $cartService->getTotalPrice(),
            'cartProduct' => [],
        ];
        
        foreach ($cartService->getCartProducts() as $cartProduct) {
            $productDetails = $cartProduct['product']->getDetails();
            $productDetails['quantity'] = $cartProduct['quantity'];
            $updatedCartData['cartProduct'][] = $productDetails;
        }
        header('Content-Type: application/json');
        $response = array('success' => true, 'message' => 'Prodotto aggiunto al carrello con successo','updatedCartData'=> $updatedCartData);
        // Restituisci la risposta in formato JSON        
        echo json_encode($response);
        exit;
    } else {
        header('Content-Type: application/json');
        $response = array('success' => false, 'message' => 'Prodotto non aggiunto al carrello');
        // Restituisci la risposta in formato JSON       
        echo json_encode($response);
        exit;
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['searchQuery'])) {
    $searchQuery = $_GET['searchQuery'];
    $smarty->assign("current_view", "shop.tpl");
    $current_page = isset($_GET['page']) ? intval($_GET['page']) : 1;
    $products_per_page = 9; 
    $offset = ($current_page - 1) * $products_per_page;
    $smarty->assign("all_products", $productService->searchProducts($searchQuery));
    error_log(print_r($productService->searchProducts($searchQuery), true));
    $smarty->assign("totalPrice", $cartService->getTotalPrice());
    $smarty->assign("all_categories", $productService->getAllCategories());
    $smarty->assign("product_wishlist", $wishlistService->getUserWishlist());
    $smarty->assign("current_page", $current_page);
    $smarty->assign("total_products", $productService->getTotalProduct());
    $smarty->assign("total_pages", $productService->getImpagination());
    $smarty->display("index.tpl");
    exit();
}
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['categoryId'])) {
    $categoryId = $_GET['categoryId'];
    $smarty->assign("current_view", "shop.tpl");
    $current_page = isset($_GET['page']) ? intval($_GET['page']) : 1;
    $products_per_page = 9; 
    $offset = ($current_page - 1) * $products_per_page;
    $smarty->assign("all_products", $productService->getProductsByCategory($categoryId));
    error_log(print_r($productService->getProductsByCategory($categoryId), true));

    $smarty->assign("totalPrice", $cartService->getTotalPrice());
    $smarty->assign("all_categories", $productService->getAllCategories());
    $smarty->assign("product_wishlist", $wishlistService->getUserWishlist());
    $smarty->assign("total_products", $productService->getTotalProduct());
    $smarty->assign("current_page", $current_page);
    $smarty->assign("total_pages", $productService->getImpagination());
    $smarty->display("index.tpl");
    exit();
}

try {
    $smarty->assignCartVariables($smarty, $cartService);
    $smarty->assign("current_view", "shop.tpl");
    $current_page = isset($_GET['page']) ? intval($_GET['page']) : 1;
    $products_per_page = 9; 
    $offset = ($current_page - 1) * $products_per_page;
    $smarty->assign("all_products", $productService->getAllProductsOnline($offset, $products_per_page));
    $smarty->assign("all_categories", $productService->getAllCategories());
    $smarty->assign("product_wishlist", $wishlistService->getUserWishlist());
    $smarty->assign("total_products", $productService->getTotalProduct());
    $smarty->assign("current_page", $current_page);
    $smarty->assign("total_pages", $productService->getImpagination());
    $smarty->display("index.tpl");
} catch (SmartyException $e) {
    $smarty->assign("content_load", "404.tpl");
    $smarty->display("index.tpl");
}

?>