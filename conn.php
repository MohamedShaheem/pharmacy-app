<?php
$db_server = "localhost";
$db_username = "root";
$db_password = "";
$db_database = "xitebmedi";


try{
    $conn = mysqli_connect($db_server,$db_username,$db_password,$db_database);

}catch(mysqli_sql_exception){
    echo"Database connection failed";
}

?>