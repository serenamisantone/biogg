<?php
class CreditCard {
    private $id;
    private $name;
    private $expirationDate;
    private $cardNumber;
    private $userId;
    public function __construct($userId,$name, $expirationDate, $cardNumber) {
        $this->userId=$userId;
        $this->name = $name;
        $this->expirationDate = $expirationDate;
        $this->cardNumber = $cardNumber;
    }
    public  function getUserId(){
        return $this->userId;
    }
    public function setUserId($userId){
        $this->$userId=$userId;
    }
    // Getter e Setter per $id
    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    // Getter e Setter per $name
    public function getName() {
        return $this->name;
    }

    public function setName($name) {
        $this->name = $name;
    }

    // Getter e Setter per $expirationDate
    public function getExpirationDate() {
        return $this->expirationDate;
    }

    public function setExpirationDate($expirationDate) {
        $this->expirationDate = $expirationDate;
    }

    // Getter e Setter per $cardNumber
    public function getCardNumber() {
        return $this->cardNumber;
    }

    public function setCardNumber($cardNumber) {
        $this->cardNumber = $cardNumber;
    }

    public function getLastFourDigits() {
        return substr($this->cardNumber, -4);
    }
}
