<?php
// Password to be hashed
$password = "yourPasswordHere"; // Replace with the actual password

// Hashing the password
$hashedPassword = password_hash($password, PASSWORD_BCRYPT);

// Output the hashed password
echo "aaaa: " . $hashedPassword . "\n";

// Example of verifying the hashed password
$inputPassword = "yourPasswordHere"; // Replace with the password input for verification

if (password_verify($inputPassword, $hashedPassword)) {
    echo "Password is valid!";
} else {
    echo "Invalid password.";
}
?>
