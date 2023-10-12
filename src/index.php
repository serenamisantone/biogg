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

if ($_POST['action'] == 'removeProduct') {
    $idProduct = $_POST['idProduct'];
    $idCart = $_POST['idCart'];

    // Effettua la logica per rimuovere il prodotto dal carrello.
    // Questa logica varierà a seconda di come hai implementato il carrello.
$result = $cartService->removeFromCart($idProduct,$idCart);
    // Dopo aver completato la rimozione, puoi restituire una risposta appropriata in formato JSON.

    if ($result) {
        echo json_encode(['success' => true, 'message' => 'Prodotto rimosso con successo']);
        exit;
    } else {
        echo json_encode(['success' => false, 'message' => 'Prodotto non rimosso']);
        exit;
    }
}


try {
  
    if (!isset($_SESSION['cart'])) {
        $cartService->createShoppingCart();
    }
    if (isset($_SESSION['auth']['cart'])) {
        $smarty->assign("cart", $_SESSION['auth']['cart']);
        $smarty->assign('cartProducts', $productService->getCartProducts($_SESSION['auth']['cart']));
        $smarty->assign("totalPrice", $productService->getTotalPrice($_SESSION['auth']['cart']));
    } else {
        $smarty->assign("cart", $_SESSION['cart']);
        $smarty->assign('cartProducts', $productService->getCartProducts($_SESSION['cart']));
        $smarty->assign("totalPrice", $productService->getTotalPrice($_SESSION['cart']));
    }
    $smarty->assign("all_reviews", $userService->getAllReviews());
    $smarty->display("index.tpl");
} catch (SmartyException $e) {
    $smarty->assign("content_load", "404.tpl");
    $smarty->display("404.tpl");
}