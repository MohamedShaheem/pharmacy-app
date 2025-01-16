<?php
include("conn.php");
session_start();
if(isset($_POST["add"])){
    $dname = $_POST["drugname"];
    $price = $_POST["price"];
    if(empty($dname)&&empty($price)){
        $_SESSION["msg"] = "Please input Name and price of the Drug to ADD";
        header("location:database_add_drug.php");
        exit();
    }else{
        $sql = "INSERT INTO drugs (drugname,price) VALUES ('$dname','$price')";
        $result = mysqli_query($conn,$sql);
        if($result){
            $_SESSION["msg"] = "Drug Added Successfully";
            header("location:database_add_drug.php");
            exit();
        }else{
            $_SESSION["msg"] = "Something went wrong";
            header("location:database_add_drug.php");
            exit();
        }
    }
    mysqli_close($conn);
}


?>