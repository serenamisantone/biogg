<?php

    session_start();

    unset($_SESSION['auth']);
    unset($_SESSION['cart']);
    Header("Location: index.php");

?>