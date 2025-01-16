<?php
include("functions.php");

$msg = "";
if($_SERVER["REQUEST_METHOD"] == "POST"){
    include("conn.php");
    $username = $_POST["username"];
    $password = $_POST["password"];
    if(isset($_POST['signup'])){
        header('Location: signup.php');
        exit();
    }
    elseif(empty($username) && empty($password)){
        $msg = "Please enter your username and password !!!";
    }
    elseif(empty($password)){
        $msg = "Please enter password!";
    }
    elseif(empty($username)){
        $msg = "Please enter username!";
    }
    else{
        $sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";
        $result = mysqli_query($conn, $sql);
        
        if ($result) {
            $num = mysqli_num_rows($result);
        
            if ($num > 0) {
                // Fetch the user's data (including role)
                $user_data = mysqli_fetch_assoc($result);
        
                // Start session and set username
                session_start();
                $_SESSION['username'] = $username;
        
                // Check if the user is admin
                if ($user_data['role'] == 'admin') {
                    header('Location: admin_dashboard.php');
                } else {
                    header('Location: user_dashboard.php');
                }
                exit();
            } else {
                $msg = "Incorrect Username or Password!!!!";
            }
        } else {
            $msg = "Query failed: " . mysqli_error($conn);
        }
    }
 mysqli_close($conn);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login - Medi</title>
    <link rel="shortcut icon" href="asset/logo.png" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .login-container {
            max-width: 400px;
            margin: 100px auto;
        }
        .login-form {
            background-color: #ffffff;
            padding: 30px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .login-title {
            text-align: center;
            margin-bottom: 30px;
        }
        .btn-login {
            width: 100%;
        }
        .signup-link {
            text-align: center;
            margin-top: 20px;
        }
    </style>
</head>
<body class="bg-dark">
    <div class="container login-container">
        <?php if (!empty($msg)): ?>
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong><?php echo htmlspecialchars($msg); ?></strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php endif; ?>

        <div class="login-form">
            <h2 class="login-title">Login to <span class="text-success">X</span>Medi</h2>
            <form action="login.php" method="post">
                <div class="mb-3">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" class="form-control" id="username" name="username" required>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" name="password" required>
                </div>
                <button type="submit" name="submit" class="btn btn-primary btn-login">Login</button>
            </form>
            <div class="signup-link">
                <p>Don't have an account? <a href="signup.php">Sign up</a></p>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>


