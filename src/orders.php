<?php
require_once("./assets/Config.php");
require_once("./assets/php/services/CartService.php");
require_once("./assets/php/services/OrderService.php");
require_once("./assets/php/models/Address.php");
require_once("./assets/php/models/CreditCard.php");

session_start();
$smarty = new Config();
$cartService = new CartService();
$orderService = new OrderService();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Ensure it's a POST request

    // Retrieve the data sent from the client-side (assuming it's in JSON format)
    $selectedAddressId = $_POST['selectedAddressId'];

   $result= $orderService->createOrder($selectedAddressId);
    // Return a response to the client
    if($result==1){
        header('Content-Type: application/json');
        $response = array("success" => true, "message" => "ci sono a ndato in order service");
        echo json_encode($response);
        exit;
}
} else {
    // Handle non-POST requests
    http_response_code(405); // Method Not Allowed
    echo json_encode(array('error' => 'Invalid request method'));
}
?>