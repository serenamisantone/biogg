<?php

require_once("./assets/php/DbConnection.php");
require_once("./assets/php/models/User.php");
require_once("./assets/php/models/ShoppingCart.php");
require_once("./assets/php/models/Review.php");
require_once("./assets/php/models/Wishlist.php");
require_once("./assets/php/models/WishlistProduct.php");
require_once("./assets/php/services/CartService.php");




class UserService
{
    private $connection;
    private $cartService;
    private $error_message;

    function __construct()
    {
        $this->connection = DbConnection::getInstance()->getConnection();
        $this->cartService = new CartService();
    }

    public function getUserById($userId)
    {
        $validateUserQuery = "SELECT *  FROM user  WHERE user.id='{$userId}'";

        $queryResult = $this->connection->query($validateUserQuery);
        $result = $queryResult->fetch_assoc();

        if (empty($result)) {
            Header("Location: error.php?user_not_found");
            return null;
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

                $result = $this->connection->query("SELECT * FROM user WHERE username = '{$username}'");

                if (!$result) {
                    Header("Location: error.php?generic");
                    exit;
                }

                if ($result->num_rows == 0) {
                    Header("Location: error.php?001-uknown-user");
                    exit;
                } else {
                    $data = $result->fetch_assoc();
                    $hashedPassword = $data['password'];

                    // $expiryTime = time() + (24 * 60 * 60);
                    //setcookie('user', $data['id'], $expiryTime, '/');
                    if (password_verify($password, $hashedPassword)) {
                        $_SESSION['auth']['user'] = $data['id'];
                        $userId = $_SESSION['auth']['user'];
    
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
                    //update cart
                    
                    //assegno carrello allo user
                    $_SESSION['auth']['cart'] = $this->cartService->assignShoppingCart($userId);
                    
                    return true;
                }else{
                    Header("Location: error.php?003-incorrect-password");
                    exit;
                }
            }
        } 
    }
    return false;
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

function createAccount($name, $surname, $email, $username, $password) {
    if (empty($name) || empty($surname) || empty($email) || empty($username) || empty($password)) {
        $this->error_message = "Per favore, inserisci tutti i dati richiesti.";
        return false;
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $this->error_message = "L'email non è nel formato corretto.";
        return false;
    }

    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    
    $checkEmailQuery = "SELECT email FROM user WHERE email = '$email'";
    $checkUsernameQuery = "SELECT username FROM user WHERE username = '$username'";

    $resultEmail = $this->connection->query($checkEmailQuery);
    $resultUsername = $this->connection->query($checkUsernameQuery);

    if ($resultEmail->num_rows > 0) {
        $this->error_message = "L'utente è già registrato.";
        return false;
    }

    if ($resultUsername->num_rows > 0) {
        $this->error_message = "Username già in uso.";
        return false;
    }


    $insertQuery = "INSERT INTO user (name, surname, username, password, email) VALUES ('$name', '$surname', '$username', '$hashedPassword', '$email')";
    $insertResult = $this->connection->query($insertQuery);

    if ($insertResult) {
        $userId = $this->getUserIdByUsername($username);

        if ($userId) {
            $insertUserGroupQuery = "INSERT INTO user_has_group (user_id, group_id) VALUES ('$userId',1)";
            $insertUserGroupResult = $this->connection->query($insertUserGroupQuery);
            $insertCartQuery = "INSERT INTO shopping_cart (user_id, is_open) VALUES ('$userId',1)";
            $insertCartResult = $this->connection->query($insertCartQuery);
            if ($insertUserGroupResult && $insertCartResult) {
                return true;
            }
        }
    }

    $this->error_message = "Si è verificato un errore durante la registrazione";
    return false;
}

function getUserIdByUsername($username) {
    $query = "SELECT id FROM user WHERE username = '$username'";
    $result = $this->connection->query($query);

    if ($result) {
        $row = $result->fetch_assoc();
        return $row['id'];
    }

    return null;
}
public function getErrorMessage() {
    return $this->error_message;
}

}