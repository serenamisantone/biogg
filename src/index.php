<?php
require_once("assets/php/services/CartService.php");
require_once("assets/php/services/UserService.php");
require_once("assets/php/services/ProductService.php");
require_once("./assets/php/models/Product.php");
require_once("assets/Config.php");
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
        $updatedCartData = [
            'totalPrice' => $cartService->getTotalPrice(),
            'cartProduct' => [],
        ];
        
        foreach ($cartService->getCartProducts() as $cartProduct) {
            $productDetails = $cartProduct['product']->getDetails();
            $productDetails['quantity'] = $cartProduct['quantity'];
            $updatedCartData['cartProduct'][] = $productDetails;
        }
    if ($result==1) {
        header('Content-Type: application/json');
        $response = ['success' => true, 'message' => 'Prodotto rimosso con successo', 'updatedCartData'=> $updatedCartData ];
        echo json_encode($response);
        exit;
    } else {
        header('Content-Type: application/json');
        $response = ['success' => false, 'message' => 'Prodotto non rimosso ', 'updatedCartData'=> $updatedCartData ];
        echo json_encode($response);
        exit;
    }
}
    

try {
    $smarty->assignCartVariables($smarty, $cartService);
    $smarty->assign("all_reviews", $userService->getAllReviews());
    $smarty->display("index.tpl");
} catch (SmartyException $e) {
    $smarty->assign("content_load", "404.tpl");
    $smarty->display("404.tpl");
}