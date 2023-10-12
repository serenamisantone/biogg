<?php
require_once("./assets/php/models/User.php");
require_once("./assets/php/models/ShoppingCart.php");

class CartService
{

    private $connection;

    function __construct()
    {
        $this->connection = DbConnection::getInstance()->getConnection();
        //$this->userService = new UserService();
    }

    public function createShoppingCart()
    {
        //creo un carrello per utenti non autenticati
        if (!isset($_SESSION['cart'])) {
            $_SESSION['cart'] = new ShoppingCart();
        }else{
        //creo un carrello nel database per utenti autenticati
      /*  if (isset($_SESSION['auth'])) {


            $userId = $_SESSION['auth']['user'];
            $result = $this->connection->query("INSERT INTO shopping_cart(user_id, is_open) values ({$userId}, 1) ");
            if (!$result) {
                Header("Location: error.php?Shopping_cart_non_inserita");
            } else {
                $result = $this->connection->query("SELECT LAST_INSERT_ID() ");
                if ($result) {
                    $lastInsertId = $result->fetch_assoc(); // Recupera un array associativo
                    $shoppingCartId = $lastInsertId['LAST_INSERT_ID()'];
                    $this->createShoppingCartProducts($shoppingCartId);
                    $cartProducts = $_SESSION['cart']->getProducts();
                    foreach ($cartProducts as $productId => $quantity) {
                        $this->connection->query("INSERT INTO `shopping_cart_product` (shopping_cart_id, product_id, added_quantity) values ({$shoppingCartId}, {$productId}, {$quantity});");
                    }
                }
            }
        }*/
    }
    }
    public function createShoppingCartProducts($shoppingCartId)
    {
        if($shoppingCartId==null){
            Header("Location: error.php?id_null");
        }
        
        if (isset($_SESSION['cart'])) {
            //cartProducts sarà un array di id e quantità
            $_SESSION['auth']['cart']=$_SESSION['cart'];
            $cartProducts = $_SESSION['cart']->getProducts();
            
            foreach ($cartProducts as $productId => $quantity) {
               $result = $this->connection->query("INSERT INTO `shopping_cart_product` (shopping_cart_id, product_id, added_quantity) 
                                            values ({$shoppingCartId}, {$productId}, {$quantity});");
                                            if(!$result){
                                                Header("Location: error.php?prodotti_non_inseriti");
                                            }
            }
        } else {
            Header("Location: error.php?prodotti_non_inseriti");
        }

    }
    function addProduct($productId, $quantity)
    {
        //se ho effettuato l'accesso
        if (isset($_SESSION['auth']['user'])) {
            //controllo se ho un carrello

            $userId = $_SESSION['auth']['user'];
            $result = $this->connection->query("SELECT id FROM shopping_cart WHERE user_id = '{$userId}'; ");
            if (!$result) {
                Header("Location: error.php?errore_query_5");
            }
            if ($result->num_rows === 0) {
                //non ho un carrello nel database 
                Header("Location: error.php?carrello_non_trovato");

            } else {
                $data = $result->fetch_assoc();
                $result=$this->connection->query("SELECT added_quantity FROM shopping_cart_product 
                                                where shopping_cart_product.shopping_cart_id='{$data['id']}'
                                                 and shopping_cart_product.product_id='{$productId}'");
                //se il prodotto è gia nel carrello incremento la quantità
                if ($result && $result->num_rows == 1) {
                    $row = $result->fetch_assoc();
                    $updatedQuantity = $quantity + $row['added_quantity'];
                    $update = $this->connection->query("UPDATE shopping_cart_product
                                                         SET added_quantity = '{$updatedQuantity}'  
                                                        where shopping_cart_product.shopping_cart_id='{$data['id']}'
                                                        and shopping_cart_product.product_id='{$productId}';");
                    if (!$update) {
                        Header("Location: error.php?update_non_effettuato");
                    }
                    
                }
                if ($result && $result->num_rows == 0) {
                    $result = $this->connection->query("INSERT INTO shopping_cart_product (shopping_cart_id, product_id, added_quantity) 
                    VALUES ('{$data['id']}', '{$productId}', '{$quantity}'); ");
                
                                            if(!$result){
                                                Header("Location: error.php?insert_non_effettuato");
                                            }
                }
                 $_SESSION['auth']['cart']->addProduct($productId, $quantity);
            }
           
        } else {
            $_SESSION['cart']->addProduct($productId, $quantity);
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

    function assignShoppingCart($user)
    {
        //cerco il carrello dell'utente nel database
        $result = $this->connection->query("SELECT id from shopping_cart where shopping_cart.user_id = '{$user->getUserId()}' AND shopping_cart.is_open= 1 ;");
        if ($result === false) {
            // Errore nella query
            Header("Location: error.php?errore_nella_query1");
            exit;
        } else {
            //$result->num_rows non dovrebbe essere uguale a 0 perchè creo il carrello al momento della registrazione
            if ($result->num_rows == 1) {
                $data = $result->fetch_assoc();
                $cart = new ShoppingCart();
                $cart->setIsOpen(true);
                $cart->setUser($user);
                $cart->setShoppingCartId($data['id']);
                
                //query per trovare i prodotti nel carrello
                $productsQuery = $this->connection->query("SELECT * from shopping_cart_product where shopping_cart_product.shopping_cart_id = '{$cart->getShoppingCartId()}'; ");
                if ($productsQuery == false) {
                    Header("Location: error.php?errore_query_prodotti");
                    exit;
                } else {
                    if ($productsQuery->num_rows > 0) {
                        //se ho prodotti nel carrello nel database
                        while ($product = $productsQuery->fetch_assoc()) {
                            $cart->addProduct($product['product_id'], $product['added_quantity']);
                        }
                        $_SESSION['auth']['cart'] = $cart;
                    }
                    //se il carrello nel database è vuoto
                    if ($productsQuery->num_rows == 0) {
                        $this->createShoppingCartProducts($cart->getShoppingCartId());
                    }
                }
                //assegna prodotti al carrello
                
            } else {
                //non ho trovato il carrello
                Header("Location: error.php?qualcosa_e_andato_storto");
            }
        }



    }

    function removeFromCart($productId,$shoppingCartId) {
        if(isset($_SESSION['auth'])){
            unset($_SESSION['auth']['cart']->getProducts()[$productId]);
            $result  = $this->connection->query("DELETE FROM shopping_cart_product where shopping_cart_id='{$shoppingCartId}'and product_id='{$productId}'");
            
            if(!$result){
                Header("Location: error.php?errore_nella_rimozione");
            }
        }else{

        }
    }



}