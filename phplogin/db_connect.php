<?php
$host = 'localhost';
$username = 'root';
$password = '';
$db = 'csc_415_proj';

$conn = mysqli_connect($host, $username, $password, $db);
if (!$conn) {
    die('Connection failed: ' . mysqli_connect_error());
}
?>