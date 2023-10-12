<?php

    session_start();

    unset($_SESSION['auth']);
    unset($_SESSION['wishlist']);
    unset($_SESSION['cart']);
    Header("Location: index.php");

?>