<?php
// Start the session to access session variables
session_start();

// Destroy all session data
session_destroy();

// Redirect the user to the login page
header("Location: login.php");

// Terminate the script to ensure the redirect happens immediately
exit;
?>
