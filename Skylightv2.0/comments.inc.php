<?php
// Comment Section Functions
// Kamil Sacha
// Last Update: April 30, 2021

// This file helps present the comment sections on each app page

"<link rel='stylesheet' href='style.css' type='text/css'>";
include_once 'header.php';


function setComments($conn, $commentDb){
    if(isset($_POST['commentSubmit'])){
        $uid = $_POST['uid'];
        $date = $_POST['date'];
        $message = $_POST['message'];

        $sql = "INSERT INTO $commentDb (uid, date, message) VALUES ('$uid', '$date', '$message');";
        $result = $conn -> query($sql);
    }
}

function getComments($conn, $commentDb){
    $sql = "SELECT * FROM $commentDb;";
    $result = $conn -> query($sql);

    
    $sql3 = "SELECT * FROM users WHERE isAdmin=1;";
    $result3 = $conn -> query($sql3);

    while($row3 = $result3->fetch_assoc()){
        if($_SESSION['useruid'] == $row3['userUid']){
            while($row = $result->fetch_assoc()){
                $id = $row['uid'];
                $sql2 = "SELECT * FROM users WHERE userId = '$id';";
                $result2 = $conn -> query($sql2);
        
                if($row2 = $result2->fetch_assoc()){
                    echo "<div class='comment-box'><p>";
                    echo $row2['userUid']."<br>";
                    echo $row['date'] . "<br><br>";
                    echo nl2br($row['message']);
                    echo "</p>";
                        if($_SESSION['useruid']){
                            echo"<form class='delete-form' method='POST' action='".deleteComments($conn, $commentDb)."'>
                                    <input type='hidden' name='cid' value='".$row['cid']."'>
                                    <button type='submit' name='commentDelete'>Delete</button>
                                </form>
                                <form class='edit-form' method='POST' action='editcomment.php'>
                                     <input type='hidden' name='cid' value='".$row['cid']."'>
                                     <input type='hidden' name='uid' value='".$row['uid']."'>
                                     <input type='hidden' name='date' value='".$row['date']."'>
                                     <input type='hidden' name='message' value='".$row['message']."'>
                                     <input type='hidden' name='commentsDb' value='".$commentDb."'>
                                     <input type='hidden' name='url' value='".$_SERVER['REQUEST_URI']."'>
                                    <button>Edit</button>
                                 </form>";
                        }
                    }
                    echo "</div>";           
                }
        }else{
            while($row = $result->fetch_assoc()){
                $id = $row['uid'];
                $sql2 = "SELECT * FROM users WHERE userId = '$id';";
                $result2 = $conn -> query($sql2);
        
                if($row2 = $result2->fetch_assoc()){
                    echo "<div class='comment-box'><p>";
                    echo "<b>"; 
                    echo $row2['userUid']."</b><br>";
                    echo $row['date'] . "<br><br>";
                    echo nl2br($row['message']);
                    echo "</p>";
                        if($_SESSION['useruid'] == $row2['userUid']){
                            echo"<form class='delete-form' method='POST' action='".deleteComments($conn, $commentDb)."'>
                                    <input type='hidden' name='cid' value='".$row['cid']."'>
                                    <button type='submit' name='commentDelete'>Delete</button>
                                </form>
                                <form class='edit-form' method='POST' action='editcomment.php'>
                                     <input type='hidden' name='cid' value='".$row['cid']."'>
                                     <input type='hidden' name='uid' value='".$row['uid']."'>
                                     <input type='hidden' name='date' value='".$row['date']."'>
                                     <input type='hidden' name='message' value='".$row['message']."'>
                                     <input type='hidden' name='commentsDb' value='".$commentDb."'>
                                     <input type='hidden' name='url' value='".$_SERVER['REQUEST_URI']."'>
                                    <button>Edit</button>
                                 </form>";
                        }
                    }
                    echo "</div>";           
                }
        }
    }
}

function editComments($conn){
    if(isset($_POST['commentSubmit'])){
        $cid = $_POST['cid'];
        $uid = $_POST['uid'];
        $date = $_POST['date'];
        $message = $_POST['message'];
        $commentDb = $_POST['commentsDb'];
        $url = $_POST['url'];
        $fullURL = $_SERVER['HTTP_HOST'].$url;

        $sql = "UPDATE $commentDb SET message='$message' WHERE cid='$cid'";
        $result = $conn -> query($sql);

        header('Location:' .$url);
    }
}

function deleteComments($conn, $commentDb){

    if(isset($_POST['commentDelete'])){
        $cid = $_POST['cid'];

        $sql = "DELETE FROM $commentDb WHERE cid='$cid'";
        $result = $conn -> query($sql);

        header('Location:' .$url);
    }
}