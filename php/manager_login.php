<?php
session_start();
require "db_connect.php";

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $email = $_POST['email'];
    $password = $_POST['password'];
    $email = mysqli_real_escape_string($conn, $email);
    $password = mysqli_real_escape_string($conn, $password);
    $query = "SELECT * FROM employee WHERE email = ? AND password = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ss", $email, $password);
    $stmt->execute();
    $result = $stmt->get_result();

    if(mysqli_num_rows($result) === 1){
        $data = mysqli_fetch_assoc($result);
        $_SESSION['data'] = $data;
        $_SESSION['logged_in'] = true;
        header('location: ../pages/manager.php');
        exit();
    } else {
        header('location: /index.html');
        // login_alert("Wrong username or password inputted");
        exit();
    }
}
function login_alert($msg) {
    echo "<script type='text/javascript'>alert('$msg');</script>";
}
?>