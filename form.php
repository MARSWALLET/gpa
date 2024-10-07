<?php  
// Start the session to access session variables like error messages
session_start();

require_once 'postdata.php'; // Ensure this path is correct
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="UTF-8">
  <title>GPAtalentsHunts</title>
  <!-- Fontawesome CDN Link -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css" />
  <link rel="stylesheet" href="login-form-style.css">
  <link rel="icon" type="image/x-icon" href="images/mainweblogo.png">
</head>

<body>
  <div class="container">
    <input type="checkbox" id="flip">
    <div class="cover">
      <div class="front">
        <img src="images/formimage.jpg" alt="">
        <div class="text">
          <span class="text-1">GPAtalentsHunts<br></span>
          <span class="text-2">Get To Make Money With your Football Skill</span>
        </div>
      </div>
    </div>
    <div class="forms">
      <div class="form-content">
        <div class="login-form">

          <div class="title" id='board-title'>Fill The Form</div>

          <!-- Error Message Box -->
          <?php if (isset($_SESSION['error_msg'])): ?>
            <div class="alert alert-danger text-center mt-3" role="alert">
              <?php
              echo $_SESSION['error_msg'];
              unset($_SESSION['error_msg']); // Clear the error message after displaying it
              ?>
            </div>
          <?php endif; ?>

          <form action="postdata.php" id="login-form" method="post"> <!-- Change action to postdata.php -->
            <div class="input-boxes">
              <div class="input-box">
                <i class="fa fa-user"></i>
                <input type="text" name="fname" placeholder="Enter your FirstName" id='fname' required>
              </div>
              <div class="input-box">
                <i class="fa fa-user"></i>
                <input type="text" name="lname" placeholder="Enter your LastName" id='lname' required>
              </div>
              <div class="input-box">
                <i class="fa fa-birthday-cake"></i>
                <input type="number" name="age" placeholder="Enter your Age" id='age' required>
              </div>
              <div class="input-box">
                <i class="fas fa-phone"></i>
                <input type="text" name="phone" placeholder="Type(+1 your code)Phone" id='phone' required>
              </div>
              <div class="input-box">
                <i class="fas fa-envelope"></i>
                <input type="email" name="email" placeholder="Enter your email" id='loginEmail' required>
              </div>
              <div class="input-box">
                <i class="bi bi-globe"></i>
                <input type="text" name="address" placeholder="Current Address ?" id="address" required>
              </div>
              <div class="input-box">
                <i class="bi bi-globe"></i>
                <input type="text" name="city" placeholder="City ?" id="City" required>
              </div>
              <div class="input-box">
                <i class="fas fa-globe"></i>
                <input type="text" name="country" placeholder="Country of Origin ?" id='country' required>
              </div>
              <div class="text">
                <input type="checkbox" id="Checkbox" required>
                <a id="terms" target="_blank" href="https://gpatalentshunt.online/termofservice.html">Terms Of Service & FAQ</a>
              </div>
              <div class="button input-box">
                <button type="submit" id="submitBtn" class="btn">Submit</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
  <script src="Postdata.js"></script>
  <script>
    document.getElementById('yourFormId').addEventListener('submit', function(event) {
        document.getElementById('submitBtn').innerText = 'Processing...';
    });
  </script>
</body>
</html>
