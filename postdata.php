<?php 
// Check if session is not already started
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
// Include your database configuration file
require_once 'assets/config.php'; // Assuming your database connection settings are in config.php
require_once 'send_email.php'; // Include the email sending function

// Function to generate a random reference number (alphanumeric or numeric)
function generateRefNumber($length = 10) {
    $characters = '0123456789'; // You can include letters if you want alphanumeric REF numbers
    $charactersLength = strlen($characters);
    $randomNumber = '';
    for ($i = 0; $i < $length; $i++) {
        $randomNumber .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomNumber;
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Get the form data
    $fname = mysqli_real_escape_string($conn, $_POST['fname']);
    $lname = mysqli_real_escape_string($conn, $_POST['lname']);
    $age = mysqli_real_escape_string($conn, $_POST['age']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);
    $email = mysqli_real_escape_string($conn, $_POST['email']); // User email from the form
    $address = mysqli_real_escape_string($conn, $_POST['address']);
    $city = mysqli_real_escape_string($conn, $_POST['city']);
    $country = mysqli_real_escape_string($conn, $_POST['country']);
    
    // Generate REF number
    $refNumber = generateRefNumber(10); 
    
    // Check if email already exists in the database
    $checkEmailQuery = "SELECT * FROM users WHERE email = '$email'";
    $result = mysqli_query($conn, $checkEmailQuery);

    if (mysqli_num_rows($result) > 0) {
        // If the email is already in the database, set the error message
        $_SESSION['error_msg'] = "Error: Email is already registered.";
        header('Location: form.php'); // Redirect back to the form
        exit();
    } else {
        // Insert the form data into the database
        $sql = "INSERT INTO users (fname, lname, age, phone, email, address, city, country, role, REF) 
                VALUES ('$fname', '$lname', '$age', '$phone', '$email', '$address', '$city', '$country', 'user', '$refNumber')";

        // Execute the query
        if (mysqli_query($conn, $sql)) {
            // If the data was successfully inserted, send a welcome email
            if (sendWelcomeEmail($email, $fname)) {
                header('Location: success.php'); // Redirect to success page
                exit();
            } else {
                $_SESSION['error_msg'] = "Error: Unable to send welcome email.";
                header('Location: form.php'); // Redirect back to the form
                exit();
            }
        } else {
            // If there was an error inserting into the database
            $_SESSION['error_msg'] = "Error: " . $sql . "<br>" . mysqli_error($conn);
            header('Location: form.php'); // Redirect back to the form
            exit();
        }
    }

    // Close the database connection
    mysqli_close($conn);
}
?>
