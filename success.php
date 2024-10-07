<!-- success.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Success</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="login-form-style.css">
</head>
<body>
    <div class="container text-center" style="margin-top: 50px;">
        <h1>Success!</h1>
        <p>Your form has been submitted successfully.</p>
      <div>
        <form action="logout.php" method="post">
        <button type="submit" class="btn btn-primary">Go Back to Form</button>
        </form>
      </div>
    </div>
</body>
</html>
