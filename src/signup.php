<?php
require_once("./assets/config.php");
require_once("./assets/php/DbConnection.php");
require_once("./assets/php/models/User.php");
require_once("./assets/php/services/UserService.php");
session_start();

$smarty = new Config();
$userService = new UserService();
if (isset($_GET['error'])) {
    echo '<div class="alert alert-danger" role="alert">' . htmlspecialchars($_GET['error']) . '</div>';
}
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = $_POST['password'];

   // $cart_product = new ShoppingCartProduct($productService->getProductById($productId), 1);
   $registrate=$userService->createAccount($name, $surname, $email, $username , $password);
   if($registrate){
    header("Location: login.php");
    exit();
   }else{
    $smarty->assign("error_message", $userService->getErrorMessage());
    $smarty->assign("current_view", "signup.tpl");
    $smarty->display("index.tpl");
    exit();
}

}
try {
    $smarty->assign("current_view","signup.tpl");
    $smarty->display("index.tpl");
} catch (SmartyException $e) {
    $smarty->assign("content_load","404.tpl");
    $smarty->display("index.tpl");
}
?>