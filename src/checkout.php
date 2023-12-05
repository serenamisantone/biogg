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
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['editAddress'])) {
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

        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['addCreditCard'])) {
            $formData = json_decode($_POST['formData'], true);
            $saveCard = $formData[4]['value']; // Converte la stringa in un booleano
            if ($saveCard) {
                $user_id = $_SESSION['auth']['user'];
                $name = $formData[0]['value'];
                $card_number = $formData[1]['value'];  // Sostituisci con il nome reale del campo input
                $expiration_date = $formData[2]['value'];  // Sostituisci con il nome reale del campo input
                $creditCard = new CreditCard($user_id, $name, $expiration_date, $card_number);
                $result = $orderService->addCreditCard($creditCard);
                if ($result != 0) {
                    header('Content-Type: application/json');
                    $response = array("success" => true, "message" => "Carta di credito aggiunta e salvata con successo");
                    echo json_encode($response);
                    exit;
                } else {
                    header('Content-Type: application/json');
                    $response = array("success" => false, "message" => "Errore durante l'aggiunta e il salvataggio della carta di credito");
                    echo json_encode($response);
                    exit;
                }
            } else {
                header('Content-Type: application/json');
                $response = array("success" => true, "message" => "Carta di credito non da salvare");
                echo json_encode($response);
                exit;
            }
        }

        $smarty->assign("creditCards", $orderService->getAllCreditCardsByUserId($_SESSION["auth"]["user"]));
        $smarty->assign("addresses", $orderService->getAddressesByUserId($_SESSION["auth"]["user"]));
        $smarty->assignCartVariables($smarty, $cartService);;
        $smarty->assign("current_view", "checkout.tpl");
        $smarty->display("index.tpl");
    }
} catch (SmartyException $e) {
    $smarty->assign("content_load", "404.tpl");
    $smarty->display("index.tpl");
}
?>