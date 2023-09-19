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
?>

