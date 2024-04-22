<?php
session_start();

// Check if the admin session is set
if (isset($_SESSION['admin']) && $_SESSION['admin'] == true) {
    // Unset all of the session variables
    $_SESSION = array();

    // Destroy the session
    session_destroy();
// Поменять путь на главную, когда она наконец то уже появится
    header("Location:../pages/achives.php");
} else {
    // If the admin session is not set, redirect to the main page or perform any other action
    header("Location: index.php");
    exit;
}
?>