<?php
require_once("./assets/config.php");
require_once("./assets/php/DbConnection.php");
require_once("./assets/php/services/ProductService.php");
require_once("./assets/php/services/CartService.php");
$smarty = new Config();
session_start();
$productService = new ProductService();
$cartService = new CartService();
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['edited_data'])) {
    $editedData = $_POST['edited_data'];
    $jsonString = json_encode($editedData);
$editedData = json_decode($jsonString, true); 

    // Esempio di come accedere ai dati
    $productId = $editedData['id'];
    $editedName = $editedData['name'];
    $editedPrice = $editedData['price'];
    $editedCategory = $editedData['category'];
    $editedStock = $editedData['stock'];
    $editedOnline = $editedData['isOnline'];
    $editedImage = $editedData['image'];
    /*error_log($productId);
    error_log($editedName);
    error_log($editedPrice);
    error_log($editedCategory);
    error_log($editedStock);
    error_log($editedOnline);
    error_log($editedImage);*/
    $updateChanges = $productService->updateProduct($productId,$editedName,$editedPrice, $editedCategory, $editedStock, $editedOnline,$editedImage);
    if ($updateChanges) {
        header('Content-Type: application/json');
        $response = ['success' => true];
        echo json_encode($response);

        exit; 
    } else {
        header('Content-Type: application/json');
        $response = ['success' => false, 'message' => 'Errore nella funzione'];
        echo json_encode($response);
        exit; 
    }
    $smarty->assign("current_view","adminAccount.tpl");
    $smarty->assign("data_products", $productService->getDataProducts());
    $smarty->display("index.tpl");
}
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
    $smarty->assign("current_view","adminAccount.tpl");
    $smarty->assign("data_products", $productService->getDataProducts());
    $smarty->display("index.tpl");
} catch (SmartyException $e) {
    $smarty->assign("content_load","404.tpl");
    $smarty->display("index.tpl");
}
?>