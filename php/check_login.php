<?php
session_start();
if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == true) {
    echo "Welcome to the member's area, " . htmlspecialchars($_SESSION['username']) . "!";
} else {
    echo "Please log in first to see this page.";
    header('Location: ../index.html');
}
?>