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
        $user->setUsername($result['username']);

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
                    } else {
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

    function createAccount($name, $surname, $email, $username, $password)
    {
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

    function getUserIdByUsername($username)
    {
        $query = "SELECT id FROM user WHERE username = '$username'";
        $result = $this->connection->query($query);

        if ($result) {
            $row = $result->fetch_assoc();
            return $row['id'];
        }

        return null;
    }
    public function getErrorMessage()
    {
        return $this->error_message;
    }

    public function updateProfile($name, $surname, $email, $username)
    {
        $id = $_SESSION['auth']['user'];
        error_log($id . $name . $surname . $email . $username);
        $sql = "UPDATE user SET `name`=?, surname=?, email=?, username=? WHERE id=?";
        $stmt = $this->connection->prepare($sql);
        $stmt->bind_param("ssssi", $name, $surname, $email, $username, $id);
        $stmt->execute();

        if ($stmt->affected_rows > 0) {
            $stmt->close();
            return true;
        } else {
            $stmt->close();
            return false;
        }
    }

    public function updatePassword($userId, $password, $newPassword, $confirmPassword)
    {
        // Ottieni l'hash della password attuale dal database
        $sql = "SELECT password FROM user WHERE id=?";
        $stmt = $this->connection->prepare($sql);

        if (!$stmt) {
            // La preparazione della query ha generato un errore
            return false;
        }

        $stmt->bind_param("i", $userId);
        $stmt->execute();

        if ($stmt->error) {
            // Si è verificato un errore durante l'esecuzione della query
            $stmt->close();
            return false;
        }
        
        $stmt->store_result();
        $stmt->bind_result($hashedPassword);

        if ($stmt->fetch()) {
            // Verifica se la password attuale è corretta
            if (password_verify($password, $hashedPassword)) {
                // La password attuale è corretta

                // Verifica se la nuova password e la conferma coincidono
                if ($newPassword === $confirmPassword) {
                    // Genera l'hash della nuova password
                    $hashedNewPassword = password_hash($newPassword, PASSWORD_DEFAULT);

                    // Aggiorna la password nel database
                    $sqlUpdate = "UPDATE user SET password = ? WHERE id=?";
                    $stmtUpdate = $this->connection->prepare($sqlUpdate);

                    if (!$stmtUpdate) {
                        $stmt->close();
                        return false;
                    }

                    $stmtUpdate->bind_param("si", $hashedNewPassword, $userId);
                    $stmtUpdate->execute();

                    if ($stmtUpdate->affected_rows > 0) {
                        // L'aggiornamento è avvenuto con successo
                        $stmtUpdate->close();
                        $stmt->close();
                        return true;
                    } else {
                        // L'aggiornamento non è avvenuto con successo
                        $stmtUpdate->close();
                        $stmt->close();
                        return false;
                    }
                } else {
                    // La nuova password e la conferma non coincidono
                    $stmt->close();
                    return false;
                }
            } else {
                // La password attuale non è corretta
                $stmt->close();
                return false;
            }
        } else {
            // L'utente non esiste
            $stmt->close();
            return false;
        }
    }
    public function getUserReviews()
    {
        $userId = $_SESSION['auth']['user'];
        $query = "SELECT * FROM review as r where r.user_id='$userId'";
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

        }
        return $all_reviews;

    }
    public function addReview($rate, $caption, $description)
    {
        // Assuming you have a database connection stored in the variable $conn
        $userId = $_SESSION['auth']['user'];

        // Prepare the SQL statement
        $query = "INSERT INTO review (caption, `description`, rate, user_id) VALUES (?, ?, ?, ?)";
        $statement = $this->connection->prepare($query);

        // Bind parameters
        $statement->bind_param("ssii", $caption, $description, $rate, $userId);

        // Execute the statement
        $statement->execute();

        if ($statement->affected_rows > 0) {
            $statement->close();
            return true;
        } else {
            $statement->close();

            Header("Location: error.php?aggiunta_non_andata_a_buon_fine");
            return false;
        }

    }



}

