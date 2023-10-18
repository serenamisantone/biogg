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
  
    

    public function getUserWishlist()
{
    $wishlistItems = array();

    // Query per ottenere la wishlist dell'utente se sono autenticato
    if(isset($_SESSION ['auth'])){
        $userId = $_SESSION ['auth'] ['user'];
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
} else{
//se non sono autenticato
if(isset($_SESSION['wishlist'])){
    $productsId = $_SESSION['wishlist']-> getProductsId();
    foreach($productsId as $product){
        $wishlistItems[] = $this->productService->getProductById($product);
    }
}
}
    
    return $wishlistItems;
}



private function createWishlist() {
    // Crea una nuova wishlist per l'utente
    if(isset($_SESSION ['auth'] ['user'])){
        $userId = $_SESSION ['auth'] ['user'];
    $result = $this->connection->query ("INSERT INTO wishlist (user_id) VALUES ($userId)");
    
    } else {
        $wishlist = new Wishlist();
        $_SESSION ['wishlist'] = $wishlist;    
}

$result = $this->connection->query("SELECT LAST_INSERT_ID() ");
$lastInsertId = $result->fetch_assoc(); // Recupera un array associativo
$id = $lastInsertId['LAST_INSERT_ID()'];
return $id;
}

function addProductToWishlist($productId) {
    if(isset($_SESSION ['auth'] ['user'])){
        //se sono autenticata
            if(isset($_SESSION ['auth'] ['wishlist'])){
                //se sono autenticata e ho una wishlist
                $wishlist= $_SESSION ['auth'] ['wishlist'];
                $wishlistId= $wishlist->getWishlistId();
                $productAlreadyInWishlist = $this->isProductInWishlist($wishlistId, $productId);
                if (!$productAlreadyInWishlist) {
                    // Inserisci il prodotto nella wishlist
                    $result = $this->connection->query("INSERT INTO wishlist_product(wishlist_id, product_id) values ({$wishlistId}, {$productId});");
                  return true;
                }
    } 
      //se sono autenticata ma non ho una wishlist
      if(isset($_SESSION['wishlist'])){
        //avevo una wishlist prima di autenticarmi
      $_SESSION ['auth']['wishlist'] = $_SESSION['wishlist'];
      $wishlist= $_SESSION ['auth']['wishlist'];
         $wishlistId= $wishlist->getWishlistId();
        $productAlreadyInWishlist = $this->isProductInWishlist($wishlistId, $productId);
        if (!$productAlreadyInWishlist) {
            // Inserisci il prodotto nella wishlist
            $result = $this->connection->query("INSERT INTO wishlist_product(wishlist_id, product_id) values ({$wishlistId}, {$productId});");
         return true;
        
    } else{ 
        //non avevo una wishlist prima di autenticarmi
         $wishlistId=  $this->createWishlist();
            // Inserisci il prodotto nella wishlist
            $result = $this->connection->query("INSERT INTO wishlist_product(wishlist_id, product_id) values ({$wishlistId}, {$productId});");
           return true;
}
      }} else  { 
    //se non sono autenticata
    //se non sono autenticata e ho una wishlist
    if(isset($_SESSION['wishlist'])){
        //controlla se è già nella wishlist e aggiunge nel caso
       $bool =  $_SESSION['wishlist']->addProducts($productId);
        return $bool;
 
} else{
        //se non sono autenticata e non ho una wishlist
       $this->createWishlist();
       //aggiunge il prodotto
       $bool =  $_SESSION['wishlist']->addProducts($productId);
        return $bool;
}  

}
}

private function isProductInWishlist($wishlistId, $productId) {
    // Verifica se il prodotto è già presente nella wishlist
    $query = "SELECT COUNT(*) as count FROM wishlist_product WHERE wishlist_id = {$wishlistId} AND product_id = {$productId}";
    $result = $this->connection->query($query);
    $row = $result->fetch_assoc();
    if($row['count']>0){
        return true;
    }else {
        return false;
    }
   
}


    

function removeToWishlist($productId) {
    if(isset($_SESSION['auth']['user'])) {
        $userId = $_SESSION['auth']['user'];

        // Esegui una query SQL per eliminare il prodotto dalla wishlist dell'utente
        $query = "DELETE wp
                  FROM wishlist_product AS wp
                  INNER JOIN wishlist AS w ON wp.wishlist_id = w.id
                  WHERE w.user_id = '{$userId}' AND wp.product_id = '{$productId}'";
                    $result = $this->connection->query($query);
                    if($result){return true;}else{return false;}
    }
        // Esegui la query in modo sicuro utilizzando istruzioni preparate o la tua API di database preferita

        // Rimuovi il prodotto dalla variabile di sessione
        if(isset($_SESSION['wishlist'])) {
                $wishlist = $_SESSION['wishlist'];
                $updatedProductsId = $wishlist->getProductsId();
                $key = array_search($productId, $updatedProductsId);
        
                if ($key !== false) {
                    unset($updatedProductsId[$key]);
                    $wishlist->setProductsId(array_values($updatedProductsId));
                    $_SESSION['wishlist'] = $wishlist; // Aggiorna la Wishlist nella variabile di sessione
                    return true;
                }
        
                return false;
            }
        }
    }