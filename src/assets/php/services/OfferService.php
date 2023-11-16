<?php
require_once("./assets/php/models/Offer.php");
class OfferService
{

    private $connection;
    function __construct()
    {
        $this->connection = DbConnection::getInstance()->getConnection();
    }

    public function getOfferById($id)
    {
        $query = "SELECT * FROM `offer` WHERE id = $id";

        $result = $this->connection->query($query);
        if(! $result) {Header("Location: error.php?errore_offerte");}
        if ($result && $result->num_rows > 0) {
            $data = $result->fetch_assoc();
            $offer = new Offer($data['id'], $data['name'], $data['start_date'], $data['end_date'], $data['type']);
            return $offer;
        }
        return null;
    }
    public function addOffer($offer)
    {

        // Sanitizza i dati per evitare SQL injection
        $name = $this->connection->real_escape_string($offer->getName());
        $start_date = $this->connection->real_escape_string($offer->getStartDate());
        $end_date = $this->connection->real_escape_string($offer->getEndDate());
        $type = $this->connection->real_escape_string($offer->getType());

        // Crea la query di inserimento
        $query = "INSERT INTO offer (`name`, `start_date`, `end_date`, `type`) VALUES ('$name', '$start_date', '$end_date', '$type')";

        // Esegui la query di inserimento
        $success = $this->connection->query($query);

        // Verifica se l'inserimento è riuscito
        if ($success) {
            // Restituisci l'ID dell'offerta appena inserita
            return $this->connection->insert_id;
        } else {
            // Restituisci false se l'inserimento non è riuscito
            return false;
        }
    }

    public function removeOffer($offer)
    {
        $offerId = $this->connection->real_escape_string($offer->getId());
        $query = "DELETE FROM offer WHERE id = '$offerId'";
        // Esegui la query di eliminazione
        $success = $this->connection->query($query);
        // Restituisci true se l'eliminazione è riuscita, altrimenti false
        return $success;
    }

    public function assignOfferToProduct($offerId, $productId)
    {
        $query = "INSERT INTO product_offer (offer_id,product_id) VALUES ('$offerId','$productId')";
        $success = $this->connection->query($query);
        return $success;
    }

    public function deleteOfferToProduct($offerId, $productId)
    {

        $query = "DELETE FROM product_offer WHERE offer_id = '$offerId' and product_id = '$productId'";
        // Esegui la query di eliminazione
        $success = $this->connection->query($query);
        // Restituisci true se l'eliminazione è riuscita, altrimenti false
        return $success;
    }

    public function getOfferByProductId($productId)
    {
        $query = "SELECT offer_id FROM product_offer as po  WHERE po.product_id='$productId'";
        $result = $this->connection->query($query);
        $offers = [];
        if ($result && $result->num_rows > 0) {
            while ($offerData = $result->fetch_assoc()) {
                $offer = $this->getOfferById($offerData["offer_id"]);
                $offers[] = $offer;
            }
        }
        return $offers;
    }

}