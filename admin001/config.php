<?php
// Database credentials
define('DB_HOST', 'localhost');        // Replace with your database host, usually 'localhost'
define('DB_USERNAME', 'root'); // Replace with your MySQL username
define('DB_PASSWORD', ''); // Replace with your MySQL password
define('DB_NAME', 'bronasir');     // Replace with your database name

// Create a connection
$conn = mysqli_connect(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);

// Check if the connection was successful
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
