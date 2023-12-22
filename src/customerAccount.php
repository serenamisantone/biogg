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
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['deleteAddress'])) {

    $id = $_POST['addressId'];
    $result = $orderService->deleteAddress($id);


    if ($result) {
        header('Content-Type: application/json');
        $response = array("success" => true);
        echo json_encode($response);
        exit;
    } else {
        header('Content-Type: application/json');
        $response = array("success" => false);
        echo json_encode($response);
        exit;
    }
}
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['updateCart'])) {
    error_log("sono qui");
    $name = $_POST['name'];
    $expirationDate = $_POST['expirationDate'];
    $cardNumber = $_POST['cardNumber'];
    $id = $_POST['cardId'];
    $result = $orderService->updateCard($id, $name, $expirationDate, $cardNumber);


    if ($result) {
        header('Content-Type: application/json');
        $response = array("success" => true);
        echo json_encode($response);
        exit;
    } else {
        header('Content-Type: application/json');
        $response = array("success" => false);
        echo json_encode($response);
        exit;
    }
}
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['deleteCard'])) {

    $id = $_POST['cardId'];
    $result = $orderService->deleteCard($id);


    if ($result) {
        header('Content-Type: application/json');
        $response = array("success" => true);
        echo json_encode($response);
        exit;
    } else {
        header('Content-Type: application/json');
        $response = array("success" => false);
        echo json_encode($response);
        exit;
    }
}
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['updateProfile'])) {

    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $email = $_POST['email'];
    $username = $_POST['username'];

    $result = $userService->updateProfile($name, $surname, $email, $username);
    if ($result) {
        header('Content-Type: application/json');
        $response = array("success" => true);
        echo json_encode($response);
        exit;
    } else {
        header('Content-Type: application/json');
        $response = array("success" => false);
        echo json_encode($response);
        exit;
    }
}
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['updatePassword'])) {
    $userId = $_POST['userId'];
    $password = $_POST['password'];
    $newPassword = $_POST['newPassword'];
    $confirmPassword = $_POST['confirmPassword'];

    $result = $userService->updatePassword($userId, $password, $newPassword, $confirmPassword);
    if ($result) {
        header('Content-Type: application/json');
        $response = array("success" => true);
        echo json_encode($response);
        exit;
    } else {
        header('Content-Type: application/json');
        $response = array("success" => false, "message" => "Vecchia password non corretta");
        echo json_encode($response);
        exit;
    }
}
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['addReview'])) {

    $rate = $_POST['rate'];
    $title = $_POST['title'];
    $description = $_POST['description'];
   
    error_log($rate . $title . $description);
 $result = $userService->addReview($rate, $title, $description);
    if ($result) {
        header('Content-Type: application/json');
        $response = array("success" => true);
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
    $smarty->assign("userReviews", $userService->getUserReviews());
    $smarty->assignCartVariables($smarty, $cartService);
    $smarty->assign("addresses", $orderService->getAddressesByUserId($_SESSION["auth"]["user"]));
    $smarty->assign("userCards", $orderService->getAllCreditCardsByUserId($_SESSION['auth']['user']));
    $smarty->assign("user", $userService->getUserById($_SESSION['auth']['user']));
    $smarty->assign("userOrders", $orderService->getOrdersByUserId($_SESSION['auth']['user']));
    $smarty->assign("current_view", "customerAccount.tpl");
    $smarty->display("index.tpl");
} catch (SmartyException $e) {
    $smarty->assign("content_load", "404.tpl");
    $smarty->display("index.tpl");
}
?>