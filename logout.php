<?php
session_start(); // 1. Start the session

// 2. Unset all session variables
$_SESSION = array();

// 3. Destroy the session (deletes the session file/data on the server)
session_destroy();

// 4. Destroy the session cookie (optional, but good practice for thoroughness)
// This will unset the session cookie.
// Note: This will destroy the session, and not just the session data!
// It's important to do this before redirecting.
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
    );
}

// 5. Redirect the user to the login page or a public page
header("Location: fit4login.php"); // Or 'index.php' or 'login.html'
exit();
?>