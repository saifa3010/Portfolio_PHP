<?php

session_start();

require("../../../db.php");



if($_SERVER["REQUEST_METHOD"] == "POST"){
        if($_POST['submit']){ 
            $certificates = stripslashes($_REQUEST['certificates']);
            $certificates = mysqli_real_escape_string($con, $certificates);
            $enterprise = stripslashes($_REQUEST['enterprise']);
            $enterprise = mysqli_real_escape_string($con, $enterprise);
            $description = stripslashes($_REQUEST['description']);
            $description = mysqli_real_escape_string($con, $description);
            $start_date = stripslashes($_REQUEST['start_date']);
            $start_date = mysqli_real_escape_string($con, $start_date);
            $end_date = stripslashes($_REQUEST['end_date']);
            $end_date = mysqli_real_escape_string($con, $end_date);

        
        
     



   
    
        $query = mysqli_query($con, "SELECT * FROM education WHERE certificates= '$certificates'");
        if (mysqli_num_rows($query) > 0) {
            echo "<h1 style='margin-left: 500px;'>Already exists</h1>";
        } else {
            $insert = mysqli_query($con, "INSERT INTO education (certificates, enterprise, description,start_date,end_date) 
                           VALUES ('$certificates', '$enterprise', '$description','$start_date','$end_date')");
            
            if ($insert) {
                $_SESSION['success'] = true;

                header('location:../admin.php?page=edu');
                } else {
                echo "<h1 style='margin-left: 500px;'>Error inserting data: " . mysqli_error($con) . "</h1>";
            }
        }


}
}

?>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

<link rel="stylesheet" href="style.css">

</head>



<body>



<div class="container mt-3 mb-3">
    <form method="POST" enctype="multipart/form-data">

        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">certificates</label>
            <input type="text" name="certificates" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                 >
        </div>
        
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">enterprise</label>
            <input type="text" name="enterprise" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                 >
        </div>
       
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Description</label>
            <input type="text" name="description" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                 >
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Start Date</label>
            <input type="number" name="start_date" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                 >
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">End Date</label>
            <input type="number" name="end_date" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                 >
        </div>
       
        <div><input class="btn btn-primary" style="width: 300px;" type="submit" name="submit" value="Submit"></div>
    </form>
</div>

</body>
</html>