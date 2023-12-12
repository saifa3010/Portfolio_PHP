<?php

session_start();
require("../../../db.php");

if(isset($_GET["delete"])){
   $id = $_GET["delete"];
   $delete = $con->query("DELETE FROM home WHERE id=$id") ;

   if($delete){
    $_SESSION['success'] = true;

    header('location:../admin.php?page=home');}
}


?>