<?php
// This is your logout.php file
// Include session destroy code here (same code as above)
session_start();

$_SESSION = array();

if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000, 
        $params["path"], 
        $params["domain"], 
        $params["secure"], 
        $params["httponly"]
    );
}

session_destroy();

// Redirect to login page or any other page
header("Location: form.php");
exit;
?>
