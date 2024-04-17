<?php
session_start();

if (isset($_SESSION["customer_forename"])) {
    // Clear the session
    $_SESSION = array();
    session_destroy();

    // Capture the redirect URL or default to index.php
    $redirectUrl = $_GET['redirectUrl'] ?? 'index.php';

    // Redirect to the captured URL
    header("Location: $redirectUrl");
    exit();
} else {
    // If not logged in, just redirect to index.php
    header("Location: index.php");
    exit();
}
?>
