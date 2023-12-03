<?php
require_once("./assets/Config.php");
require_once("./assets/php/DbConnection.php");
require_once("./assets/php/services/ProductService.php");
require_once("./assets/php/services/CartService.php");
$smarty = new Config();
session_start();
$productService = new ProductService();
$cartService = new CartService();

if (!isset($_SESSION['auth'])) {
    header("Location: login.php");
    exit();}
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['editedImage'])) {
    $productId = $_POST['productId'];
    $editedName = $_POST['editedName'];
    $editedPrice = $_POST['editedPrice'];
    $editedCategory = $_POST['editedCategory'];
    $editedStock = $_POST['editedStock'];
    $editedOnline = $_POST['editedOnline'];
    $editedImage = $productService->uploadImage($_FILES['editedImage']);
    
   
    $updateChanges = $productService->updateProduct($productId,$editedName,$editedPrice, $editedCategory, $editedStock, $editedOnline,$editedImage);
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
   
}


if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['image'])) {
    // Accedi ai dati del modulo
    $productName = $_POST['name'];
    $productPrice = $_POST['price'];
    $productCategory = $_POST['category'];
    $productStock = $_POST['stock'];
    $productOnline = $_POST['isOnline'];

    // Accedi ai dati del file
    $productImage = $productService->uploadImage($_FILES['image']);
    

    // Aggiungi il prodotto con tutti i dati
    $addProduct = $productService->addNewProduct($productName, $productPrice, $productCategory, $productStock, $productOnline, $productImage);

    // Gestisci la risposta
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

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['categoryId'])) {
    $categoryId = $_POST['categoryId'];

    $removeCategory = $productService->removeFromCategory($categoryId);
    error_log($removeCategory);
    if ($removeCategory) {
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

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['categoryName'])) {
    $categoryName = $_POST['categoryName'];

    $addCategory = $productService->addNewCategory($categoryName);
    error_log($addCategory);
    if ($addCategory) {
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
    $smarty->assignCartVariables($smarty, $cartService);
    $smarty->assign("categories", $productService->getAllCategories() );
    $smarty->assign("data_products", $productService->getAllProducts());
    $smarty->assign("current_view","adminAccount.tpl");
    $smarty->display("index.tpl");
} catch (SmartyException $e) {
    $smarty->assign("content_load","404.tpl");
    $smarty->display("index.tpl");
}
?>