<?php
session_start();
if(!isset($_SESSION['username'])){
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
    <title>User Dashboard</title>
    <link rel="shortcut icon" href="asset/logo.png" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
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
                            <a class="nav-link" aria-current="page" href="user_dashboard.php">Order Medicines</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="quotations.php">Quotations</a>
                        </li>
                    </ul>
                    <div class="d-flex ms-auto">
                        <a href="logout.php" class="btn btn-outline-light">Logout</a>
                    </div>
                </div>
            </div>
        </nav>
        <!-- Navbar end -->

      <!-- Notification section -->
      <div class="row mt-3">
        <div class="col-sm-12">
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
        </div>
      </div>

      <!-- Quotations Table -->
      <div class="row mt-5">
        <div class="col-sm-10 offset-sm-1">
          <div class="card">
            <div class="card-header bg-dark text-white">
              <h4 class="mb-0">Quotations</h4>
            </div>
            <div class="card-body">
              <table class="table table-hover">
                <thead class="table-light">
                  <tr>
                    <th>No.</th>
                    <th>Username</th>
                    <th>Drug List</th>
                    <th>Amount</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  // Fetch quotations for the current user
                  $sql = "SELECT * FROM qotation WHERE username = '$username' AND status = 'not_accepted'";
                  $result = mysqli_query($conn, $sql);

                  // Loop through each row of the result set
                  while ($row = mysqli_fetch_assoc($result)) {
                    $id = $row['id'];
                    $username = $row['username'];
                    $drugs = $row['drug_list'];
                    $amount = $row['amount'];
                    echo '
                    <tr>
                      <td>'.$id.'</td>
                      <td>'.$username.'</td>
                      <td>'.$drugs.'</td>
                      <td>'.$amount.'$</td>
                      <td>
                        <form action="accept.php" method="post">
                          <input type="hidden" name="id" value="'.$id.'">
                          <input type="hidden" name="username" value="'.$username.'">
                          <input type="hidden" name="drugs" value="'.$drugs.'">
                          <input type="hidden" name="amount" value="'.$amount.'">
                          <button type="submit" name="accept" class="btn btn-success my-2">Accept</button>
                          <button type="submit" name="reject" class="btn btn-danger">Reject</button>
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
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>
