<?php
session_start();
if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == true) {
} else {
    echo "Please log in first to see this page.";
    header('Location: ../index.html');
}
?>