<?php
// Server connection
// Kamil Sacha
// Last Update: April 24, 2021

// Establishes a connection to the server and database

$serverName = "localhost";
$dBUsername = "root";
$dBPassword = "";
$dBName = "skylight_db";

$conn = mysqli_connect($serverName, $dBUsername, $dBPassword, $dBName);

if(!$conn){
    die("Connection failed: " . mysqli_connect_error());
}
