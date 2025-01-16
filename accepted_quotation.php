<?php
session_start();
if (!isset($_SESSION['username'])) {
    header('Location: login.php');
    exit();
}

// Database connection
include("conn.php");

// Fetch accepted quotations
$quotation_sql = "SELECT * FROM accepted WHERE status = 'accepted' ORDER BY created_at DESC";
$quotation_result = mysqli_query($conn, $quotation_sql);
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Accepted Quotations - XMedi</title>
    <link rel="shortcut icon" href="asset/logo.png" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .dashboard-title {
            margin-top: 20px;
            text-align: center;
            color: darkred;
        }
        .quotation-card {
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
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
                        <a class="nav-link " href="notifications.php">Notifications</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href="database_add_drug.php">Add-Drugs</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="accepted_quotation.php">AcceptedQuotation</a>
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
            <h3 class="dashboard-title">Accepted Quotations</h3>
            <?php
            if (mysqli_num_rows($quotation_result) > 0) {
                while ($quotation = mysqli_fetch_assoc($quotation_result)) {
                    echo '<div class="card quotation-card">';
                    echo '<div class="card-body">';
                    echo '<h5 class="card-title">Quotation ID: ' . $quotation['id'] . '</h5>';
                    echo '<p class="card-text"><strong>Client Name:</strong> ' . $quotation['username'] . '</p>';
                    echo '<p class="card-text"><strong>Service:</strong> ' . $quotation['drug_list'] . '</p>';
                    echo '<p class="card-text"><strong>Amount:</strong> $' . number_format($quotation['amount'], 2) . '</p>';
                    echo '<p class="card-text"><strong>Status:</strong> <span class="text-success">Accepted</span></p>';
                    echo '<small class="text-muted">Created at: ' . $quotation['created_at'] . '</small>';
                    echo '</div>';
                    echo '</div>';
                }
            } else {
                echo '<div class="alert alert-info">No accepted quotations found.</div>';
            }
            ?>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
