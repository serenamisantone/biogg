<?php
require_once("./assets/php/DbConnection.php");
require_once("./assets/php/models/Address.php");
class OrderService
{

    private $connection;
    function __construct()
    {
        $this->connection = DbConnection::getInstance()->getConnection();
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
}