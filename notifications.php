<?php
session_start();
if (!isset($_SESSION['username'])) {
    header('Location: login.php');
    unset($_SESSION["username"]);
}

include("conn.php");

// Fetch unread notifications
$notification_sql = "SELECT * FROM notifications WHERE is_read = 0 ORDER BY created_at DESC";
$notification_result = mysqli_query($conn, $notification_sql);
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Dashboard - XMedi</title>
    <link rel="shortcut icon" href="asset/logo.png" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .navbar {
            margin-bottom: 20px;
        }
        .dashboard-title {
            color: darkred;
            margin-top: 20px;
            text-align: center;
        }
        .notification-card {
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }
        .notification-item {
            padding: 15px;
            border-bottom: 1px solid #e0e0e0;
        }
        .notification-item:last-child {
            border-bottom: none;
        }
        .btn-success {
            background-color: #28a745;
            border: none;
        }
        .btn-success:hover {
            background-color: #218838;
        }
    </style>
</head>
<body>
<div class="container-fluid">
  <!-- Navbar start -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
        <div class="container-fluid">
            <a class="navbar-brand" href="admin_dashboard.php">
                <span class="h3 text-success">X</span>Medi
                <span class="fw-bolder fs-3">Admin</span>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                        <a class="nav-link " href="admin_dashboard.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="notifications.php">Notifications</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href="database_add_drug.php">Add-Drugs</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href="accepted_quotation.php">AcceptedQuotation</a>
                    </li>
                </ul>
                <div class="d-flex ms-auto">
                        <a href="logout.php" class="btn btn-outline-light">Logout</a>
                    </div>
            </div>
        </div>
    </nav>
    <!-- Navbar end -->

    <div class="row">
        <div class="col-sm-12">
            <h3 class="dashboard-title">Admin Notifications</h3>
            <?php
            if (mysqli_num_rows($notification_result) > 0) {
                echo '<div class="card notification-card">';
                echo '<div class="list-group list-group-flush">';
                while ($notification = mysqli_fetch_assoc($notification_result)) {
                    echo '<div class="list-group-item notification-item">';
                    echo '<p>' . $notification['message'] . '</p>';
                    echo '<small class="text-muted float-end">' . $notification['created_at'] . '</small>';
                    echo '<a href="mark_read.php?id=' . $notification['id'] . '" class="btn btn-sm btn-success ms-2">Mark as Read</a>';
                    echo '</div>';
                }
                echo '</div></div>';
            } else {
                echo '<div class="alert alert-info">No new notifications.</div>';
            }
            ?>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
