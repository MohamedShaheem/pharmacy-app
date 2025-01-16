<?php
session_start();
if (!isset($_SESSION['username'])) {
    header('Location: login.php');
    exit();
}

include("conn.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Dashboard</title>
    <link rel="shortcut icon" href="asset/logo.png" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        #draggableImageContainer {
            display: none;
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 80%;
            max-width: 600px;
            border: 1px solid #ccc;
            box-shadow: 0 0 20px rgba(0,0,0,0.2);
            background-color: #fff;
            z-index: 1000;
            cursor: move;
            padding: 20px;
            border-radius: 8px;
        }
        #draggableImageContainer img {
            width: 100%;
            height: auto;
            border-radius: 4px;
        }
        .close-button {
            position: absolute;
            top: 10px;
            right: 15px;
            font-size: 24px;
            cursor: pointer;
            color: #555;
            transition: color 0.3s;
        }
        .close-button:hover {
            color: #000;
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
<body class="bg-light">
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
                        <a class="nav-link active" href="admin_dashboard.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="notifications.php">Notifications</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="database_add_drug.php">Add-Drugs</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="accepted_quotation.php">AcceptedQuotation</a>
                    </li>
                </ul>
                <div class="d-flex ms-auto">
                        <a href="logout.php" class="btn btn-outline-light">Logout</a>
                    </div>
            </div>
        </div>
    </nav>
    <!-- Navbar end -->

    <div class="container">
        <?php
        if (isset($_SESSION["msg"])) {
            echo '
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>' . $_SESSION["msg"] . '</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
            unset($_SESSION["msg"]);
        } elseif (isset($_SESSION["msgsuccess"])) {
            echo '
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>' . $_SESSION["msgsuccess"] . '</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
            unset($_SESSION["msgsuccess"]);
        }
        ?>

        <div class="row ">
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-header bg-dark text-white">
                        <h3 class="mb-0">Pending Prescriptions</h3>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Username</th>
                                        <th>Email</th>
                                        <th>Mobile</th>
                                        <th>Delivery Address</th>
                                        <th>Delivery Time</th>
                                        <th>Prescriptions</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $sql = "SELECT * FROM prescription";
                                    $result = mysqli_query($conn, $sql);
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        echo '
                                        <tr>
                                            <td>' . $row['id'] . '</td>
                                            <td>' . $row['name'] . '</td>
                                            <td>' . $row['username'] . '</td>
                                            <td>' . $row['email'] . '</td>
                                            <td>' . $row['mobile'] . '</td>
                                            <td>' . $row['address'] . '</td>
                                            <td>' . $row['time'] . '</td>
                                            <td>
                                                <img src="' . $row['image'] . '" alt="Prescription" style="width:100px; height:auto; cursor:pointer;" 
                                                onclick="openDraggableImage(\'' . $row['image'] . '\')">
                                            </td>
                                            <td>
                                                <form method="POST" action="move_to_done.php">
                                                    <input type="hidden" name="id" value="' . $row['id'] . '">
                                                    <button type="submit" class="btn btn-success btn-sm">Done</button>
                                                </form>
                                            </td>
                                        </tr>';
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="card">
                    <div class="card-header bg-dark text-white">
                        <h3 class="mb-0">Quotations</h3>
                    </div>
                    <div class="card-body">
                        <form method="post" action="add_drug.php" class="mb-4">
                            <div class="mb-3">
                                <label for="drugName" class="form-label">Search Drug</label>
                                <input type="text" name="drugName" id="drugName" class="form-control" placeholder="Enter drug name" required>
                            </div>
                            <div class="mb-3">
                                <label for="quantity" class="form-label">Quantity</label>
                                <input type="number" name="quantity" id="quantity" class="form-control" placeholder="Enter quantity" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Add</button>
                            <button type="button" class="btn btn-info ms-2" data-bs-toggle="modal" data-bs-target="#viewDrugsModal">View Available Drugs</button>
                        </form>

                        <div class="table-responsive">
                            <table class="table table-striped drug-table">
                                <thead>
                                    <tr>
                                        <th>Drug</th>
                                        <th>Quantity</th>
                                        <th>Amount</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    if (isset($_SESSION['drugs']) && !empty($_SESSION['drugs'])) {
                                        $total = 0;
                                        foreach ($_SESSION['drugs'] as $drug) {
                                            echo '<tr>';
                                            echo '<td>' . htmlspecialchars($drug['name']) . '</td>';
                                            echo '<td>' . htmlspecialchars($drug['quantity']) . '</td>';
                                            echo '<td>' . number_format($drug['amount'], 2) . '</td>';
                                            echo '</tr>';
                                            $total += $drug['amount'];
                                        }
                                        echo '<tr>';
                                        echo '<td colspan="2" class="text-end">Total</td>';
                                        echo '<td class="total">' . number_format($total, 2) . '</td>';
                                        echo '</tr>';
                                    } else {
                                        echo '<tr><td colspan="3">No drugs added yet.</td></tr>';
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>

                        <form action="backend2.php" method="post">
                            <div class="mb-3">
                                <label for="customerUsername" class="form-label">Customer Username</label>
                                <input type="text" name="customer" id="customerUsername" class="form-control" placeholder="Username" required>
                            </div>
                            <button type="submit" class="btn btn-primary" name="customersubmit">Send</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal for Viewing Available Drugs -->
    <div class="modal fade" id="viewDrugsModal" tabindex="-1" aria-labelledby="viewDrugsModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="viewDrugsModalLabel">Available Drugs</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div id="drugsList"></div>
                </div>
            </div>
        </div>
    </div>

    <!-- Draggable Image Container -->
    <div id="draggableImageContainer">
        <span class="close-button" onclick="closeDraggableImage()">&times;</span>
        <img id="draggableImage" src="" alt="Draggable Image">
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var drugsModal = document.getElementById('viewDrugsModal');
            drugsModal.addEventListener('show.bs.modal', function () {
                fetchDrugsList();
            });

            function fetchDrugsList() {
                var xhr = new XMLHttpRequest();
                xhr.open('GET', 'fetch_drugs.php', true);
                xhr.onreadystatechange = function () {
                    if (xhr.readyState == 4 && xhr.status == 200) {
                        document.getElementById('drugsList').innerHTML = xhr.responseText;
                    }
                };
                xhr.send();
            }
        });

        function openDraggableImage(imageSrc) {
            document.getElementById('draggableImage').src = imageSrc;
            document.getElementById('draggableImageContainer').style.display = 'block';
            dragElement(document.getElementById("draggableImageContainer"));
        }

        function closeDraggableImage() {
            document.getElementById('draggableImageContainer').style.display = 'none';
        }

        function dragElement(elmnt) {
            var pos1 = 0, pos2 = 0, pos3 = 0, pos4 = 0;
            elmnt.onmousedown = dragMouseDown;

            function dragMouseDown(e) {
                e = e || window.event;
                e.preventDefault();
                pos3 = e.clientX;
                pos4 = e.clientY;
                document.onmouseup = closeDragElement;
                document.onmousemove = elementDrag;
            }

            function elementDrag(e) {
                e = e || window.event;
                e.preventDefault();
                pos1 = pos3 - e.clientX;
                pos2 = pos4 - e.clientY;
                pos3 = e.clientX;
                pos4 = e.clientY;
                elmnt.style.top = (elmnt.offsetTop - pos2) + "px";
                elmnt.style.left = (elmnt.offsetLeft - pos1) + "px";
            }

            function closeDragElement() {
                document.onmouseup = null;
                document.onmousemove = null;
            }
        }
    </script>
</body>
</html>