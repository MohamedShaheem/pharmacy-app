<?php
session_start();
include("conn.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'])) {
    $id = $_POST['id'];

    // Fetch the data from the prescription table
    $fetch_sql = "SELECT * FROM prescription WHERE id = ?";
    $stmt = mysqli_prepare($conn, $fetch_sql);
    mysqli_stmt_bind_param($stmt, 'i', $id);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_assoc($result)) {
        // Prepare the data to insert into the done table
        $username = $row['username'];
        $name = $row['name'];
        $email = $row['email'];
        $mobile = $row['mobile'];
        $address = $row['address'];
        $time = $row['time'];
        $image = $row['image'];

        // Insert into the done table
        $insert_sql = "INSERT INTO done (username, name, email, mobile, address, time, image) VALUES (?, ?, ?, ?, ?, ?, ?)";
        $insert_stmt = mysqli_prepare($conn, $insert_sql);
        mysqli_stmt_bind_param($insert_stmt, 'sssssss', $username, $name, $email, $mobile, $address, $time, $image);
        mysqli_stmt_execute($insert_stmt);

        // Delete from the prescription table
        $delete_sql = "DELETE FROM prescription WHERE id = ?";
        $delete_stmt = mysqli_prepare($conn, $delete_sql);
        mysqli_stmt_bind_param($delete_stmt, 'i', $id);
        mysqli_stmt_execute($delete_stmt);

        $_SESSION["msgsuccess"] = "Prescription Delivered";
    } else {
        $_SESSION["msg"] = "Error: Prescription not found.";
    }
    header('Location: admin_dashboard.php'); // Redirect back to your main page
    exit();
} else {
    $_SESSION["msg"] = "Invalid request.";
    header('Location: admin_dashboard.php');
    exit();
}
?>
