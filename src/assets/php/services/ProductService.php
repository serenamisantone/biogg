<?php

require_once("./assets/php/DbConnection.php");
require_once("./assets/php/models/Product.php");
require_once("./assets/php/models/Category.php");
require_once("./assets/php/models/ProductInfo.php");
require_once("./assets/php/models/ProductFeature.php");
require_once("./assets/php/models/ShoppingCart.php");
require_once("./assets/php/services/OfferService.php");
class ProductService
{

    private $connection;
    private $offerService;

    function __construct()
    {
        $this->connection = DbConnection::getInstance()->getConnection();
        $this->offerService = new OfferService();
    }

    public function getAllProductsOnline($offset, $limit)
    {
        $query = "SELECT id FROM product WHERE is_online = 1 LIMIT {$offset}, {$limit}";

        $result = $this->connection->query($query);
        $all_products = array();

        if (($result) && ($result->num_rows > 0)) {
            while ($row = $result->fetch_assoc()) {
                $product = $this->getProductById($row["id"]);
                $all_products[] = $product;
            }

            return $all_products;
        }

        return array();
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
            $product->setOffers($this->offerService->getOfferByProductId($productId));
            if (empty($product->getOffers())) {
                error_log("è vuoto");
            } else {
                foreach ($product->getOffers() as $offer) {
                    error_log('' . $offer->getId() . '' . $offer->getName());
                }
            }

            return $product;

        }
        return null;
    }
    public function getProductsByCategory($categoryId)
    {
        $query = "SELECT * FROM product WHERE category_id= '{$categoryId}'";
        $result = $this->connection->query($query);
        $products = array();
        if (($result) && ($result->num_rows > 0)) {
            while ($row = $result->fetch_assoc()) {
                $products[] = $row;
            }
            return $products;
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
    public function getCategoryByName($categoryName)
    {
        $query = "SELECT id FROM category WHERE name='{$categoryName}'";
        $result = $this->connection->query($query);
        if ($result && $result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $id=($row['id']);

            return $id;
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



    public function searchProducts($searchQuery)
    {
        if (!empty($searchQuery)) {
            // Esegui la query per cercare i prodotti
            $query = "SELECT id FROM product WHERE product.name LIKE '%$searchQuery%'";

        } else {
            $query = "SELECT * FROM product";

        }
        $result = $this->connection->query($query);
        $all_products = array();
        if (($result) && ($result->num_rows > 0)) {
            while ($row = $result->fetch_assoc()) {
                $product = $this->getProductById($row["id"]);

                if ($product->getIsOnline() == 1)
                    $all_products[] = $product;
            }
            return $all_products;

        }
        return null;
    }

    function getTotalProduct()
    {
        $query = "SELECT COUNT(*) as total FROM product";
        $result = $this->connection->query($query);
        $total_products = $result->fetch_assoc();
        return $total_products['total'];
    }
    function getImpagination()
    {
        $total_products = $this->getTotalProduct();
        $products_per_page = 9;
        $total_pages = ceil($total_products / $products_per_page);
        return $total_pages;

    }

    function getDataProducts()
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
                $data_products[] = $product;
            }

            return $data_products;
        }

    return array();
}
function updateProduct($productId, $editedName, $editedPrice, $editedCategory, $editedStock, $editedOnline, $editedImage) {
    $query = "UPDATE product SET name = '$editedName', price = $editedPrice, category_id = $editedCategory, stock = $editedStock, is_online = $editedOnline, image = '$editedImage' WHERE id = {$productId}";

    $result = $this->connection->query($query);

    if ($result === false) {
        return false;
    }

    return true;
}
function addNewProduct($productName, $productPrice, $productCategory, $productStock, $productOnline, $productImage) {
    $query = "INSERT INTO product (name, price, category_id, stock, is_online, image) VALUES ('{$productName}', '{$productPrice}', '{$productCategory}', '{$productStock}', '{$productOnline}', '{$productImage}')";

    $result = $this->connection->query($query);

    if ($result === false) {
        return false;
    }

    return true;
}
        
function removeFromProduct($productId){
    $query= "DELETE FROM product WHERE id={$productId}";
    $result = $this->connection->query($query);

    if ($result === false) {
        return false;
    }

    return true;
} 
    }
