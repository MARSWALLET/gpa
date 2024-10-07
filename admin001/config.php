<?php
// Database credentials
define('DB_HOST', 'sql12.freemysqlhosting.net');        // Replace with your database host, usually 'localhost'
define('DB_USERNAME', 'sql12736087'); // Replace with your MySQL username
define('DB_PASSWORD', '8GDyAJUThG'); // Replace with your MySQL password
define('DB_NAME', 'sql12736087');     // Replace with your database name

// Create a connection
$conn = mysqli_connect(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);

// Check if the connection was successful
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
