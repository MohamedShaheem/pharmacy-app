<?php
session_start();
include("conn.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $drugName = $_POST['drugName'];
    $quantity = $_POST['quantity'];

    if (!empty($drugName) && !empty($quantity) && $quantity > 0) {

        $stmt = $conn->prepare("SELECT * FROM drugs WHERE drugname = ?");
        $stmt->bind_param("s", $drugName);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $drug = $result->fetch_assoc();
            $perPrice = $drug['price'];

            $amount = $perPrice * $quantity;

            if (!isset($_SESSION['drugs'])) {
                $_SESSION['drugs'] = [];
            }


            $_SESSION['drugs'][] = [
                'name' => $drugName,
                'quantity' => $quantity,
                'amount' => $amount
            ];


            header("Location: admin_dashboard.php");
            exit();
        } else {
            $_SESSION["msg"] = "Drug not found.";
            header("location:admin_dashboard.php");
        }
    } else {
        echo "Please provide both drug name and a valid quantity.";
    }
}
?>
