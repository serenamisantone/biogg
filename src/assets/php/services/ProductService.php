<?php

require_once("./assets/php/DbConnection.php");
require_once("./assets/php/models/Product.php");
require_once("./assets/php/models/Category.php");
require_once("./assets/php/models/Manufacturer.php");
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


    //metodi per i prodotti
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

    function getAllProducts()
    {

        $query = "SELECT id,name FROM product ORDER BY product.name ASC";

        $result = $this->connection->query($query);
        $data_products = array();

        if (($result) && ($result->num_rows > 0)) {
            while ($row = $result->fetch_assoc()) {
                $product = $this->getProductById($row["id"]);
                $data_products[] = $product;
            }

            return $data_products;
        }

        return array();
    }
    function searchProductsAdmin($searchQuery){
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
                    $product = $this->getProductByIdWithotOfferPrice($row["id"]);
    
                    if ($product->getIsOnline() == 1)
                        $all_products[] = $product;
                }
                return $all_products;
    
            }
            return null;
        }
    
    function getAllProductsWithoutPriceOffer($offset, $limit)
    {

        $query = "SELECT id,name FROM product ORDER BY product.name ASC LIMIT {$offset}, {$limit}";

        $result = $this->connection->query($query);
        $data_products = array();

        if (($result) && ($result->num_rows > 0)) {
            while ($row = $result->fetch_assoc()) {
                $product = $this->getProductByIdWithotOfferPrice($row["id"]);
                $data_products[] = $product;
            }

            return $data_products;
        }

        return array();
    }


    public function getProductById($productId)
    {
        $query = "SELECT * FROM product WHERE id = $productId ORDER BY product.name ASC";

        $result = $this->connection->query($query);
        if ($result && $result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $product = new Product();
            $product->setId($row['id']);
            $product->setName($row['name']);

            $product->setImage($row['image']);

            $product->setStock($row['stock']);
            $product->setIsOnline($row['is_online']);
            $product->setCategory($this->getCategoryById($row['category_id']));
            $product->setOffers($this->offerService->getOfferByProductId($productId));
            $finalPrice = $row['price'];
            $offers = $product->getOffers();
            if (!empty($offers)) {
                foreach ($offers as $offer) {
                    $finalPrice -= $finalPrice * $offer->getType() / 100;
                }
            }
            $finalPrice = number_format($finalPrice, 2, '.', '');
            $product->setPrice($finalPrice);

            return $product;

        }
        return null;
    }
    public function getProductByIdWithotOfferPrice($productId)
    {
        $query = "SELECT * FROM product WHERE id = $productId ORDER BY product.name ASC";

        $result = $this->connection->query($query);
        if ($result && $result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $product = new Product();
            $product->setId($row['id']);
            $product->setName($row['name']);
            $product->setDescription($row['description']);
            $product->setIngredients($row['ingredients']);
            $product->setImage($row['image']);

            $product->setStock($row['stock']);
            $product->setIsOnline($row['is_online']);
            $product->setCategory($this->getCategoryById($row['category_id']));
            $product->setManufacturer($this->getManufacturerById($row['manufacturer_id']));
            $product->setOffers($this->offerService->getOfferByProductId($productId));
            $product->setPrice($row['price']);

            return $product;

        }
        return null;
    }
    public function getProductsByCategory($categoryId)
    {
        $query = "SELECT id FROM product WHERE category_id = '{$categoryId}'";
        $result = $this->connection->query($query);
        $all_products = array();

        if (($result) && ($result->num_rows > 0)) {
            while ($row = $result->fetch_assoc()) {
                $product = $this->getProductById($row['id']);
                $all_products[] = $product;
            }
            return $all_products;
        }

        return null;
    }

    function addNewProduct($productName, $productPrice, $productCategory, $productStock, $productOnline, $productImage, $productDescription, $productIngredients, $productManufacturer)
    {
        $query = "INSERT INTO product (name, price, category_id, stock, is_online, image, description, ingredients, manufacturer_id) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $this->connection->prepare($query);
        $stmt->bind_param("sdiiisssi", $productName, $productPrice, $productCategory, $productStock, $productOnline, $productImage, $productDescription, $productIngredients, $productManufacturer);

        $result = $stmt->execute();

        if ($result === false) {
            return false;
        }

        return true;
    }


    function removeFromProduct($productId)
    {
        // Ottieni il nome dell'immagine dal database
        $imageQuery = "SELECT image FROM product WHERE id={$productId}";
        $imageResult = $this->connection->query($imageQuery);

        if ($imageResult === false) {
            // Gestisci l'errore se necessario
            return false;
        }

        $imageRow = $imageResult->fetch_assoc();
        $imageName = $imageRow['image'];

        // Specifica il percorso completo dell'immagine
        $imagePath = "assets/img/products/{$imageName}";

        // Elimina l'immagine dalla cartella
        if (file_exists($imagePath)) {
            unlink($imagePath);
        }
        // Elimina il record dal database
        $query = "DELETE FROM product WHERE id={$productId}";
        $result = $this->connection->query($query);

        if ($result === false) {
            // Gestisci l'errore se necessario
            return false;
        }

        return true;
    }


    

    public function getAllManufacturers()
    {

        $query = " SELECT * FROM manufacturer";
        $result = $this->connection->query($query);
        $manufacturers = array();
        if (($result) && ($result->num_rows > 0)) {
            while ($row = $result->fetch_assoc()) {
                $manufacturer = new Manufacturer();
                $manufacturer->setId($row['id']);
                $manufacturer->setName($row['name']);
                $manufacturers[] = $manufacturer;
            }
            return $manufacturers;
        }
        return array();

    }

    public function getManufacturerById($manufacturerId)
    {
        $query = "SELECT * FROM manufacturer WHERE id='{$manufacturerId}'";
        $result = $this->connection->query($query);
        if ($result && $result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $manufacturer = new Manufacturer();
            $manufacturer->setId($row['id']);
            $manufacturer->setName($row['name']);

            return $manufacturer;
        }
        return null;
    }





    //metodi per le categorie
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
            $id = ($row['id']);

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

    function removeFromCategory($categoryId)
    {
        $query = "DELETE FROM category WHERE id={$categoryId}";
        $result = $this->connection->query($query);

        if ($result === false) {
            // Gestisci l'errore se necessario
            return false;
        } else {

            return true;
        }
    }

    function addNewCategory($categoryName)
    {
        if (empty($categoryName)) {
            return false;
        } else {
            $query = "INSERT INTO category (name) VALUES (?)";
            $stmt = $this->connection->prepare($query);
            $stmt->bind_param("s", $categoryName);
            $result = $stmt->execute();
            $stmt->close();
            $result = $this->connection->query($query);

            if ($result === false) {
                // Gestisci l'errore se necessario
                return false;
            } else {

                return true;
            }
        }
    }

    function updateCategory($categoryId, $editedName)
    {
        $query = "UPDATE category SET name = ? WHERE id = ?";
        $stmt = $this->connection->prepare($query);
        $stmt->bind_param("si", $editedName, $categoryId);
        $result = $stmt->execute();
        $stmt->close();
        if ($result === false) {
            return false;
        } else{
        return true;
        }
    }






    //metodi per la ricerca dei prodotti
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
    function getImpagination($total_products)
    {

        $products_per_page = 9;
        $total_pages = ceil($total_products / $products_per_page);
        return $total_pages;

    }









    //metodi per la modifica dei prodotti

    function updateProduct($productId, $editedName, $editedDescription, $editedIngredients,$editedManufacturer, $editedPrice, $editedCategory, $editedStock, $editedOnline, $offerIds, $editedImage)
    {
        $imageQuery = "SELECT image FROM product WHERE id=$productId";
        $result = $this->connection->query($imageQuery);

        if ($result !== false && $result->num_rows > 0) {
            $imageRow = $result->fetch_assoc();
            $imageName = $imageRow['image'];

            // Se l'immagine è cambiata, elimina quella vecchia
            if ($imageName !== $editedImage) {
                $imagePath = "assets/img/products/{$imageName}";

                if (file_exists($imagePath)) {
                    unlink($imagePath);
                }
            }
        }
        $editedPrice = str_replace(',', '.', $editedPrice);
        $query = "UPDATE product SET name = ?, price = ?, category_id = ?, stock = ?, is_online = ?, image = ?, description = ?, ingredients = ?, manufacturer_id = ? WHERE id = ?";
        $stmt = $this->connection->prepare($query);
        $stmt->bind_param("sdiissssii", $editedName, $editedPrice, $editedCategory, $editedStock, $editedOnline, $editedImage, $editedDescription, $editedIngredients, $editedManufacturer, $productId);
        $result = $stmt->execute();
        $stmt->close();
        if ($result === false) {
            return false;
        } else {
            $this->offerService->deleteOfferToProduct($productId);
            $this->offerService->assignOfferToProduct($productId, $offerIds);
        }
        return true;
    }



    public function uploadImage($image)
    {

        // Verifica se è stata ricevuta un'immagine
        if ($image['error'] === UPLOAD_ERR_OK) {
            $uploadDir = "assets/img/products/";  // Cartella in cui vuoi salvare le immagini
            $fileName = $image['name'];
            $filePath = $uploadDir . $fileName;

            // Sposta il file nella cartella di destinazione
            if (move_uploaded_file($image['tmp_name'], $filePath)) {

                // Restituisci il nome dell'immagine come conferma
                return $fileName;
            } else {
                // Gestisci l'errore di spostamento del file
                throw new Exception('Errore durante il salvataggio dell\'immagine.');
            }
        } else {
            // Gestisci l'errore di caricamento dell'immagine
            throw new Exception('Nessuna immagine ricevuta o errore durante il caricamento.');
        }

    }

    public function getProductsWithOffers()
    {
        $query = 'SELECT p.*
        FROM product p
        JOIN product_offer po ON p.id = po.product_id
        JOIN offer o ON po.offer_id = o.id LIMIT 4;';
        $result = $this->connection->query($query);
        $all_products = array();
        if ($result && $result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $product = $this->getProductById($row["id"]);

                if ($product->getIsOnline() == 1)
                    $all_products[] = $product;
            }
        }
        return $all_products;
    }





    function removeFromManufacturer($manufacturerId)
    {
        $query = "DELETE FROM manufacturer WHERE id={$manufacturerId}";
        $result = $this->connection->query($query);

        if ($result === false) {
            // Gestisci l'errore se necessario
            return false;
        } else {

            return true;
        }
    }

    function addNewManufacturer($manufacturerName)
    {
        if (empty($manufacturerName)) {
            return false;
        } else {
            $query = "INSERT INTO manufacturer (name) VALUES (?)";
            $stmt = $this->connection->prepare($query);
            $stmt->bind_param("s", $manufacturerName);
            $result = $stmt->execute();
            $stmt->close();
            $result = $this->connection->query($query);

            if ($result === false) {
                // Gestisci l'errore se necessario
                return false;
            } else {

                return true;
            }
        }
    }

    function updateManufacturer($manufacturerId, $editedName)
    {
        $query = "UPDATE manufacturer SET name = ? WHERE id = ?";
        $stmt = $this->connection->prepare($query);
        $stmt->bind_param("si", $editedName, $manufacturerId);
        $result = $stmt->execute();
        $stmt->close();
        if ($result === false) {
            return false;
        } else{
        return true;
        }
    }



}



