<?php

require_once("./assets/php/DbConnection.php");
require_once("./assets/php/models/Product.php");
require_once("./assets/php/models/Category.php");
require_once("./assets/php/models/ProductInfo.php");
require_once("./assets/php/models/ProductFeature.php");
require_once("./assets/php/models/ShoppingCart.php");
class ProductService
{

    private $connection;


    function __construct()
    {
        $this->connection = DbConnection::getInstance()->getConnection();
    }

    public function getAllProductsOnline()
    {
        $query = "SELECT * FROM product";
        $result = $this->connection->query($query);
        $all_products = array();
        if (($result) && ($result->num_rows > 0)) {
            while ($row = $result->fetch_assoc()) {
                $product = new Product();
                $product->setId($row['id']);
                $product->setName($row['name']);
                $product->setPrice($row['price']);
                $product->setImage($row['image']);
                $product->setStock($row['stock']);
                $product->setIsOnline($row['is_online']);
                $product->setCategory($this->getCategoryById($row['category_id']));
                if ($product->getIsOnline() == 1)
                    $all_products[] = $product;
            }
            return $all_products;
        }
        return null;
    }
    public function getProductById($productId)
    {
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
            $product->setCategory($this->getCategoryById($row['category_id']));


            return $product;

        }
        return null;
    }

    public function getProductInfoById($productId)
    {
        $query = "SELECT * FROM product_info where product_id=$productId";
        $result = $this->connection->query($query);

        if (($result) && ($result->num_rows > 0)) {
            $row = $result->fetch_assoc();
            $product = new ProductInfo();
            $product->setProductId($row['product_id']);
            $product->setIngredients($row['ingredients']);
            $product->setImage1($row['image1']);
            $product->setImage2($row['image2']);
            $product->setDescription($row['description']);
            $this->addProductFeatures($product);
            return $product;
        } else {
            Header("Location: error.php?info_non_trovate");
        }
        return null;
    }

    public function addProductFeatures($product)
    {
        $id = $product->getProductId();
        $query = "SELECT * FROM product_feature where product_id=$id";
        $result = $this->connection->query($query);
        if (($result) && ($result->num_rows > 0)) {

            while ($row = $result->fetch_assoc()) {

                $product->addFeatures($row['title'], $row['description']);

            }

        } else {
            Header("Location: error.php?features_non_inserite_");
        }
    }
    public function getCategoryById($categoryId)
    {
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

    public function getAllCategories()
    {

        $query = " SELECT * FROM category";
        $result = $this->connection->query($query);
        $categories = array();
        if (($result) && ($result->num_rows > 0)) {
            while ($row = $result->fetch_assoc()) {
                $category = new Category();
                $category->setId($row['id']);
                $category->setName($row['name']);
                $categories[] = $category;
            }
            return $categories;
        }
        return array();

    }

    public function getCartProducts($cart)
    {
        $products = array();
        $cartProducts = $cart->getProducts();
        foreach ($cartProducts as $productId => $quantity) {
            $product = $this->getProductById($productId);


            $productWithQuantity = array(
                'product' => $product,
                'quantity' => $quantity
            );
            // Aggiungiamo questo array all'array principale
            $products[] = $productWithQuantity;
        }
        return $products;
    }

    public function getTotalPrice($cart)
    {
        $totalPrice=0;
        $cartProducts = $cart->getProducts();
        foreach ($cartProducts as $productId => $quantity) {
            $product = $this->getProductById($productId);

            $totalPrice = $totalPrice+$product->getPrice()*$quantity;

        }
        return $totalPrice;

    }
    public function searchProducts($searchQuery) {
    if (!empty($searchQuery)) {
        // Esegui la query per cercare i prodotti
        $query = "SELECT * FROM product WHERE product.name LIKE '%$searchQuery%'";
        
    } else{
        $query = "SELECT * FROM product";

    }
    $result = $this->connection->query($query);
    $all_products = array();
        if (($result) && ($result->num_rows > 0)) {
            while ($row = $result->fetch_assoc()) {
                $product = new Product();
                $product->setId($row['id']);
                $product->setName($row['name']);
                $product->setPrice($row['price']);
                $product->setImage($row['image']);
                $product->setStock($row['stock']);
                $product->setIsOnline($row['is_online']);
                $product->setCategory($this->getCategoryById($row['category_id']));
                if ($product->getIsOnline() == 1)
                    $all_products[] = $product;
            }
            return $all_products;
            
        }
        return null;
    }
}