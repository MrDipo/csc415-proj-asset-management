<?php
require "db_connect.php";

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $email = $_POST['email'];
    $password = $_POST['password'];
    $email = mysqli_real_escape_string($conn, $email);
    $password = mysqli_real_escape_string($conn, $password);
    $query = "SELECT * FROM employee WHERE email='$email' AND password='$password'";
    $result = mysqli_query($conn, $query);
    mysqli_close($conn);

    if(mysqli_num_rows($result) == 1){
        echo 'You have successfully logged-in';
        session_start();
        $row = mysqli_fetch_assoc($result);
        $_SESSION['username'] = $row['name'];
        $_SESSION['logged_in'] = true;
        header('location: ../home.php');
        exit();
    } else {
        echo '<h2>Wrong username or password entered</h2>';
        exit();
    }
} else {
# header('location: ../index.html');
echo 'login failed';
exit();
}
?>