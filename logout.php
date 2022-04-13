<?php 
     session_start();

    if(!isset($_SESSION['tracepack'])) {
        header('Location: login.php');
    }

    unset($_SESSION['tracepack']);
    header('Location: index.php');
?>