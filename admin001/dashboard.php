<?php
// Include database configuration
include 'config.php';

// Fetch total users
$totalUsersResult = mysqli_query($conn, "SELECT COUNT(*) AS count FROM users");
if (!$totalUsersResult) {
    die("Query failed: " . mysqli_error($conn));
}
$totalUsersCount = mysqli_fetch_assoc($totalUsersResult)['count'];

// Fetch approved users
$approvedUsersResult = mysqli_query($conn, "SELECT COUNT(*) AS count FROM users WHERE status='approved'");
if (!$approvedUsersResult) {
    die("Query failed: " . mysqli_error($conn));
}
$approvedUsersCount = mysqli_fetch_assoc($approvedUsersResult)['count'];

// Fetch pending users
$pendingUsersResult = mysqli_query($conn, "SELECT COUNT(*) AS count FROM users WHERE status='pending'");
if (!$pendingUsersResult) {
    die("Query failed: " . mysqli_error($conn));
}
$pendingUsersCount = mysqli_fetch_assoc($pendingUsersResult)['count'];

// Fetch recent users
$recentUsersQuery = mysqli_query($conn, "SELECT fname, lname, email, age, created_at, REF FROM users ORDER BY created_at DESC LIMIT 7");
if (!$recentUsersQuery) {
    die("Query failed: " . mysqli_error($conn));
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <title>Admin Dashboard Panel</title> 
</head>
<body>
    <nav>
        <div class="logo-name">
            <div class="logo-image">
                <img src="images/logo.png" alt="">
            </div>
            <span class="logo_name">GPAtalentsHunts</span>
        </div>
        <div class="menu-items">
            <ul class="nav-links">
                <li><a href="#">
                    <i class="uil uil-estate"></i>
                    <span class="link-name">Dashboard</span>
                </a></li>
                <li><a href="#">
                    <i class="uil uil-files-landscapes"></i>
                    <span class="link-name">Mail</span>
                </a></li>
                <li><a href="#">
                    <i class="uil uil-chart"></i>
                    <span class="link-name">Signed Up</span>
                </a></li>
                <li><a href="#">
                    <i class="uil uil-thumbs-up"></i>
                    <span class="link-name">Approval</span>
                </a></li>
                <li><a href="#">
                    <i class="uil uil-comments"></i>
                    <span class="link-name">Pending</span>
                </a></li>
                <li><a href="#">
                    <i class="uil uil-share"></i>
                    <span class="link-name">Broadcast</span>
                </a></li>
            </ul>
            <ul class="logout-mode">
                <li><a href="#">
                    <i class="uil uil-signout"></i>
                    <span class="link-name">Logout</span>
                </a></li>
                <li class="mode">
                    <a href="#">
                        <i class="uil uil-moon"></i>
                        <span class="link-name">Dark Mode</span>
                    </a>
                    <div class="mode-toggle">
                      <span class="switch"></span>
                    </div>
                </li>
            </ul>
        </div>
    </nav>

    <section class="dashboard">
        <div class="top">
            <i class="uil uil-bars sidebar-toggle"></i>
            <div class="search-box">
                <i class="uil uil-search"></i>
                <input type="text" placeholder="Search here...">
            </div>
            <img src="images/profile.jpg" alt="">
        </div>

        <div class="dash-content">
            <div class="overview">
                <div class="title">
                    <i class="uil uil-tachometer-fast-alt"></i>
                    <span class="text">Dashboard</span>
                </div>

                <div class="boxes">
                    <div class="box box1">
                        <i class="uil uil-thumbs-up"></i>
                        <span class="text">Total USERS</span>
                        <span class="number"><?php echo $totalUsersCount; ?></span>
                    </div>
                    <div class="box box2">
                        <i class="uil uil-comments"></i>
                        <span class="text">Approved</span>
                        <span class="number"><?php echo $approvedUsersCount; ?></span>
                    </div>
                    <div class="box box3">
                        <i class="uil uil-share"></i>
                        <span class="text">Pending</span>
                        <span class="number"><?php echo $pendingUsersCount; ?></span>
                    </div>
                </div>
            </div>

            <div class="activity">
                <div class="title">
                    <i class="uil uil-clock-three"></i>
                    <span class="text">Recent Activity</span>
                </div>

                <div class="activity-data">
                    <div class="data names">
                        <span class="data-title">Name:</span>
                        <?php while ($user = mysqli_fetch_assoc($recentUsersQuery)): ?>
                            <span class="data-list"><?php echo $user['fname'] . ' ' . $user['lname']; ?></span>
                        <?php endwhile; ?>
                    </div>
                    <div class="data email">
                        <span class="data-title">Email:</span>
                        <?php mysqli_data_seek($recentUsersQuery, 0); // Reset pointer ?>
                        <?php while ($user = mysqli_fetch_assoc($recentUsersQuery)): ?>
                            <span class="data-list"><?php echo $user['email']; ?></span>
                        <?php endwhile; ?>
                    </div>
                    <div class="data joined">
                        <span class="data-title">Joined:</span>
                        <?php mysqli_data_seek($recentUsersQuery, 0); // Reset pointer ?>
                        <?php while ($user = mysqli_fetch_assoc($recentUsersQuery)): ?>
                            <span class="data-list"><?php echo $user['created_at']; ?></span>
                        <?php endwhile; ?>
                    </div>
                    <div class="data type">
                        <span class="data-title">Age:</span>
                        <?php mysqli_data_seek($recentUsersQuery, 0); // Reset pointer ?>
                        <?php while ($user = mysqli_fetch_assoc($recentUsersQuery)): ?>
                            <span class="data-list"><?php echo $user['age']; ?></span>
                        <?php endwhile; ?>
                    </div>
                    <div class="data status">
                        <span class="data-title">REF ID:</span>
                        <?php mysqli_data_seek($recentUsersQuery, 0); // Reset pointer ?>
                        <?php while ($user = mysqli_fetch_assoc($recentUsersQuery)): ?>
                            <span class="data-list"><?php echo $user['REF']; ?></span>
                        <?php endwhile; ?>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script src="script.js"></script>
</body>
</html>
