<?php
    // Start the session
    session_start();

    if(!isset($_SESSION['userName']) || (!isset($_SESSION['mail'])) ){
        header('Location: ./login.php');
    }


?>