<?php
require_once("./assets/Config.php");
require_once("./assets/php/DbConnection.php");
require_once("./assets/php/services/UserService.php");
$smarty = new Config();
session_start();
$userService = new UserService();
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['usernameOrEmail'])) {
$usernameOrEmail = $_POST['usernameOrEmail'];
$email = $userService-> checkUsernameOrEmail($usernameOrEmail);
$password= $userService->saveResetToken($email);
$sand = $userService-> sendEmail($email, $password);
if ($sand) {
    header('Content-Type: application/json');
    $response = ['success' => true];
    echo json_encode($response);

    exit; 
} else {
    header('Content-Type: application/json');
    $response = ['success' => false, 'message' => 'Errore nella funzione'];
    echo json_encode($response);
    exit; 
}


}
try {

    $smarty->assign("current_view","forgotPassword.tpl");
    $smarty->display("index.tpl");
} catch (SmartyException $e) {
    $smarty->assign("content_load","404.tpl");
    $smarty->display("index.tpl");
}
?>