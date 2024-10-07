<?php
// Suppress error reporting for production
error_reporting(0);
session_start();
$response = array();

// Check if the request method is GET
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    http_response_code(404); // Set response code to 404
    die(); // Terminate the script
} else {
    // Check if both email and password are set in the POST request
    if (isset($_POST['email']) && isset($_POST['password'])) {
        include("./config.php"); // Include database configuration

        // Check if the database connection is successful
        if ($conn) {
            // Escape user input to prevent SQL injection
            $email = mysqli_real_escape_string($conn, $_POST['email']);
            $password = $_POST['password']; // No need to escape password

            // Prepare SQL statement to fetch user details
            $sql = "SELECT id, role, password_hash FROM users WHERE email=?";
            $stmt = mysqli_prepare($conn, $sql);

            if ($stmt) {
                // Bind parameters
                mysqli_stmt_bind_param($stmt, "s", $email);
                // Execute the statement
                mysqli_stmt_execute($stmt);
                // Get the result
                $result = mysqli_stmt_get_result($stmt);

                if ($result) {
                    // Fetch the associative array of the result
                    $row = mysqli_fetch_assoc($result);

                    // Check if a user was found
                    if ($row) {
                        // Verify the password against the hashed password in the database
                        if (password_verify($password, $row['password_hash'])) {
                            // Successful login, set session variable
                            $_SESSION['uid'] = $row['id'];
                            $response['status'] = 'success';
                            $response['role'] = $row['role'];
                        } else {
                            // Password verification failed
                            $response['status'] = 'error';
                            $response['message'] = 'Invalid email or password!';
                        }
                    } else {
                        // No user found with the provided email
                        $response['status'] = 'error';
                        $response['message'] = 'Invalid email or password!';
                    }

                    // Close the prepared statement
                    mysqli_stmt_close($stmt);
                } else {
                    // Error fetching result
                    $response['status'] = 'error';
                    $response['message'] = 'Error fetching result';
                }
            } else {
                // Error preparing SQL statement
                $response['status'] = 'error';
                $response['message'] = 'Error preparing statement';
            }
        } else {
            // Database connection error
            $response['status'] = 'error';
            $response['message'] = 'Database connection error';
        }
    } else {
        // Required fields are missing
        $response['status'] = 'error';
        $response['message'] = 'Both fields are required';
    }

    // Return the response as JSON
    echo json_encode($response);
}
?>
