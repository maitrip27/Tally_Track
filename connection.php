<?php

$databaseHost = 'localhost';
$databaseName = 'crud_with_login'; // Make sure this matches your XAMPP database name
$databaseUsername = 'root'; // Default XAMPP username
$databasePassword = ''; // Default XAMPP password is empty

$mysqli = mysqli_connect($databaseHost, $databaseUsername, $databasePassword, $databaseName);

if (!$mysqli) {
    die("Connection failed: " . mysqli_connect_error());
}

?>