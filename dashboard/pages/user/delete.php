<?php


// $con = new mysqli("localhost","root","","portfolio");
// if (mysqli_connect_errno()){
//     echo "Failed to connect to MySQL: " . mysqli_connect_error();
// }
session_start();
require("../../../db.php");

if(isset($_GET["delete"])){
   $id = $_GET["delete"];
   $delete = $con->query("DELETE FROM user_info WHERE id=$id") ;

   if($delete){
    $_SESSION['success'] = true;

    header('location:../admin.php?page=user');
}
}


?>