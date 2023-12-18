<?php
require_once("./assets/Config.php");
require_once("./assets/php/DbConnection.php");
require_once("./assets/php/services/ProductService.php");
require_once("./assets/php/services/CartService.php");
require_once("./assets/php/services/OfferService.php");
require_once("./assets/php/services/UserService.php");
require_once("./assets/php/services/OrderService.php");
$smarty = new Config();
session_start();
$productService = new ProductService();
$cartService = new CartService();
$offerService = new OfferService();
$userService = new UserService;
$orderService = new OrderService();
if (!isset($_SESSION['auth'])) {
    header("Location: login.php");
    exit();
}
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['idCart']) && isset($_POST['idOrder'])) {
    $idCart = $_POST['idCart'];
    $idOrder = $_POST['idOrder'];
    $result = $orderService->getOrderProductsByCartId($idCart);
    $order = $orderService->getOrderById($idOrder);
   
    if ($result) {
        header('Content-Type: application/json');
        $response = array("success" => true, "productsOrder" => $result, "orderTotal" => $order->getTotal(), "orderStatus" => $order->getStatus());
        echo json_encode($response);
        exit;
    } else {
        header('Content-Type: application/json');
        $response = array("success" => false);
        echo json_encode($response);
        exit;
    }
}

try {
    $smarty->assignCartVariables($smarty, $cartService);
    $smarty->assign("categories", $productService->getAllCategories());
    $smarty->assign("addresses", $orderService->getAddressesByUserId($_SESSION["auth"]["user"]));
    $smarty->assign("userCards",$orderService->getAllCreditCardsByUserId($_SESSION['auth']['user']));
    $smarty->assign("user", $userService->getUserById($_SESSION['auth']['user']));
    $smarty->assign("userOrders", $orderService->getOrdersByUserId($_SESSION['auth']['user']));
    $smarty->assign("current_view", "customerAccount.tpl");
    $smarty->display("index.tpl");
} catch (SmartyException $e) {
    $smarty->assign("content_load", "404.tpl");
    $smarty->display("index.tpl");
}
?>