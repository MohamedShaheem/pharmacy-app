<?php
session_start();
if (!isset($_SESSION['username'])) {
    header('Location: login.php');
}

$username = $_SESSION['username'];
include("backend.php");
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>User Dashboard - XMedi</title>
    <link rel="shortcut icon" href="asset/logo.png" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .navbar {
            margin-bottom: 20px;
        }
        .hero-text {
            text-align: center;
            margin: 40px 0;
            color: darkred;
        }
        .card {
            border: none;
            border-radius: 15px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
        }
        .btn-success {
            background-color: #28a745;
            border: none;
        }
        .btn-success:hover {
            background-color: #218838;
        }
        .form-label {
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="container-fluid">
        <!-- Navbar start -->
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container-fluid">
                <a class="navbar-brand" href="#"> 
                    <span class="h3 text-success">X</span>Medi
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="user_dashboard.php">Order Medicines</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="quotations.php">Quotations</a>
                        </li>
                    </ul>
                    <div class="d-flex ms-auto">
                        <a href="logout.php" class="btn btn-outline-light">Logout</a>
                    </div>
                </div>
            </div>
        </nav>
        <!-- Navbar end -->

        <!-- Notification Section -->
        <div class="row mt-4">
        <?php
                if (isset($_SESSION["msg"])) {
                    echo '
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>' . $_SESSION["msg"] . '</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>';
                    unset($_SESSION["msg"]);
                } elseif (isset($_SESSION["msgsccuess"])) {
                    echo '
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>' . $_SESSION["msgsccuess"] . '</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>';
                    unset($_SESSION["msgsccuess"]);
                }
                ?>
            <div class="col-12">
                <div class="text-center">
                    <h1 class="hero-text">Make an Order for your Medical Needs</h1>
                </div>
               
            </div>
        </div>

        <!-- Order Form Section -->
        <div class="row  mb-5 d-flex justify-content-center">
            <div class="col-md-8 col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <form action="backend.php" method="post" enctype="multipart/form-data">
                            <div class="mb-3">
                                <label for="username" class="form-label">Username</label>
                                <input type="text" class="form-control" id="username" name="username" value="<?php echo htmlspecialchars($username); ?>" required>
                            </div>
                            <div class="mb-3">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" class="form-control" id="name" name="name" required>
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" name="email" required>
                                <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                            </div>
                            <div class="mb-3">
                                <label for="mobile" class="form-label">Mobile</label>
                                <input type="tel" class="form-control" id="mobile" name="mobile" required>
                            </div>
                            <div class="mb-3">
                                <label for="address" class="form-label">Delivery Address</label>
                                <input type="text" class="form-control" id="address" name="address" required>
                            </div>
                            <div class="mb-3">
                                <label for="time" class="form-label">Delivery Time</label>
                                <input type="time" class="form-control" id="time" name="time" required>
                            </div>
                            <div class="mb-3">
                                <label for="image" class="form-label">Prescription</label>
                                <input type="file" class="form-control" id="image" name="image" required>
                            </div>
                            <div class="mb-3 d-flex justify-content-center">
                                <button type="submit" name="submit" class="btn btn-success w-50 fs-5 fw-bold">Order</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
