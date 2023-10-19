<?php
require_once("./assets/Config.php");
require_once("./assets/php/DbConnection.php");
require_once("./assets/php/services/UserService.php");
require_once("./assets/php/services/CartService.php");
require_once("./assets/php/services/WishlistService.php");
require_once("./assets/php/services/ProductService.php");
session_start();
$smarty = new Config();
$loginService = new UserService;
$cartService = new CartService;
$wishlistService = new WishlistService;
$productService = new productService;

// Verifica se la richiesta è una richiesta AJAX
if (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
    // Includi il tuo file di configurazione del database se necessario
    // include_once("db_config.php");

    // Ottieni i dati dalla richiesta POST
    $productId = isset($_POST['productId']) ? $_POST['productId'] : null;
    $quantity = isset($_POST['quantity']) ? $_POST['quantity'] : null;

    // Effettua la validazione dei dati (ad esempio, verifica se il productId esiste e la quantità è un numero valido)

    // Supponiamo di avere una classe Cart che gestisce il carrello
    if ($productId !== null && $quantity !== null) {
        // Esegui l'aggiornamento della quantità nel carrello
        $result = $cartService->addProduct($productId, $quantity);
        $price = $cartService->getPrice($productId);
        $totalPrice = $cartService->getTotalPrice();
        error_log("questo il valore di price: ".$price);
        error_log("questo il valore di totalprice: ".$totalPrice);
        if ($result==1) {
            // Invia una risposta JSON di successo
            header('Content-Type: application/json');
            $response = array("success" =>true, "message" => "Aggiornamento andato a buon fine", "totalPrice"=>$totalPrice, "price"=>$price);
            echo json_encode($response);
            exit;
        } else {
            header('Content-Type: application/json');
            // Invia una risposta JSON di errore se l'aggiornamento non ha avuto successo
            $response = array("success" =>false, "message" => "Errore nell'aggiornamento della quantità");
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
if (!isset($_SESSION['cart'])) {
        $cartService->createShoppingCart();
    }
    if (isset($_SESSION['auth']['cart'])) {
        $smarty->assign("cart", $_SESSION['auth']['cart']);

    } else {
        $smarty->assign("cart", $_SESSION['cart']);
    }
    $smarty->assign("cartProducts", $cartService->getCartProducts());
    $smarty->assign("totalPrice", $cartService->getTotalPrice());
    $smarty->assign("current_view", "cart.tpl");
    $smarty->display("index.tpl");
    


} catch (SmartyException $e) {
    $smarty->assign("current_view", "404.tpl");
    $smarty->display("index.tpl");
}