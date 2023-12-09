<?php
require_once("./assets/php/models/Offer.php");
class OfferService
{

    private $connection;
    function __construct()
    {
        $this->connection = DbConnection::getInstance()->getConnection();
    }
    public function getOffers()
{
    $query = "SELECT * FROM `offer`";

    $result = $this->connection->query($query);

    if (! $result) {
        Header("Location: error.php?errore_offerte");
    }

        $data_offers = array();

        if (($result) && ($result->num_rows > 0)) {
            while ($row = $result->fetch_assoc()) {
                $offer = new Offer();
                $offer->setId($row['id']);
                $offer->setName($row['name']);
                $offer->setStartDate($row['start_date']);
                $offer->setEndDate($row['end_date']);
                $offer->setType($row['type']);
                $data_offers[] = $offer;
            }

            return $data_offers;
        }

        return array();
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
    public function addOffer($offerName, $offerStartDate, $offerEndDate, $offerType)
    {
        $query = "INSERT INTO offer (name, start_date, end_date, type) VALUES ('{$offerName}', '{$offerStartDate}', '{$offerEndDate}', '{$offerType}')";

        $result = $this->connection->query($query);
    
        if ($result === false) {
            return false;
        }
    
        return true;
    }

    public function removeOffer($offerId)
    {
        $query= "DELETE FROM product_offer WHERE offer_id = $offerId";
        $result = $this->connection->query($query);
  
      if ($result === false) {
          // Gestisci l'errore se necessario
          return false;
      }
      $query = "DELETE FROM offer WHERE id={$offerId}";
      $result = $this->connection->query($query);
  
      if ($result === false) {
          // Gestisci l'errore se necessario
          return false;
      }
  
      return true;
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
function updateOffer($offerId,$editedName,$editedStartDate, $editedEndDate,$editedType)
{
    $query = "UPDATE offer SET name = '$editedName', start_date = '$editedStartDate', end_date = '$editedEndDate', type = '$editedType' WHERE id = '$offerId'";
    $result = $this->connection->query($query);

    if ($result === false) {
        return false;
    }

    return true;
}
}
