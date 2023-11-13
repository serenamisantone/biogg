<?php
require_once("./assets/php/models/User.php");
require_once("./assets/php/models/ShoppingCart.php");
require_once("./assets/php/models/Product.php");
require_once("./assets/php/services/ProductService.php");

class CartService
{

    private $connection;
    private $productService;
    function __construct()
    {
        $this->connection = DbConnection::getInstance()->getConnection();
        $this->productService = new ProductService();
    }

    public function createShoppingCart()
    {
        //creo un carrello per utenti non autenticati
        if (!isset($_SESSION['cart'])) {
            $_SESSION['cart'] = new ShoppingCart();
        } else {
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
        if ($shoppingCartId == null) {
            Header("Location: error.php?id_null");
        }

        if (isset($_SESSION['cart'])) {
            //cartProducts sarà un array di id e quantità
            $_SESSION['auth']['cart'] = $_SESSION['cart'];
            $cartProducts = $_SESSION['cart']->getProducts();

            foreach ($cartProducts as $productId => $quantity) {
                $result = $this->connection->query("INSERT INTO `shopping_cart_product` (shopping_cart_id, product_id, added_quantity) 
                                            values ({$shoppingCartId}, {$productId}, {$quantity});");
                if (!$result) {
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
        if (isset($_SESSION['auth'])) {

            $cartId = $_SESSION['auth']['cart']->getShoppingCartId();
            $query='';
          
            //se il prodotto è gia nel carrello incremento la quantità
            $query="UPDATE shopping_cart_product SET added_quantity = added_quantity + $quantity WHERE product_id = {$productId} and shopping_cart_id= {$cartId}";
           
           $result = $this->connection->query($query);
            if ($result && $this->connection->affected_rows > 0) {
                // Il prodotto era già nel carrello e l'aggiornamento ha avuto successo
                
            } else {
                // Il prodotto non era nel carrello, inseriscilo nel carrello
                $insertQuery = "INSERT INTO shopping_cart_product (shopping_cart_id, product_id, added_quantity) 
                    VALUES ('{$cartId}', '{$productId}', '{$quantity}'); ";
                $insertResult = $this->connection->query($insertQuery);

                if ($insertResult) {
                    return true;// Il prodotto è stato inserito con successo nel carrello
                } else {
                    return false;// Gestisci l'errore nell'inserimento del prodotto
                }
            }
            
        } else {
            $_SESSION['cart']->addProduct($productId, $quantity);
            return true;
        }
       
    }
    function assignShoppingCart($userId)
    {
        //cerco il carrello dell'utente nel database
        $result = $this->connection->query("SELECT id from shopping_cart where shopping_cart.user_id = '{$userId}' AND shopping_cart.is_open= 1 ;");
        if ($result === false) {
            // Errore nella query
            Header("Location: error.php?errore_nella_query1");
            exit;
        } else {
            //carrello trovato
            //$result->num_rows non dovrebbe essere uguale a 0 perchè creo il carrello al momento della registrazione
            if ($result->num_rows == 1) {
                $data = $result->fetch_assoc();
                $cart = new ShoppingCart();
                $cart->setIsOpen(true);
                //$cart->setUser($user);
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
                        return $cart;
                    }
                    //se il carrello nel database è vuoto vado a riprendere i prodotti in session(cart)
                    if ($productsQuery->num_rows == 0) {
                        $this->createShoppingCartProducts($cart->getShoppingCartId());
                    }

                }
                return $cart;
            } else {
                //non ho trovato il carrello
                Header("Location: error.php?qualcosa_e_andato_storto");
                exit;
            }
        }
    }

    function removeFromCart($productId)
    {
        if (isset($_SESSION['auth'])) {

         
            $userId = $_SESSION['auth']['user'];
            $userId = $this->connection->real_escape_string($userId);
            $productId = $this->connection->real_escape_string($productId);

            $query = "DELETE shopping_cart_product FROM shopping_cart_product        
          INNER JOIN shopping_cart ON shopping_cart_product.shopping_cart_id = shopping_cart.id
          WHERE shopping_cart.user_id = '{$userId}' AND shopping_cart_product.product_id = '{$productId}' AND shopping_cart.is_open = 1";

            $result = $this->connection->query($query);

            return $result;


        } else {

            $result = $_SESSION['cart']->removeProduct($productId);
            return $result;
        }
    }

    public function getCartProducts()
    { $products = array();
        if (isset($_SESSION['auth'])) {
            $cartId = $_SESSION['auth']['cart']->getShoppingCartId();
         
            $result = $this->connection->query("SELECT * FROM shopping_cart_product where shopping_cart_product.shopping_cart_id='{$cartId}'");
            if (!$result) {
                Header("Location: error.php?qualcosa_e_andato_storto");
            }
            $products = array();
            if ($result->num_rows > 0) {
                
                while ($cartProduct = $result->fetch_assoc()) {
                   
                    $product = $this->productService->getProductById($cartProduct['product_id']);
                    $productWithQuantity = array(
                        'product' => $product,
                        'quantity' => $cartProduct['added_quantity']
                    );
                    // Aggiungiamo questo array all'array principale
                    $products[] = $productWithQuantity;
                }
            }
        } else {
            $cart = $_SESSION['cart'];
            
            $cartProducts = $cart->getProducts();
            foreach ($cartProducts as $productId => $quantity) {
                $product = $this->productService->getProductById($productId);
                $productWithQuantity = array(
                    'product' => $product,
                    'quantity' => $quantity
                );
                // Aggiungiamo questo array all'array principale
                $products[] = $productWithQuantity;
            }

        }
      
        return $products;

    }

    public function getTotalPrice()
    {
        $totalPrice = 0;
        if (isset($_SESSION['auth']['cart'])) {

            $cartProducts = $this->getCartProducts();
            foreach ($cartProducts as $productData) {
                $product = $productData['product'];
                $quantity = $productData['quantity'];
                $totalPrice += $product->getPrice() * $quantity;
            }
        } else {
            $cart = $_SESSION['cart'];
            $cartProducts = $cart->getProducts();
            foreach ($cartProducts as $productId => $quantity) {
                $product = $this->productService->getProductById($productId);

                $totalPrice = $totalPrice + $product->getPrice() * $quantity;

            }


        }

        return $totalPrice;

    }

    public function getPrice($productId){
        $product = $this->productService->getProductById($productId);
        if(isset($_SESSION['auth'])){ 
        $cartId = $_SESSION['auth']['cart']->getShoppingCartId();
        $result = $this->connection->query("SELECT added_quantity FROM shopping_cart_product where shopping_cart_product.shopping_cart_id='{$cartId}' and shopping_cart_product.product_id='{$productId}'");
        if(!$result){
            Header("Location: error.php?qualcosa_e_andato_storto");
        }
        if($result->num_rows>0){
            $data=$result->fetch_assoc();
            $price= $product->getPrice()*$data['added_quantity'];
        }
        
        }else{

            $quantity = $_SESSION['cart']->getProducts()[$productId];
            $price= $product->getPrice()*$quantity;
        }
        return $price;
    }
}