<?php


require("../../../db.php");

if(isset($_GET["delete"])){
   $id = $_GET["delete"];
   $delete = $con->query("DELETE FROM projects WHERE id=$id") ;

   if($delete){
    header('location:../admin.php?page=project');
}
}


?>