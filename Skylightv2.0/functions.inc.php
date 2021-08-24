<?php
    // Skylight Website Functions
    // Kamil Sacha
    // Last Update: April 25, 2021

    // Functions executed by Skylight


// This function checks to see if there are any empty fields when a user is creating an account
function emptyInputSignup($email, $username, $pwd, $pwdRepeat){
    $result;
    if(empty($email) || empty($username) || empty($pwd) || empty($pwdRepeat)){
        $result = true;
    }else{
        $result = false;
    }
    return $result;
}

// This function checks to see if there are any invalid characters in a username
function invalidUid($username){
    $result;

    if(!preg_match("/^[a-zA-Z0-9]*$/", $username)){
        $result = true;
    }else{
        $result = false;
    }

    return $result;
}

// This function uses a built in php method to verify email addresses
function invalidEmail($email){
    $result;

    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $result = true;
    }else{
        $result = false;
    }
    return $result;
}

// This function checks to see the user has entered the same password twice when registering
function pwdMatch($pwd, $pwdRepeat){
    $result;

    if($pwd !== $pwdRepeat){
        $result = true;
    }else{
        $result = false;
    }
    return $result;
}

// This function checks to see whether there is already an account with Skylight with the same username or email
function uidExists($conn, $username, $email){
    $sql = "SELECT * FROM users WHERE userUid = ? OR userEmail = ?;";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)){
        header("location: registration.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "ss", $username, $email);
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);

    if($row = mysqli_fetch_assoc($resultData)){
        return $row;
    }else{
        $result = false;
        return $result;
    }

    mysqli_stmt_close($stmt);
}

// This function takes the fields filled out by a user and sends them to the user database creating a user
function createUser($conn, $email, $username, $pwd){
    $sql = "INSERT INTO users (userEmail, userUid, userPwd, isAdmin) VALUES(?, ?, ?, ?);";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)){
        header("location: registration.php?error=stmtfailed");
        exit();
    }

    $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);
    $false = 0;

    mysqli_stmt_bind_param($stmt, "ssss", $email, $username, $hashedPwd, $false);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("location: registration.php?error=none");
    exit();
}

// This function populates the appRequest table when a user submits a request for an app to be part of Skylight
function createAppRequest($conn, $appName, $creator, $platforms, $version, $appleLink, $googleLink, $price, $genre, $description){
    $sql = "INSERT INTO appRequests (name, creator, platforms, version, appleLink, googleLink, price, genre, description) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?);";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)){
        header("location: applicationRequestForm.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "sssssssss", $appName, $creator, $platforms, $version, $appleLink, $googleLink, $price, $genre, $description);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("location: applicationRequestForm.php?error=none");
    exit();
}

// This function occurs when an admin has approved an app request. It will insert the app request into the apps database and remove the app request from the appRequest table
// ERROR with this Function
function approveAppRequest($conn, $appName, $creator, $platforms, $version, $appleLink, $googleLink, $price, $genre, $description, $rid){
    $sql = "INSERT INTO apps (name, creator, platforms, version, appleLink, googleLink, price, genre, description) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?);";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)){
        header("location: pendingApplications.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "sssssssss", $appName, $creator, $platforms, $version, $appleLink, $googleLink, $price, $genre, $description);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    $sql1 = "DELETE FROM `appRequests` WHERE `appRequests`.`requestId` = $rid";
    $stmt1 = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt1, $sql1)){
        header("location: pendingApplications.php?error=WillNotDelete");
        exit();
    }

    mysqli_stmt_execute($stmt1);
    mysqli_stmt_close($stmt1);
    header("location: pendingApplications.php?error=none");
    exit();
}

// This function occurs when an admin has rejected an app request. It will delete the app request from the app request from the appRequest table
function rejectAppRequest($conn, $rid){
    $sql1 = "DELETE FROM `appRequests` WHERE `appRequests`.`requestId` = $rid";
    $stmt1 = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt1, $sql1)){
        header("location: pendingApplications.php?error=WillNotDelete");
        exit();
    }

    mysqli_stmt_execute($stmt1);
    mysqli_stmt_close($stmt1);
    header("location: pendingApplications.php?error=none");
    exit();
}

// This function checks for empty fields when a user is trying to log in
function emptyInputLogin($username, $pwd){
    $result;
    if(empty($username) || empty($pwd)){
        $result = true;
    }else{
        $result = false;
    }
    return $result;
}

// This function checks for an incorrect username or password when the user logs in
function loginUser($conn, $username, $pwd){
    $uidExists = uidExists($conn, $username, $username);

    if($uidExists === false){
        header("location: signIn.php?error=incorrectUsernameEmail");
        exit();
    }

    $pwdHashed = $uidExists["userPwd"];
    $checkPwd = password_verify($pwd, $pwdHashed);

    if($checkPwd === false){
        header("location: signIn.php?error=incorrectPassword");
        exit();
    }else if($checkPwd === true){
        session_start();
        $_SESSION["userid"] = $uidExists["userId"];
        $_SESSION["useruid"] = $uidExists["userUid"];
        header("location: index.php");
        exit();
    }
}