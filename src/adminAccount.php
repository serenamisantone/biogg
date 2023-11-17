<?php
require_once("./assets/Config.php");
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
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['product_data'])) {
    $productData = $_POST['product_data'];
    $jsonString = json_encode($productData);
$productData = json_decode($jsonString, true); 

    $productName = $productData['name'];
    $productPrice = $productData['price'];
    $productCategory = $productData['category'];
    $productStock = $productData['stock'];
    $productOnline = $productData['isOnline'];
    $productImage = $productData['image'];
    $addProduct = $productService->addNewProduct($productName,$productPrice, $productCategory, $productStock, $productOnline,$productImage);
    if ($addProduct) {
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
}
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['productId'])) {
    $productId = $_POST['productId'];

    $removeProduct = $productService->removeFromProduct($productId);
    if ($removeProduct) {
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
    $smarty->assign("categories", $productService->getAllCategories() );
    $smarty->assign("current_view","adminAccount.tpl");
    $smarty->assign("data_products", $productService->getDataProducts());
    $smarty->display("index.tpl");
} catch (SmartyException $e) {
    $smarty->assign("content_load","404.tpl");
    $smarty->display("index.tpl");
}
?>