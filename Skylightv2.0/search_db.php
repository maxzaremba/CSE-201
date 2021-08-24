<?php
require_once "dbh.inc.php";

    if (isset($_GET['term'])) {

        $query = "SELECT `name` FROM `apps` WHERE `name` LIKE '{$_GET['term']}%' LIMIT 25";
        $result = mysqli_query($conn, $query);

        if(mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_array($result)) {
                        $res[] = $row['name'];
                }
        } else {
                $res = array();
        }
        echo json_encode($res);
    }
?>
