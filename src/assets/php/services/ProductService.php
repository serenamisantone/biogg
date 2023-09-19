<?php

require_once("./assets/php/DbConnection.php");
require_once("./assets/php/models/Product.php");
require_once("./assets/php/models/Category.php");

class ProductService{

    private $connection;


    function __construct()
    {
        $this->connection = DbConnection::getInstance()->getConnection();
    }

    public function getAllProductsOnline(){
        $query = "SELECT * FROM product";
        $result = $this->connection->query($query);
        $all_products = array();
        if(($result)&&($result->num_rows > 0)){
            while ($row = $result->fetch_assoc()) {
                $product = new Product();
                $product->setId($row['id']);
                $product->setName($row['name']);
                $product->setPrice($row['price']);
                $product->setImage($row['image']);
                $product->setStock($row['stock']);
                $product->setIsOnline($row['is_online']);
                $product->setCategory($this -> getCategoryById($row['category_id']));
                if($product->getIsOnline()==1)
                $all_products[] = $product;
            }
            return $all_products;
        }
        return null;
    }
    public function getProductById($productId){
        $query = "SELECT * FROM product WHERE id= '{$productId}'";
        $result = $this->connection->query($query);
        if ($result && $result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $product = new Product();
            $product->setId($row['id']);
            $product->setName($row['name']);
            $product->setPrice($row['price']);
                $product->setImage($row['image']);
                $product->setStock($row['stock']);
                $product->setIsOnline($row['is_online']);
                $product->setCategory($this -> getCategoryById($row['category_id']));

            
            return $product;
        }    
        return null;
    }

    public function getCategoryById($categoryId) {
        $query = "SELECT * FROM category WHERE id='{$categoryId}'";
        $result = $this->connection->query($query);   
        if ($result && $result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $category = new Category();
            $category->setId($row['id']);
            $category->setName($row['name']);
            
            return $category;
        }    
        return null;
    }

    public function getAllCategories(){

        $query = " SELECT * FROM category";
        $result = $this->connection->query($query); 
        $categories = array();
        if (($result) && ($result->num_rows > 0)) {
            while ($row = $result->fetch_assoc()) {
            $category = new Category();
            $category->setId($row['id']);
            $category->setName($row['name']);
            $categories[]= $category;
        }
             return $categories;
        }   
        return array();

    }
}