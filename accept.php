<?php
session_start();
include("conn.php");

if (isset($_POST['accept'])) {
    // Retrieve the details from the form submission
    $id = $_POST['id'];
    $username = $_POST['username'];
    $drugs = $_POST['drugs'];
    $amount = $_POST['amount'];

    // Use prepared statements to prevent SQL injection
    $insert_sql = $conn->prepare("INSERT INTO accepted (username, drug_list, amount, status) VALUES (?, ?, ?, 'accepted')");
    $insert_sql->bind_param("sss", $username, $drugs, $amount);
    
    if ($insert_sql->execute()) {
        // Insert a notification into the 'notifications' table
        $notification_message = "New accepted quotation from $username.";
        $notification_sql = $conn->prepare("INSERT INTO notifications (message) VALUES (?)");
        $notification_sql->bind_param("s", $notification_message);
        $notification_sql->execute();

        // If insert successful, delete from 'quotation' table
        $delete_sql = $conn->prepare("DELETE FROM qotation WHERE id = ?");
        $delete_sql->bind_param("i", $id);
        
        if ($delete_sql->execute()) {
            $_SESSION["msgsuccess"] = "Quotation accepted.";
        } else {
            $_SESSION["msg"] = "Error deleting from quotation: " . $conn->error;
        }
    } else {
        $_SESSION["msg"] = "Error inserting into accepted: " . $conn->error;
    }


    header("Location: quotations.php");
    exit();

} elseif (isset($_POST['reject'])) {

    $id = $_POST['id'];
    $username = $_POST['username'];
    $drugs = $_POST['drugs'];
    $amount = $_POST['amount'];

    // Use prepared statements to prevent SQL injection
    $insert_sql = $conn->prepare("INSERT INTO accepted (username, drug_list, amount, status) VALUES (?, ?, ?, 'rejected')");
    $insert_sql->bind_param("sss", $username, $drugs, $amount);
    
    if ($insert_sql->execute()) {
        // Insert a notification into the 'notifications' table
        $notification_message = "New rejected quotation from $username.";
        $notification_sql = $conn->prepare("INSERT INTO notifications (message) VALUES (?)");
        $notification_sql->bind_param("s", $notification_message);
        $notification_sql->execute();

        // If insert successful, delete from 'quotation' table
        $delete_sql = $conn->prepare("DELETE FROM qotation WHERE id = ?");
        $delete_sql->bind_param("i", $id);
        
        if ($delete_sql->execute()) {
            $_SESSION["msg"] = "Quotation rejected.";
        } else {
            $_SESSION["msg"] = "Error deleting from quotation: " . $conn->error;
        }
    } else {
        $_SESSION["msg"] = "Error inserting into accepted: " . $conn->error;
    }

    // Redirect back to the user dashboard or desired page
    header("Location: quotations.php");
    exit();
}

?>
