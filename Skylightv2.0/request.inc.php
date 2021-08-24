<?php
    // App Request Processing
    // Kamil Sacha
    // Last Update: April 26, 2021

    if(isset($_POST["submitRequest"])){
        $appName = $_POST["appName"];
        $creator = $_POST["developer"];
        $platforms = $_POST["platforms"];
        $version = $_POST["version"];
        $appleLink = $_POST["appleSite"];
        $googleLink = $_POST["googleSite"];
        $price = $_POST["price"];
        $genre = $_POST["genre"];
        $description = $_POST["appDescription"];

        require_once 'dbh.inc.php';
        require_once 'functions.inc.php';

        createAppRequest($conn, $appName, $creator, $platforms, $version, $appleLink, $googleLink, $price, $genre, $description);

    }else{
        header("location: applicationRequestForm.php");
        exit();
    }