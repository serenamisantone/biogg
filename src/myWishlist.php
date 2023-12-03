<?php
require_once("./assets/Config.php");
require_once("./assets/php/DbConnection.php");
require_once("./assets/php/services/WishlistService.php");
require_once("./assets/php/services/CartService.php");
session_start();
$smarty = new Config();
$wishlistService = new WishlistService();
$cartService = new CartService();
$smarty->assignCartVariables($smarty, $cartService);
try {

        // Se è stata inviata una richiesta POST con un product_id, esegui la rimozione dalla wishlist
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['wishlist_product_id'])) {
            $productId = $_POST['wishlist_product_id'];
            $removeToWishlist = $wishlistService->removeToWishlist($productId);

            if ($removeToWishlist) {
                // Rimozione riuscita, ritorna una risposta JSON di successo
                header('Content-Type: application/json');
                $response = ['success' => true, 'iconClass' => 'far fa-heart'];
                echo json_encode($response);

                exit; // Termina lo script dopo l'invio della risposta JSON
            } else {
                // Gestisci l'errore di rimozione
                header('Content-Type: application/json');
                $response = ['success' => false, 'message' => 'Errore nella rimozione dalla wishlist'];
                echo json_encode($response);
                exit; // Termina lo script dopo l'invio della risposta JSON
            }

        // Dopo la gestione della rimozione, ottieni i prodotti aggiornati nella wishlist
        $smarty->assign("wishlistItems", $wishlistService->getUserWishlist());
        $smarty->assign("current_view", "wishlist.tpl");
        $smarty->display("index.tpl");
    } else{
        $smarty->assign("wishlistItems", $wishlistService->getUserWishlist());
        $smarty->assign("current_view", "wishlist.tpl");
        $smarty->display("index.tpl");


    }

    
} catch (Exception $e) {
    $smarty->assign("current_view", "404.tpl");
    $smarty->display("index.tpl");
}

?>