<?php
    // Edit Comment Page
    // Kamil Sacha
    // Last Update: April 30, 2021

    include_once 'header.php';
    include_once 'dbh.inc.php';
    include_once 'comments.inc.php';

    $cid = $_POST['cid'];
    $uid = $_POST['uid'];
    $date = $_POST['date'];
    $message = $_POST['message'];
    $commentsDb = $_POST['commentsDb'];
    $url = $_POST['url'];

    echo "<form method='POST' action='".editComments($conn)."'>
                <input type='hidden' name='cid' value='".$cid."'>
                <input type='hidden' name='uid' value='".$uid."'>
                <input type='hidden' name='date' value='".$date."'>
                <input type='hidden' name='commentsDb' value='".$commentsDb."'>
                <input type='hidden' name='url' value='".$url."'>
                <textarea name='message'>".$message."</textarea><br><br>
                <button name='commentSubmit' type='submit'>Edit</button>
            </form>";
