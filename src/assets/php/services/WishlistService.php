<?php

require_once("./assets/php/DbConnection.php");
require_once("./assets/php/models/Wishlist.php");
require_once("./assets/php/models/WishlistProduct.php");
require_once("./assets/php/models/Product.php");
require_once("./assets/php/models/User.php");
require_once("./assets/php/services/ProductService.php");
require_once("./assets/php/services/UserService.php");



class WishlistService{

    private $connection;
    private $productService;
    private $userService;


    function __construct()
    {
        $this->connection = DbConnection::getInstance()->getConnection();
        $this->productService = new ProductService();
        $this->userService = new UserService();
    }
  
    

    public function getUserWishlist($userId)
{
    $wishlistItems = array();

    // Query per ottenere la wishlist dell'utente
    $query = "SELECT wp.product_id
              FROM wishlist AS w
              JOIN wishlist_product AS wp ON w.id = wp.wishlist_id
              WHERE w.user_id = '{$userId}'";
    $result = $this->connection->query($query);

    if ($result && $result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $wishlistItems[] = $this->productService->getProductById($row['product_id']);
    }
    }
    
    return $wishlistItems;
}


public function checkWishlist($userId) {
    // Verifica se l'utente ha già una wishlist aperta
    if (!$this->isWishlistOpen($userId)) {
        // Se l'utente non ha una wishlist aperta, crea una nuova wishlist
        $this->createWishlist($userId);
    }
}

private function isWishlistOpen($userId) {
    // Verifica se l'utente ha una wishlist aperta
    $result = $this->connection->query ("SELECT COUNT(*) as count FROM wishlist WHERE user_id = $userId AND is_open = 1");
    if ($result) {
        $row = $result->fetch_assoc();
        $count = $row['count'];
        $result->close();
        return $count > 0;
    } else {
        // Gestisci l'errore se la query non è riuscita
        // Esempio: log dell'errore o ritorno di un valore predefinito
        return false;
    }
}

private function createWishlist($userId) {
    // Crea una nuova wishlist per l'utente
    $result = $this->connection->query ("INSERT INTO wishlist (user_id, is_open) VALUES ($userId, 1)");
    return $result;
}

function addProductToWishlist($productId) {
    if (isset($_SESSION['auth']['user'])) {
        if (isset($_SESSION['wishlist'])) {
            $userId = $_SESSION['auth']['user'];

            // Ottieni l'ID della wishlist dal database
            $wishlistIdResult = $this->connection->query("SELECT id FROM wishlist WHERE user_id = '{$userId}'; ");
            
            if ($wishlistIdResult && $wishlistIdResult->num_rows > 0) {
                $row = $wishlistIdResult->fetch_assoc();
                $wishlistId = $row['id'];
                $productAlreadyInWishlist = $this->isProductInWishlist($wishlistId, $productId);
                if (!$productAlreadyInWishlist) {
                    // Inserisci il prodotto nella wishlist
                    $result = $this->connection->query("INSERT INTO wishlist_product(wishlist_id, product_id) values ({$wishlistId}, {$productId});");

                    if ($result) {
                        return true;
                    }
                }
            }
        } else {
            return false;
        }
    } else {

    return false; // Restituisci false in caso di errore
}
}

private function isProductInWishlist($wishlistId, $productId) {
    // Verifica se il prodotto è già presente nella wishlist
    $query = "SELECT COUNT(*) as count FROM wishlist_product WHERE wishlist_id = {$wishlistId} AND product_id = {$productId}";
    $result = $this->connection->query($query);
    $row = $result->fetch_assoc();
    $count = $row['count'];

    return $count > 0;
}


    

function removeToWishlist($userId, $productId) {
    // Esegui una query SQL per eliminare il prodotto dalla wishlist dell'utente
    $query = "DELETE wp
              FROM wishlist_product AS wp
              INNER JOIN wishlist AS w ON wp.wishlist_id = w.id
              WHERE w.user_id = '{$userId}' AND wp.product_id = '{$productId}'";
    
    $result = $this->connection->query($query);
    
    if ($result) {
        // Rimozione riuscita, puoi anche aggiornare la variabile di sessione $_SESSION['wishlist'] se necessario
        // Ad esempio, aggiornando la lista dei prodotti nella sessione dopo la rimozione dal database
        //$_SESSION['wishlist']->removeProductById($productId);
        
        return true;
    } else {
        // Gestisci un eventuale errore nella query
        return false;
    }
}



}