<?php
session_start();
if(isset($_SESSION['user'])){
    unset($_SESSION['user']);

    header("Location: index.php");
}

if(isset($_SESSION['service_provider'])){
    unset($_SESSION['service_provider']);

    header("Location: index.php");
}


?>