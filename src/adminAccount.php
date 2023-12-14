<?php
require_once("./assets/Config.php");
require_once("./assets/php/DbConnection.php");
require_once("./assets/php/services/ProductService.php");
require_once("./assets/php/services/CartService.php");
require_once("./assets/php/services/HomeService.php");
require_once("./assets/php/services/OfferService.php");
$smarty = new Config();
session_start();
$productService = new ProductService();
$cartService = new CartService();
$homeService = new HomeService();
$offerService = new OfferService();

if (!isset($_SESSION['auth'])) {
    header("Location: login.php");
    exit();}
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['productId2'])) {
    $productId = $_POST['productId2'];
    $editedName = $_POST['editedName'];
    $editedPrice = $_POST['editedPrice'];
    $editedCategory = $_POST['editedCategory'];
    $editedStock = $_POST['editedStock'];
    $editedOnline = $_POST['editedOnline'];
    $offerIds = json_decode($_POST['selectedOffers'], true);


    if (isset($_FILES['editedImage'])) {
        $editedImage = $productService->uploadImage($_FILES['editedImage']);
    } else {
        // Nessun nuovo file caricato, utilizza il valore esistente
        $editedImage = $_POST['editedImage'];
    }
    $updateChanges = $productService->updateProduct($productId,$editedName,$editedPrice, $editedCategory, $editedStock, $editedOnline,$offerIds,$editedImage);


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
    $productTitle = $_POST['title'];
    $productDescription = $_POST['description'];
    $productIngredients = $_POST['ingredients'];

    // Accedi ai dati del file
    $productImage = $productService->uploadImage($_FILES['image']);
    

    // Aggiungi il prodotto con tutti i dati
    $addProduct = $productService->addNewProduct($productName, $productPrice, $productCategory, $productStock, $productOnline, $productImage, $productTitle, $productDescription, $productIngredients);

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

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['sliderId'])) {
    $sliderId = $_POST['sliderId'];
    $editedTitle = $_POST['editedTitle'];
    $editedCaption = $_POST['editedCaption'];
    $editedDescription = $_POST['editedDescription'];
    if (isset($_FILES['editedImage2'])) {
        $editedImage2 = $homeService->uploadImage($_FILES['editedImage2']);
    } else {
        // Nessun nuovo file caricato, utilizza il valore esistente
        $editedImage2 = $_POST['editedImage'];
    }
    $updateChanges = $homeService->updateSlider($sliderId,$editedTitle,$editedCaption, $editedDescription,$editedImage2);
   

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


if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['sliderId2'])) {
    $sliderId = $_POST['sliderId2'];

    $removeSlider = $homeService->removeFromSlider($sliderId);
    if ($removeSlider) {
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

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['image2'])) {
    // Accedi ai dati del modulo
    $sliderTitle = $_POST['title'];
    $sliderCaption = $_POST['caption'];
    $sliderDescription = $_POST['description'];
    $sliderImage = $homeService->uploadImage($_FILES['image2']);
    

    // Aggiungi il prodotto con tutti i dati
    $addSlider = $homeService->addNewSlider($sliderTitle, $sliderCaption, $sliderDescription, $sliderImage);

    // Gestisci la risposta
    if ($addSlider) {
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

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['offerId'])) {
    $offerId = $_POST['offerId'];
    $editedName = $_POST['editedName'];
    $editedStartDate = $_POST['editedStartDate'];
    $editedEndDate = $_POST['editedEndDate'];
    $editedType = $_POST['editedType'];
    $updateChanges = $offerService->updateOffer($offerId,$editedName,$editedStartDate, $editedEndDate,$editedType);
   

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

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['offerId2'])) {
    $offerId = $_POST['offerId2'];
    $removeOffer = $offerService->removeOffer($offerId);
    if ($removeOffer) {
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


if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['nameOffer'])) {
    // Accedi ai dati del modulo
    $offerName = $_POST['nameOffer'];
    $offerStartDate = $_POST['startDate'];
    $offerEndDate = $_POST['endDate'];
    $offerType = $_POST['type'];
    $addOffer = $offerService->addOffer($offerName, $offerStartDate, $offerEndDate,$offerType);

    // Gestisci la risposta
    if ($addOffer) {
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
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['productInfoId'])) {
    $productId = $_POST['productInfoId'];
    $editedTitle = $_POST['editedTitle'];
    $editedDescription = $_POST['editedDescription'];
    $editedIngredients = $_POST['editedIngredients'];
    $updateChanges = $productService->updateProductInfo($productId,$editedTitle,$editedDescription, $editedIngredients);
    error_log($updateChanges);

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



try {
    $smarty->assignCartVariables($smarty, $cartService);
    $smarty->assign("categories", $productService->getAllCategories() );
    $smarty->assign("data_products", $productService->getAllProducts());
    $smarty->assign("info_products", $productService->getProductInfo());
    $smarty->assign("data_slider", $homeService->getSlider());
    $smarty->assign("data_offers", $offerService->getOffers()); 
    $smarty->assign("current_view","adminAccount.tpl");
    $smarty->display("index.tpl");
} catch (SmartyException $e) {
    $smarty->assign("content_load","404.tpl");
    $smarty->display("index.tpl");
}
?>