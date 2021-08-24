<?php
    // Reject App Request
    // Kamil Sacha
    // Last Update: April 27, 2021



    if(isset($_POST["reject"])){
        $rid = $_POST["rid"];

        require_once 'dbh.inc.php';
        require_once 'functions.inc.php';

        rejectAppRequest($conn, $rid);

    }else{
        "location: pendingApplications.php";
        exit();
    }