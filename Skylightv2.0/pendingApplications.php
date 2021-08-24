<?php
    // Pending Applications Page
    // Kamil Sacha
    // Last Update: April 27, 2021

    // This page displays pending application requests for the Admin that they can either approve or reject
    session_start();
    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';
    include_once 'header.php';

    $sql = "SELECT * FROM appRequests";
    $result = $conn -> query($sql);
    $row = $result->fetch_assoc();

    $rid = $row['requestId'];
    $name = $row['name'];
    $creator =  $row['creator'];
    $genre =  $row['genre'];
    $price =  $row['price'];
    $platforms = $row['platforms'];
    $version =  $row['version'];
    $description =  $row['description'];
    $appleLink =  $row['appleLink'];
    $googleLink =  $row['googleLink'];

    echo "  <p>Name: ".$name."</p>
            <p>Creator: ".$creator."</p>
            <p>Genre: ".$genre."</p>
            <p>Price: ".$price."</p>
            <p>Platforms: ".$platforms."</p>
            <p>Version: ".$version."</p>
            <p>Description: ".$description."</p>
            <p>Apple App Store Link: ".$appleLink."</p>
            <p>Google Play Store Link: ".$googleLink."</p>
    
            <form method=post action='approveRequest.inc.php'>
                <input type='hidden' name='appName' value=".$name."><br>
                <input type='hidden' name='developer' value=".$creator."><br>
                <input type='hidden' name='genre' value=".$genre."><br>
                <input type='hidden' name='price' value=".$price."><br>
                <input type='hidden' name='platforms' value=".$platforms."><br>
                <input type='hidden' name='version' value=".$version."><br>
                <input type='hidden' name='appDescription' value=".$description."><br>
                <input type='hidden' name='appleSite' value=".$appleLink."><br>
                <input type='hidden' name='googleSite' value=".$googleLink."><br>
                <input type='hidden' name='rid' value=".$rid."><br>
                <button type='submit' name='approve'>Approve</button>
            </form>
            <form method=post action='rejectRequest.inc.php'>
                <input type='hidden' name='rid' value=".$rid."><br>
                <button type='submit' name='reject'>Reject</button>
            </form>";