<?php
$msg = "";
if($_SERVER["REQUEST_METHOD"] == "POST"){
    include("conn.php");
    $username = $_POST["username"];
    $password = $_POST["password"];

    if(empty($username) && empty($password)){
        $msg = "Please enter your username and password !!!";
    }
    elseif(empty($password)){
        $msg = "Please enter password!";
    }
    elseif(empty($username)){
        $msg = "Please enter username!";
    }
    else{
     
        $sql = "SELECT * FROM users WHERE username = '$username'";
        $result = mysqli_query($conn,$sql);

        if($result){
            $num=mysqli_num_rows($result);
            if($num>0){
                $msg = "user already exist";

            }else{
                $sql_insert = "INSERT INTO users (username, password) VALUES ('$username','$password')";
                $result_insert = mysqli_query($conn,$sql_insert);
                
                if($result_insert){
                    $msg = "Registration successfull";
                    header('Location: login.php');
                }else{
                    $msg = die(mysqli_error($conn));
                }
            }
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
    <title>Signup - Medi</title>
    <link rel="shortcut icon" href="asset/logo.png" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .signup-container {
            max-width: 400px;
            margin: 100px auto;
        }
        .signup-form {
            background-color: #ffffff;
            padding: 30px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .signup-title {
            text-align: center;
            margin-bottom: 30px;
            color: darkred;
        }
        .btn-signup {
            width: 100%;
        }
        .message {
            text-align: center;
            margin-bottom: 20px;
        }
    </style>
</head>
<body class="bg-secondary">
    <div class="container signup-container">
        <?php if (!empty($msg)): ?>
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong><?php echo htmlspecialchars($msg); ?></strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php endif; ?>

        <div class="signup-form">
            <h2 class="signup-title">Create an Account</h2>
            <form action="signup.php" method="post">
                <div class="mb-3">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" class="form-control" id="username" name="username" required>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" name="password" required>
                </div>
                <button type="submit" name="register" class="btn btn-primary btn-signup">Register</button>
            </form>
            <div class="message">
                <p>Already have an account? <a href="login.php">Login here</a></p>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
