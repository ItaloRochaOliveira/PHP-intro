<?php 
    if(!isset($_SESSION)){
        session_start();
    }

    // unset($_SESSION['user']);
    // var_dump($_SESSION);c

    session_destroy();

    // var_dump($_SESSION);

    header("Location:login.php")
?>