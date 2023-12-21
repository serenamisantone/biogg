<?php
require_once("./assets/Config.php");
require_once("./assets/php/DbConnection.php");
require_once("./assets/php/services/UserService.php");
require_once("./assets/php/services/CartService.php");
require_once("./assets/php/services/WishlistService.php");
require_once("./assets/php/services/ProductService.php");
require_once("./assets/php/models/Product.php");
session_start();
$smarty = new Config();
$loginService = new UserService;
$cartService = new CartService;
$wishlistService = new WishlistService;
$productService = new productService;

// Verifica se la richiesta è una richiesta AJAX
if (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {

    $productId = isset($_POST['productId']) ? $_POST['productId'] : null;
    $quantity = isset($_POST['quantity']) ? $_POST['quantity'] : null;


    if ($productId !== null && $quantity !== null) {
        // Esegui l'aggiornamento della quantità nel carrello
        $result = $cartService->addProduct($productId, $quantity);
        $price = $cartService->getPrice($productId);
        $totalPrice = $cartService->getTotalPrice();
        if ($result == 1) {
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
            $response = array("success" => true, "message" => "Aggiornamento andato a buon fine", "updatedCartData" => $updatedCartData, "price" => $price);
            echo json_encode($response);
            exit;
        } else {
            header('Content-Type: application/json');
            $response = array("success" => false, "message" => "Errore nell'aggiornamento della quantità");
            echo json_encode($response);
            exit;

        }
    } else {
        // Invia una risposta JSON di errore se i dati non sono validi
        $response = array("success" => false, "message" => "Dati non validi");
        echo json_encode($response);
    }
}


try {
    $smarty->assignCartVariables($smarty, $cartService);
    $smarty->assign("current_view", "cart.tpl");
    $smarty->display("index.tpl");



} catch (SmartyException $e) {
    $smarty->assign("current_view", "404.tpl");
    $smarty->display("index.tpl");
}