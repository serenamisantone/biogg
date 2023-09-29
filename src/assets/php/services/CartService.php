<?php
require_once("./assets/php/models/ShoppingCart.php");
require_once("./assets/php/services/UserService.php");
class CartService
{
    private $userService;
    private $connection;

    function __construct()
    {
        $this->connection = DbConnection::getInstance()->getConnection();
        $this->userService = new UserService();
    }

    public function createShoppingCart()
    {
        if (!isset($_SESSION['cart'])) {
            $_SESSION['cart'] = new ShoppingCart();
        } else {
            //creo un carrello
            $serializedData = serialize($_SESSION['cart']);
            $cart = unserialize($serializedData);
            //creo i shopping_cart_products
            $shopping_cart_products = [];
            foreach ($_SESSION['cart']->getProducts() as $cart_product) {

                $serializedData = serialize($cart_product);
                $shopping_cart_products[] = unserialize($serializedData);
                $serializedData = serialize($cart_product->getProduct());
                $product = unserialize($serializedData);
            }

            $userId = $_SESSION['auth']['user'];
            $cart->setUser($this->userService->getUserById($userId));
            $result = $this->connection->query("INSERT INTO shopping_cart(user_id, is_open) values ({$userId}, 1) ");
            if (!$result) {
                Header("Location: error.php?Shopping_cart_non_inserita");
            } else {
                $result = $this->connection->query("SELECT LAST_INSERT_ID() ");
                if ($result) {
                    $lastInsertId = $result->fetch_assoc(); // Recupera un array associativo
                    $shoppingCartId = $lastInsertId['LAST_INSERT_ID()'];
                    foreach ($shopping_cart_products as $cart_product) {
                        $this->connection->query("INSERT INTO `shopping_cart_product` (shopping_cart_id, product_id, added_quantity ,actual_price) values ({$shoppingCartId}, {$cart_product->getProduct()->getId()}, {$cart_product->getAddedQuantity()}, {$cart_product->getActualPrice()}) ");
                    }
                }
            }
        }

    }
    function addProduct(
        $cart_product)
    {
        if (isset($_SESSION['auth']['user'])) {
            if (isset($_SESSION['cart'])) {
                $userId = $_SESSION['auth']['user'];
                $shoppingCartId = $this->connection->query("SELECT id FROM shopping_cart WHERE user_id = '{$userId}'; ");
                $result = $this->connection->query("INSERT INTO shopping_cart_product(shopping_cart_product, product_id, added_quantity, actual_price) values ({$shoppingCartId}, {$cart_product->getProduct()->getId()},{$cart_product->getAddedQuantity()}, {$cart_product->getActualPrice()} ); ");
            } else {
                $this->createShoppingCart();
            }
        } else {
            if (isset($_SESSION['cart'])) {
                //chiama il metodo della classe ShoppingCart
                $_SESSION['cart']->addProduct($cart_product);
            } else {
                $this->createShoppingCart();
            }
        }
    }

    function removeProduct($productId)
    {
        $out = array();
        foreach ($_SESSION['cart']->getProducts() as $product) {
            if (!$product->getId() == $productId) {
                $out[] = $product;
            }
        }
        $_SESSION['cart']->setProducts($out);
    }


}