// Tyler Albers
// connection to  DB unit test

<?php
    
    session_start();
    include_once "dbh.inc.php";
    
    $test = false;
    
    if ($test == false){
        
        $serverName = "localhost";
        $dBUsername = "root";
        $dBPassword = "";
        $dBName = "skylight_db";
        
        $conn = mysqli_connect($serverName, $dBUsername, $dBPassword, $dBName);
        
        if(!$conn){
            die("Connection failed: " . mysqli_connect_error());
            $test == false;
        }
        
        $test == true;
    }
    
?>
