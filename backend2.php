<?php
session_start();
include("conn.php");

if (isset($_POST['customersubmit'])) {
   
    $username = $_POST['customer'];

    
    if (isset($_SESSION['drugs']) && !empty($_SESSION['drugs'])) {
        $drugList = []; 
        $totalAmount = 0;

        foreach ($_SESSION['drugs'] as $drug) {
            $drugName = mysqli_real_escape_string($conn, $drug['name']);
            $quantity = intval($drug['quantity']);
            $amount = floatval($drug['amount']);

           
            $drugList[] = "$drugName (Qty: $quantity, Amount: " . number_format($amount, 2) . ")";
            $totalAmount += $amount; 
        }

      
        $drugListString = implode(", ", $drugList);

       
        $sql = "INSERT INTO qotation (username, drug_list, amount) VALUES ('$username', '$drugListString', '$totalAmount')";

       
        if (!mysqli_query($conn, $sql)) {
           
            echo "Error: " . mysqli_error($conn);
        } else {
           
            unset($_SESSION['drugs']);
            $_SESSION["msgsuccess"] = "Quotation successfully added for user: " . htmlspecialchars($username);
        }
    } else {
        $_SESSION["msg"] = "No drugs to add to the quotation.";
    }

   
    header("Location: admin_dashboard.php"); 
    exit();
}
?>
