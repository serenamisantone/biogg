<?php

require_once("./assets/Config.php");
require_once("./assets/php/DbConnection.php");
require_once("./assets/php/services/UserService.php");

session_start();
$smarty = new Config();
$loginService = new UserService();


if (isset($_POST['submit'])) {
    
    $isLogged = $loginService->check($_POST['username'], $_POST['password']);

    if ($isLogged) {
        if (isset($_SESSION['wishlist'])) {
            // Assegna la wishlist dalla sessione all'utente
            $wishlistService->assignWishlist();
        }
        // Reindirizza l'utente solo se l'autenticazione ha successo
        header("Location: myAccount.php");
        exit();
        
    } else {
        // In caso di autenticazione non riuscita, mostra un errore o reindirizza altrove
        $smarty->assign("current_view", "404.tpl");
        $smarty->display("index.tpl");
        exit();
    }

    }
    try {
        $smarty->assign("current_view","login.tpl");
        $smarty->display("index.tpl");
    } catch (SmartyException $e) {
        $smarty->assign("content_load","404.tpl");
        $smarty->display("index.tpl");
    }
