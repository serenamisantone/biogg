<?php

require_once("./assets/php/DbConnection.php");
require_once("./assets/php/models/User.php");
require_once("./assets/php/models/Review.php");



class UserService{
    private $connection;

    function __construct()
    {
        $this->connection = DbConnection::getInstance()->getConnection();
    }

    public function getUserById($userId){
        $validateUserQuery = "SELECT *  FROM user  WHERE user.id='{$userId}'";

        $queryResult = $this->connection->query($validateUserQuery); 
        $result = $queryResult->fetch_assoc();

        if(empty($result))return false;

        $user = new User();
        $user -> setuserId($result['id']);
        $user -> setName($result['name']);
        $user -> setSurname($result['surname']);
        $user -> setEmail($result['email']);
        $user -> setServices($_SESSION['auth']['service']);
        return $user;
    }

   
    
    public function check($username, $password) {
       

        if (!isset($_SESSION['auth'])) {

            if (!isset($username) or !isset($password)) {
                Header("Location: error.php?002-username-and-password-not-entered");
                exit;
            } else {

                $result = $this->connection->query("SELECT id FROM user WHERE username = '{$username}' AND password = '{$password}'");

                if (!$result) {
                    Header("Location: error.php?generic");
                    exit;
                }
            
                if ($result->num_rows == 0) {
                    Header("Location: error.php?001-uknown-user");
                    exit;
                } else {
                    $data = $result->fetch_assoc();
                    $_SESSION['auth']['user'] = $data;

                    $result = $this ->connection->query("SELECT service.name, service.script
                        from user
                         join user_has_group on user_has_group.user_id = user.id
                         join service_has_group on service_has_group.group_id = user_has_group.group_id
                        join `service` on service.id = service_has_group.service_id
                        where user.username = '{$username}'");
                    if ($result === false) {
                        // Errore nella query
                        Header("Location: error.php?generic");
                        exit;
                    }
                    $service = array();

                    while ( $data = $result->fetch_assoc()) {
                        $service[] = $data;
                    }

                    $_SESSION['auth']['service'] = $service;
                    
                    return true;
                }
            }
        } else {

            // user already logged

        }

        if(!isset($_SESSION['auth']['service'][basename($_SERVER['SCRIPT_FILENAME'])])) {
            Header("Location: error.php?003-permission-denied");
            exit;
        }

        

    }

    
 
   /* public function login($email, $password){
        $encryptedPassword = md5($password);
        $query = "SELECT id FROM users WHERE email='{$email}' AND password='{$encryptedPassword}'";

        $queryResult = $this->connection->query($query); 
        $result = $queryResult->fetch_assoc();

        if(empty($result))return false;

        $expiryTime = time() + (24 * 60 * 60); 
        setcookie('user', $result['id'], $expiryTime, '/');
        return true;
    }

  

    public function getGroupsById($userId){
        $validateUserQuery = "SELECT group.id, group.name FROM group JOIN user_has_group ON group.id=user_has_group.group_id WHERE user_has_group.user_id='{$userId}'";
        $queryResult = $this->connection->query($validateUserQuery); 
        $result = $queryResult->fetch_assoc();
        $groups =array();
        if(($result)&&($result->num_rows > 0)){
            while ($row = $result->fetch_assoc()) {
             $group = new Group($row['id'],$row['name']);
             $group ->setServices($this ->getServicesById($row['id']));
             $groups[] = $group ;
            }
            return $groups;
        }
        return $groups;

    }

    public function getServicesById($groupId){
        $validateUserQuery = "SELECT service.code, service.name FROM `service` JOIN service_has_group ON service.code=service_has_group.service_code WHERE service_has_group.group_id='{$group_id}'";
        $queryResult = $this->connection->query($validateUserQuery); 
        $result = $queryResult->fetch_assoc();
        $services =array();
        if(($result)&&($result->num_rows > 0)){
            while ($row = $result->fetch_assoc()) {
            $service = new Service($row['code'],$row['name']);            
            $services[] = $service ;
            }
            return $services;
        }
        return $services;

    }*/
  
    public function getAllReviews(){
        $query = "SELECT * FROM review";
        $result = $this->connection->query($query);
        $all_reviews = array();
        if(($result)&&($result->num_rows > 0)){
            while ($row = $result->fetch_assoc()) {
                $review = new Review();
                $review->setReviewId($row['id']);
                $review->setRate($row['rate']);
                $review->setCaption($row['caption']);
                $review->setDescription($row['description']);
                $review->setUser($this -> getUserById($row['user_id']));
                $all_reviews[]= $review;
            }
            return $all_reviews;
        }
        return null;
    }
}