<?php
// Log In/ Sign In Functions
// Kamil Sacha
// Last Update: April 25, 2021

// Executes the functions for verifying user log in

if(isset($_POST["submit"])){

    $username = $_POST["uid"];
    $pwd = $_POST["pwd"];

    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';

    if(emptyInputLogin($username, $pwd) !== false){
        header("location: signIn.php?error=emptyinput");
        exit();
    }

    loginUser($conn, $username, $pwd);
}else{
    header("location: signIn.php");
    exit();
}