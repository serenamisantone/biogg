<?php
require_once("./assets/php/DbConnection.php");
require_once("./assets/php/models/Address.php");
require_once("./assets/php/models/Order.php");
require_once("./assets/php/services/CartService.php");
require_once("./assets/php/services/ProductService.php");
class OrderService
{
    private $cartService;
    private $productService;
    private $connection;
    function __construct()
    {
        $this->connection = DbConnection::getInstance()->getConnection();
        $this->cartService = new CartService();
        $this->productService = new ProductService();
    }

    public function addAddress($address)
    {
        $query = "INSERT INTO `address` (user_id, regione, provincia, comune, via, civico, other_info) VALUES (?, ?, ?, ?, ?, ?, ?)";

        // Preparazione dello statement
        $stmt = $this->connection->prepare($query);

        // Verifica dell'errore nella preparazione dello statement
        if (!$stmt) {
            die("Errore nella preparazione dello statement: " . $this->connection->error);
        }
        $userId = $address->getUserId();
        $regione = $address->getRegione();
        $provincia = $address->getProvincia();
        $comune = $address->getComune();
        $via = $address->getVia();
        $civico = $address->getCivico();
        $otherInfo = $address->getOtherInfo();
        // Binding dei parametri
        $stmt->bind_param("issssis", $userId, $regione, $provincia, $comune, $via, $civico, $otherInfo);

        // Esecuzione dello statement
        if ($stmt->execute()) {
            return $this->connection->insert_id;
        } else {
            header("Location: error.php?address_non_inserito");
            exit(); // Termina l'esecuzione dello script dopo la reindirizzazione
        }
    }

    public function updateAddress($address)
    {
        $result = $this->connection->query(" UPDATE `address`
        SET
            regione = '{$address->getRegione()}',
            provincia = '{$address->getProvincia()}',
            comune = '{$address->getComune()}',
            via = '{$address->getVia()}',
            civico = '{$address->getCivico()}',
            other_info = '{$address->getOtherInfo()}'
        WHERE
            id = {$address->getId()}");
        return $result;
    }

    public function deleteAddress($addressId)
    {
        $result = $this->connection->query("DELETE from `address` where id=$addressId");
        if (!$result) {
            Header("Location: error.php?cancellazione_non_andata_a_buon_fine");
        }
    }
    public function getAddressesByUserId($userId)
    {
        $result = $this->connection->query("SELECT *
                    FROM `address`
                    WHERE user_id = '{$userId}'
                ");
        if (!$result) {
            Header("Location: error.php?query_address_wrong");
        } else {
            $addresses = [];
            if ($result->num_rows == 0) {
                return $addresses;
            }
            // Puoi ora elaborare il risultato della query
            while ($row = $result->fetch_assoc()) {
                $address = new Address($row['user_id'], $row['regione'], $row['provincia'], $row['comune'], $row['via'], $row['civico'], $row['other_info']);
                $address->setId($row['id']);
                $addresses[] = $address;
            }
            return $addresses;
        }
    }
    public function getAddressById($addressId)
    {
        $result = $this->connection->query("SELECT *
        FROM `address`
        WHERE id = '{$addressId}'
    ");
        if (!$result) {
            Header("Location: error.php?query_address_wrong");
        } else {

            if ($result->num_rows == 0) {
                Header("Location: error.php?address_non_trovato");
            } else {
                // Puoi ora elaborare il risultato della query
                $row = $result->fetch_assoc();
                $address = new Address($row['user_id'], $row['regione'], $row['provincia'], $row['comune'], $row['via'], $row['civico'], $row['other_info']);
                $address->setId($row['id']);
                return $address;
            }
        }
    }
    public function addCreditCard($creditCard)
    {
        $userId = $_SESSION['auth']['user'];
        $name = $creditCard->getName();
        $cardNumber = $creditCard->getCardNumber();
        $expirationDate = $creditCard->getExpirationDate();

        $query = "INSERT INTO credit_cards (user_id, `name`, card_number, expiration_date) VALUES ('$userId', '$name', '$cardNumber', '$expirationDate')";

        $result = $this->connection->query($query);
        if ($result) {
            return $this->connection->insert_id;
        } else {
            return 0;
        }

    }

    function getAllCreditCardsByUserId($userId)
    {
        $query = "SELECT * FROM credit_cards WHERE user_id=$userId";
        $result = $this->connection->query($query);
        $cards = [];
        if ($result && $result->num_rows > 0) {

            while ($row = $result->fetch_assoc()) {
                $creditCard = new CreditCard(
                    $row['user_id'],
                    $row['name'],
                    $row['expiration_date'],
                    $row['card_number'],

                );
                $creditCard->setId($row['id']);
                $cards[] = $creditCard;
            }

        }
        return $cards;
    }


    public function createOrder($addressId)
    {
        try {
            $userId = $_SESSION['auth']['user'];
            $shoppingCartId = $_SESSION['auth']['cart']->getShoppingCartId();
            $total = $this->cartService->getTotalPrice();
            $date = date('Y-m-d H:i:s');

            $query = "INSERT INTO `order` (user_id, shopping_cart_id, address_id, total, `date`) VALUES ('$userId', '$shoppingCartId', '$addressId', '$total', '$date')";
            error_log($query);
            $result = $this->connection->query($query);
            if ($result) {
                //chiudo il carrello
                $orderId = $this->connection->insert_id;
                $query = "UPDATE shopping_cart SET is_open=0 WHERE id='$shoppingCartId' ";
                $result = $this->connection->query("$query");
                if ($result) {
                    //creo un nuovo carrello
                    error_log("sono qui cazzooo");
                    $query = "INSERT INTO shopping_cart (user_id) VALUES ('$userId')";
                    $result = $this->connection->query($query);
                    if ($result) {
                        $query = "INSERT INTO shipping(order_id, `status`) VALUES('$orderId','CONFERMATO') ";
                        $result = $this->connection->query($query);
                        if ($result) {
                            $_SESSION['auth']['cart'] = $this->cartService->assignShoppingCart($userId);
                            return true;
                        }
                    }
                } else {
                    Header("Location: error.php?query_chiusura_carrello_wrong");
                }

            } else {
                Header("Location: error.php?query_order_wrong");
            }
        } catch (Exception $e) {
            error_log($e->getMessage());
        }
    }

    public function getOrdersByUserId($userId)
    {
        $query = "SELECT * FROM `order` where user_id='$userId'";
        $result = $this->connection->query($query);
        if ($result) {
            $orders = [];
            while ($row = $result->fetch_assoc()) {
                $order= $this->getOrderById($row['id']);
                $orders[] = $order;
            }
            return $orders;
        } else {
            error_log($result);
            return;
        }
    }
    public function getOrderProductsByCartId($cartId)
    {
        $result = $this->connection->query("SELECT * FROM shopping_cart_product where shopping_cart_product.shopping_cart_id='{$cartId}'");

        $products = array();
        if ($result && $result->num_rows > 0) {

            while ($cartProduct = $result->fetch_assoc()) {

                $product = $this->productService->getProductById($cartProduct['product_id']);
                $productJson = array(
                    'name' => $product->getName(),
                    'prezzo' => $product->getPrice(),
                    'quantity' => $cartProduct['added_quantity']
                );
                // Aggiungiamo questo array all'array principale
                $products[] = $productJson;
            }
        } else {
            Header("Location: error.php?qualcosa_e_andato_storto");
        }
        return $products;
    }
    public function getOrderById($orderId)
    {
        $query = "SELECT * FROM `order` where `order`.id='{$orderId}'";
        $result = $this->connection->query($query);
        if ($result && $result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $order = new Order($row['id'], $row['user_id'], $row['shopping_cart_id'], $row['total'], $row['date'], $row['address_id']);


            $orderId = $row['id'];
            $statusResult = $this->connection->query("SELECT `status` FROM shipping WHERE order_id='$orderId' ");

            $data = $statusResult->fetch_assoc();
            $order->setStatus($data['status']);
            return $order;
        }
        return null;
    }
}