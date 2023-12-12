<?php
session_start();

require("../../../db.php");

if(isset($_GET["delete"])){
   $id = $_GET["delete"];
   $delete = $con->query("DELETE FROM about_us WHERE id=$id") ;

   if($delete){
    $_SESSION['success'] = true;

    header('location:../admin.php?page=about');
}
}


?>