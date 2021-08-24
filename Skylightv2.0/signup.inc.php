<?php
    // Registration/Sign Up Checks
    // Kamil Sacha
    // Last Update: April 25, 2021

    if(isset($_POST["submit"])){

        $email = $_POST["email"];
        $username = $_POST["uid"];
        $pwd = $_POST["pwd"];
        $pwdRepeat = $_POST["pwdrepeat"];

        require_once 'dbh.inc.php';
        require_once 'functions.inc.php';

        if(emptyInputSignup($email, $username, $pwd, $pwdRepeat) !== false){
            header("location: registration.php?error=emptyinput");
            exit();
        }

        if(invalidUid($username) !== false){
            header("location: registration.php?error=invaliduid");
            exit();
        }

        if(invalidEmail($email) !== false){
            header("location: registration.php?error=invalidemail");
            exit();
        }

        if(pwdMatch($pwd, $pwdRepeat) !== false){
            header("location: registration.php?error=passwordsdontmatch");
            exit();
        }

        if(uidExists($conn, $username, $email) !== false){
            header("location: registration.php?error=usernametaken");
            exit();
        }

        createUser($conn, $email, $username, $pwd);

    }else{
        header("location: registration.php");
        exit();
    }