<?php
session_start();
if (!isset($_SESSION['username'])) {
    header('Location: login.php');
    exit(); // Add exit to ensure no further code is executed after header redirect
}

include("conn.php");
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Dashboard</title>
    <link rel="shortcut icon" href="asset/logo.png" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <style>
        /* Styling for the draggable image container */
        #draggableImageContainer {
            display: none; /* Initially hidden */
            position: absolute;
            top: 50px;
            left: 50px;
            width: 400px; /* Adjust width as needed */
            border: 1px solid #ccc;
            box-shadow: 0px 0px 10px rgba(0,0,0,0.5);
            background-color: #fff;
            z-index: 1000; /* Ensure it's on top */
            cursor: move;
            padding: 10px;
        }

        #draggableImageContainer img {
            width: 100%;
            height: auto;
        }

        /* Styling for the close button */
        .close-button {
            position: absolute;
            top: 5px;
            right: 10px;
            font-size: 20px;
            cursor: pointer;
            color: #888;
        }

        .close-button:hover {
            color: #333;
        }

        .drug-table {
            width: 100%;
            margin-bottom: 20px;
        }

        .total {
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
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
                        <a class="nav-link active" href="database_add_drug.php">Add-Drugs</a>
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
            </div>
        </div>
        <?php
  if (isset($_SESSION["msg"])) {
    echo '
    <div class="position-fixed p-3" style="z-index: 5">
      <div id="liveToast" class="toast align-items-center bg-success text-light show" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="d-flex">
          <div class="toast-body">
            <strong> !!! ' . $_SESSION["msg"] . ' !!! </strong> 
          </div>
          <button type="button" class="btn-close me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
      </div>
    </div>';
    unset($_SESSION["msg"]);
   } ?>
        <!-- Add your main content here -->
        <div class="row mt-5 d-flex justify-content-center">
            <div class="col-sm-6">
  
                <h3 class="text-center">Add Drugs</h3>
                <form action="add.php" method="post">
                <div class="mb-3">
                    <label for="drugName" class="form-label">Drug Name</label>
                    <input type="text" name="drugname" id="drugName" class="form-control" placeholder="Enter drug name" required>
                </div>
                <div class="mb-3">
                    <label for="quantity" class="form-label">Price Per Drug</label>
                    <input type="number" name="price" id="quantity" class="form-control" placeholder="Enter quantity" required>
                </div>
                <button type="submit" name="add" class="btn btn-primary">Add</button>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>
