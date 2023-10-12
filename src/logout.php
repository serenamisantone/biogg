<?php

    session_start();

    unset($_SESSION['auth']);
    unset($_SESSION['wishlist']);
    Header("Location: index.php");

?>