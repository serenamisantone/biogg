<?php

require_once("./assets/php/DbConnection.php");
require_once("./assets/php/models/User.php");
require_once("./assets/php/models/ShoppingCart.php");
require_once("./assets/php/models/Review.php");
require_once("./assets/php/models/ShoppingCartProduct.php");



class UserService
{
    private $connection;

    function __construct()
    {
        $this->connection = DbConnection::getInstance()->getConnection();
    }

    public function getUserById($userId)
    {
        $validateUserQuery = "SELECT *  FROM user  WHERE user.id='{$userId}'";

        $queryResult = $this->connection->query($validateUserQuery);
        $result = $queryResult->fetch_assoc();

        if (empty($result)) {
            Header("Location: error.php?user_not_found");
            return false;
        }

        $user = new User();
        $user->setuserId($result['id']);
        $user->setName($result['name']);
        $user->setSurname($result['surname']);
        $user->setEmail($result['email']);

        return $user;
    }



    public function check($username, $password)
    {


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
                    $_SESSION['auth']['user'] = $data['id'];
                    $userId = $_SESSION['auth']['user'];

                    // $expiryTime = time() + (24 * 60 * 60);
                    //setcookie('user', $data['id'], $expiryTime, '/');

                    //assegno il gruppo
                    $result = $this->connection->query("SELECT `group`.name from user join user_has_group on user_has_group.user_id = user.id join `group` on user_has_group.group_id=`group`.id where user.username = '{$username}';");
                    if ($result === false) {
                        // Errore nella query
                        Header("Location: error.php?errorenellaquery");
                        exit;
                    } else {
                        $data = $result->fetch_assoc();
                        $_SESSION['auth']['group'] = $data['name'];
                    }


                    $result = $this->connection->query("SELECT * from shopping_cart where shopping_cart.user_id = '{$userId}' AND shopping_cart.is_open= 1 ;");
                    if ($result === false) {
                        // Errore nella query
                        Header("Location: error.php?errore_nella_query");
                        exit;
                    } else {
                        if ($result->num_rows == 0) {
                            Header("Location: error.php?carrello_non_trovato");
                            exit;
                        } else {
                            $data = $result->fetch_assoc();
                            $cart = new ShoppingCart();
                            $cart->setIsOpen(true);
                            $cart->setUser($this->getUserById($userId));
                            //assegna prodotti al carrello                      
                            $_SESSION['auth']['cart'] = $cart;
                        }

                    }

                    return true;
                }
            }
        } else {

            // user already logged

        }
    }



    public function getGroupById($userId)
    {
        $validateUserQuery = "SELECT group.id, group.name FROM group JOIN user_has_group ON group.id=user_has_group.group_id WHERE user_has_group.user_id='{$userId}'";
        $queryResult = $this->connection->query($validateUserQuery);
        if ($queryResult)
            $result = $queryResult->fetch_assoc();

        if (empty($result)) {
            Header("Location: error.php?group_not_found");
            exit;
        }
        $group = new Group($result['id'], $result['name']);
        return $group;


    }

    /* public function getServicesById($groupId){
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

    public function getAllReviews()
    {
        $query = "SELECT * FROM review";
        $result = $this->connection->query($query);
        $all_reviews = array();
        if (($result) && ($result->num_rows > 0)) {
            while ($row = $result->fetch_assoc()) {
                $review = new Review();
                $review->setReviewId($row['id']);
                $review->setRate($row['rate']);
                $review->setCaption($row['caption']);
                $review->setDescription($row['description']);
                $review->setUser($this->getUserById($row['user_id']));
                $all_reviews[] = $review;
            }
            return $all_reviews;
        }
        return null;
    }
}