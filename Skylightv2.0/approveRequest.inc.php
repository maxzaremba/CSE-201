<?php
    // Approve App Request
    // Kamil Sacha
    // Last Update: April 27, 2021



    if(isset($_POST["approve"])){
        $appName = $_POST["appName"];
        $creator = $_POST["developer"];
        $platforms = $_POST["platforms"];
        $version = $_POST["version"];
        $appleLink = $_POST["appleSite"];
        $googleLink = $_POST["googleSite"];
        $price = $_POST["price"];
        $genre = $_POST["genre"];
        $description = $_POST["appDescription"];
        $rid = $_POST["rid"];

        require_once 'dbh.inc.php';
        require_once 'functions.inc.php';

        approveAppRequest($conn, $appName, $creator, $platforms, $version, $appleLink, $googleLink, $price, $genre, $description, $rid);

    }else{
        "location: pendingApplications.php";
        exit();
    }