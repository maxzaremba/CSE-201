// Tyler Albers
// connection to add DB unit test

<?php
    
    session_start();
    include_once "appPage.php";
    
    $test = false;
    
    if ($test == false){
        
        $conn = mysqli_connect('localhost', 'root', "", 'skylight_db');
        
        if(!$conn){
            die("Connection failed: " . mysqli_connect_error());
            $test == false;
        }
        
        $test == true;
    }
    
?>
