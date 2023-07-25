<?php

require_once("./assets/php/DbConnection.php");
require_once("./assets/php/models/User.php");



class UserService{
    private $connection;

    function __construct()
    {
        $this->connection = DbConnection::getInstance()->getConnection();
    }

    public function loginAction($email, $password){
        $encryptedPassword = md5($password);
        $query = "
        SELECT id FROM users WHERE email='{$email}' AND password='{$encryptedPassword}'";

        $queryResult = $this->connection->query($query); 
        $result = $queryResult->fetch_assoc();

        if(empty($result))return false;

        $expiryTime = time() + (24 * 60 * 60); 
        setcookie('user', $result['id'], $expiryTime, '/');
        return true;
    }

    public function getUserById($userId){
        $validateUserQuery = "
        SELECT users.id, users.name, users.surname, users.email, users.password, groups.name as groupName , service.username as serviceName  FROM users 
        JOIN user_has_group ON users.id = user_has_group.user_id 
        JOIN groups ON groups.id = user_has_group.group_id 
        JOIN service_has_group ON groups.id = service_has_group.group_id
        JOIN service ON service.id = service_has_group.service_id
        WHERE users.id='{$userId}'";

        $queryResult = $this->connection->query($validateUserQuery); 
        $result = $queryResult->fetch_assoc();

        if(empty($result))return false;

        $user = new User($result['id'], $result['name'], $result['surname'], $result['email'], $result['password'], $result['groupName'],$result['serviceName']);
        return $user;
    }
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
                $review->setUser($row['user_id']);
            }
            return $all_reviews;
        }
        return null;
    }
}