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
    $editedDescription = $_POST['editedDescription'];
    $editedIngredients = $_POST['editedIngredients'];
    $editedPrice = $_POST['editedPrice'];
    $editedCategory = $_POST['editedCategory'];
    $editedManufacturer = $_POST['editedManufacturer'];
    $editedStock = $_POST['editedStock'];
    $editedOnline = $_POST['editedOnline'];
    $offerIds = json_decode($_POST['selectedOffers'], true);


    if (isset($_FILES['editedImage'])) {
        $editedImage = $productService->uploadImage($_FILES['editedImage']);
    } else {
        // Nessun nuovo file caricato, utilizza il valore esistente
        $editedImage = $_POST['editedImage'];
    }
    $updateChanges = $productService->updateProduct($productId,$editedName,$editedDescription,$editedIngredients,$editedManufacturer,$editedPrice, $editedCategory, $editedStock, $editedOnline,$offerIds,$editedImage);


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
    $productDescription = $_POST['description'];
    $productIngredients = $_POST['ingredients'];
    $productPrice = $_POST['price'];
    $productCategory = $_POST['category'];
    $productManufacturer = $_POST['manufacturer'];
    $productStock = $_POST['stock'];
    $productOnline = $_POST['isOnline'];
    
    // Accedi ai dati del file
    $productImage = $productService->uploadImage($_FILES['image']);
    

    // Aggiungi il prodotto con tutti i dati
    $addProduct = $productService->addNewProduct($productName, $productPrice, $productCategory, $productStock, $productOnline, $productImage, $productDescription, $productIngredients, $productManufacturer);

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

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['categoryId2'])) {
    $categoryId = $_POST['categoryId2'];
    $editedName = $_POST['editedName'];
    error_log($categoryId);
    error_log($editedName);

    $editCategory = $productService->updateCategory($categoryId, $editedName);
    if ($editCategory) {
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

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['searchQuery'])) {
    $searchQuery = $_GET['searchQuery'];
    $smarty->assign("current_view", "adminAccount.tpl");
    $current_page = isset($_GET['page']) ? intval($_GET['page']) : 1;
    $smarty->assignCartVariables($smarty, $cartService);
    
    $smarty->registerPlugin('modifier', 'custom_substr', 'smarty_modifier_custom_substr');
    $products= $productService->searchProductsAdmin($searchQuery);
    if (empty($products)) {
        // Prodotto non trovato
        echo "<script>alert('Prodotto non trovato'); window.location.href='adminAccount.php';</script>";
        exit();
    }else{
    $smarty->assign("data_products", $productService->searchProductsAdmin($searchQuery));
    }
    $smarty->assign("data_slider", $homeService->getSlider());
    $smarty->assign("data_offers", $offerService->getOffers());
    $smarty->assign("current_page", $current_page);
    $smarty->assign("total_pages", $productService->getImpagination($productService->getTotalProduct()));
    $smarty->assign("current_view","adminAccount.tpl");
    $smarty->display("index.tpl");
    exit();
}
function smarty_modifier_custom_substr($string, $start, $length = null)
{
    return mb_substr($string, $start, $length, 'UTF-8');
}


if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['manufacturerId'])) {
    $manufacturerId = $_POST['manufacturerId'];

    $removeManufacturer = $productService->removeFromManufacturer($manufacturerId);
    if ($removeManufacturer) {
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

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['manufacturerName'])) {
    $manufacturerName = $_POST['manufacturerName'];

    $addManufacturer = $productService->addNewManufacturer($manufacturerName);
    if ($addManufacturer) {
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

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['manufacturerId2'])) {
    $manufacturerId = $_POST['manufacturerId2'];
    $editedName = $_POST['editedName'];

    $editManufacturer = $productService->updateManufacturer($manufacturerId, $editedName);
    if ($editManufacturer) {
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
    $smarty->registerPlugin('modifier', 'custom_substr', 'smarty_modifier_custom_substr');
    $smarty->assignCartVariables($smarty, $cartService);
    $current_page = isset($_GET['page']) ? intval($_GET['page']) : 1;
    $smarty->assign("categories", $productService->getAllCategories() );
    $products_per_page =9 ; 
    $offset = ($current_page - 1) * $products_per_page;
    $smarty->assign("data_products", $productService->getAllProductsWithoutPriceOffer($offset, $products_per_page));
    $smarty->assign("data_slider", $homeService->getSlider());
    $smarty->assign("data_offers", $offerService->getOffers());
    $smarty->assign("current_page", $current_page);
    $smarty->assign("total_pages", $productService->getImpagination($productService->getTotalProduct()));
    $smarty->assign("manufacturers", $productService->getAllManufacturers() );
    $smarty->assign("current_view","adminAccount.tpl");
    $smarty->display("index.tpl");
} catch (SmartyException $e) {
    $smarty->assign("content_load","404.tpl");
    $smarty->display("index.tpl");
}
?>