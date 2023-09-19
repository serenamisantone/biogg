<?php

require_once("./assets/php/DbConnection.php");
require_once("./assets/php/models/Wishlist.php");
require_once("./assets/php/models/Product.php");
require_once("./assets/php/services/ProductService.php");



class WishlistService{

    private $connection;
    private $productService;


    function __construct()
    {
        $this->connection = DbConnection::getInstance()->getConnection();
        $this->productService = new ProductService();
    }
    public function getUserWishlist($userId) {
        $query = "SELECT * FROM wishlist WHERE wishlist.user_id = '{$userId}'";
        $result = $this->connection->query($query);
        $wishlistItems = array();
    
        if ($result && $result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $wishlist = new Wishlist();
                $wishlist->setWishlistId($row['id']);
                $wishlist->setUser($_SESSION['auth']['user']);
                $product = $this->productService->getProductById($row['product_id']);
                $wishlist->setProduct($product);
    
                $wishlistItems[] = $wishlist;
            }
        }
    
        return $wishlistItems;
    }
    
    public function addToWishlist($userId, $productId) {
        $query = "SELECT * FROM wishlist WHERE user_id = '{$userId}' AND product_id = '{$productId}'";
        $result = $this->connection->query($query);
        
        if ($result && $result->num_rows > 0) {
            return false;
        }
        $insertQuery = "INSERT INTO wishlist (user_id, product_id) VALUES ('{$userId}', '{$productId}')";
        $insertResult = $this->connection->query($insertQuery);
        
        if ($insertResult) {
            return true; 
        } else {
            return false;
        }
    }
    
}