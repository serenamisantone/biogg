<?php
require_once("./assets/Config.php");
require_once("./assets/php/services/CartService.php");
require_once("./assets/php/services/OrderService.php");
require_once("./assets/php/models/Address.php");

session_start();
$smarty = new Config();
$cartService = new CartService();
$orderService = new OrderService();

try {
    if (!isset($_SESSION['auth'])) {
        header("Location: login.php");
        exit;
    } else {

        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['addAddress'])) {
            $formData = json_decode($_POST['formData'], true);

            // Accedi ai dati
            $regione = $formData[0]['value'];
            $provincia = $formData[1]['value'];
            $comune = $formData[2]['value'];
            $via = $formData[3]['value'];
            $civico = $formData[4]['value'];

            $address = new Address($_SESSION['auth']['user'], $regione, $provincia, $comune, $via, $civico, ' ');

            $result = $orderService->addAddress($address);

            if ($result != 0) {
                $newAddress = $orderService->getAddressById($result);
                $newAddressAsJson = $newAddress->getJson();
                header('Content-Type: application/json');
                $response = array("success" => true, "message" => "Aggiunta andata a buon fine", 'newAddress' => $newAddressAsJson);

                echo json_encode($response);

                exit;

            } else {
                header('Content-Type: application/json');
                $response = array("success" => false, "message" => "Aggiunta NON andata a buon fine");
                echo json_encode($response);
                exit;
            }
        }
        if ($_SERVER["REQUEST_METHOD"] == "POST" && (isset($_POST['editAddress']))) {
            // Verifica se è un'aggiunta o una modifica in base ai dati ricevuti
            $formData = json_decode($_POST['formData'], true);

            // Accedi ai dati
            $regione = $formData[0]['value'];
            $provincia = $formData[1]['value'];
            $comune = $formData[2]['value'];
            $via = $formData[3]['value'];
            $civico = $formData[4]['value'];
            $id = $formData[5]['value'];

            $address = new Address($_SESSION['auth']['user'], $regione, $provincia, $comune, $via, $civico, ' ');
            $address->setId($id);
            $result = $orderService->updateAddress($address);
            if ($result == 1) {
                header('Content-Type: application/json');
                $response = array("success" => true, "message" => "Modifica andata a buon fine");
                echo json_encode($response);
                exit;
            } else {
                header('Content-Type: application/json');
                $response = array("success" => false, "message" => "Modifica NON andata a buon fine");
                echo json_encode($response);
                exit;
            }

        }

        $smarty->assign("addresses", $orderService->getAddressesByUserId($_SESSION["auth"]["user"]));
        if (isset($_SESSION['auth']['cart'])) {
            $smarty->assign("cart", $_SESSION['auth']['cart']);
        }
        $smarty->assign('cartProducts', $cartService->getCartProducts());
        $smarty->assign("totalPrice", $cartService->getTotalPrice());
        $smarty->assign("current_view", "checkout.tpl");
        $smarty->display("index.tpl");
    }
} catch (SmartyException $e) {
    $smarty->assign("content_load", "404.tpl");
    $smarty->display("index.tpl");
}
?>