<?php
require_once("assets/php/services/CartService.php");
require_once("assets/php/services/UserService.php");
require_once("assets/php/services/ProductService.php");
require_once("assets/config.php");
session_start();
$cartService = new CartService();
$userService = new UserService();
$productService = new ProductService();
$smarty = new Config();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['productId'])) {
    $idProduct = $_POST['productId'];

    // Effettua la logica per rimuovere il prodotto dal carrello.
    // Questa logica varierà a seconda di come hai implementato il carrello.
        $result = $cartService->removeFromCart($idProduct);
        $newTotalPrice = $cartService->getTotalPrice();
    // Dopo aver completato la rimozione, puoi restituire una risposta appropriata in formato JSON.
        error_log("questo è il risultato  ".$result);
    if ($result==1) {
        header('Content-Type: application/json');
        $response = ['success' => true, 'message' => 'Prodotto rimosso con successo', 'totalPrice'=> $newTotalPrice ];
        echo json_encode($response);
        exit;
    } else {
        header('Content-Type: application/json');
        $response = ['success' => false, 'message' => 'Prodotto non rimosso con successo', 'totalPrice'=> $newTotalPrice];
        echo json_encode($response);
        exit;
    }
}
    

try {
  if (!isset($_SESSION['cart'])) {
        $cartService->createShoppingCart();
    }
    if (isset($_SESSION['auth']['cart'])) {
        $smarty->assign('cart', $_SESSION['auth']['cart']);
       
    } else {
        $smarty->assign('cart', $_SESSION['cart']);
        
    }

    $smarty->assign('cartProducts', $cartService->getCartProducts());
    $smarty->assign('totalPrice', $cartService->getTotalPrice());
  
    $smarty->assign("all_reviews", $userService->getAllReviews());
    $smarty->display("index.tpl");
} catch (SmartyException $e) {
    $smarty->assign("content_load", "404.tpl");
    $smarty->display("404.tpl");
}