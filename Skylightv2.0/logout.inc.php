<?php
// User Logout
// Kamil Sacha
// Last Update: April 25, 2021

// This page performs functions to log a user out of their account

session_start();
session_unset();
session_destroy();

header("location: index.php");
exit();