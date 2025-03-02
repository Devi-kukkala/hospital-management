<?php
// Start or resume the session
session_start();

// Unset all session variables
$_SESSION = array();

// Destroy the session on the server
session_destroy();

// Also, delete the session cookie from the client-side
if (ini_get("session.use_cookies")) {
    // Get current session cookie parameters
    $params = session_get_cookie_params();
    
    // Set the session cookie to expire in the past
    setcookie(session_name(), '', time() - 42000,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
    );
}

// Redirect to the login page or homepage
header("Location: ../login.html");
exit;
?>
