<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
include("conn.php");
if($_SERVER["REQUEST_METHOD"]== "POST"){
        $username = $_POST["username"];
    	$name = $_POST["name"];
    	$email = $_POST["email"];
    	$mobile = $_POST["mobile"];
    	$address = $_POST["address"];
    	$time = $_POST["time"];
    	$image_medi = $_FILES["image"];

        if(empty($name) && empty($email) && empty($mobile) && empty($address) && empty($time) && empty($image_medi["name"])){
            $_SESSION["msg"] = "Please fill all the details to Order";
            header("location:user_dashboard.php");
            exit();
        }else{
            $sql = "SELECT * FROM users WHERE username ='$username'";
            $result = mysqli_query($conn,$sql);
            if($result){
                $num = mysqli_num_rows($result);
                if($num>0)
                {
                    $imagename = $image_medi["name"];
                    $imagepath = $image_medi["tmp_name"];
                    $filenameseparate = explode('.',$imagename);
                    $file_extension = strtolower($filenameseparate[1]);
                    $extention = array('jpeg','jpg','png');
        
                    if(in_array($file_extension,$extention)){
 
                        $upload = "image/".$imagename;
                        move_uploaded_file($imagepath,$upload);
                        $sql = "INSERT INTO prescription (username,name,email,mobile,address,time,image) VALUES ('$username','$name','$email','$mobile','$address','$time','$upload')";
                        $result = mysqli_query($conn,$sql);
                        if($result){
                            $_SESSION["msgsccuess"] = "Your Order Has been successfully placed";
                            header("location:user_dashboard.php");
                            exit();
                        }else{
                            $_SESSION["msg"] = " Something went Wrong!!!";
                            header("location:user_dashboard.php");
                            exit();
                        }
                    }else{
                        $_SESSION["msg"] = " Invalid Format Image";
                            header("location:user_dashboard.php");
                            exit();
                    }
                   
                }else{
                        $_SESSION["msg"] = "Incorrect Username";
                        header("location:user_dashboard.php");
                        exit();
                }
            }
        }
        
        mysqli_close($conn);
}

?>

