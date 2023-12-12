<?php
session_start();
require("../../../db.php");


    $id=$_GET["edit"];
    $query = $con -> query("SELECT * from experience where id= '$id'");
    $data = $query->fetch_assoc();

    if (!$data) {
        die("User not found");
    }



if(isset($_POST['submit'])){
    $position = stripslashes($_REQUEST['position']);
    $position = mysqli_real_escape_string($con, $position);
    $company = stripslashes($_REQUEST['company']);
    $company = mysqli_real_escape_string($con, $company);
    $description = stripslashes($_REQUEST['description']);
    $description = mysqli_real_escape_string($con, $description);
    $start_date = stripslashes($_REQUEST['start_date']);
    $start_date = mysqli_real_escape_string($con, $start_date);
    $end_date = stripslashes($_REQUEST['end_date']);
    $end_date = mysqli_real_escape_string($con, $end_date);


   
    
        $query=mysqli_query($con,"UPDATE experience SET id='$id', position='$position'
        ,company='$company'
        ,description='$description',start_date='$start_date',end_date='$end_date' WHERE id=$id ");
        if($query){
            $_SESSION['success'] = true;

            header('location:../admin.php?page=exp');          
        }else {
            echo "Error updating user: " . mysqli_error($con);
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
            <label for="exampleInputEmail1" class="form-label">position</label>
            <input type="text" name="position" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                   value="<?php echo $data['position']; ?>">
        </div>

        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">company</label>
            <input type="text" name="company" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                   value="<?php echo $data['company']; ?>">
        </div>

        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Description</label>
            <input type="text" name="description" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                   value="<?php echo $data['description']; ?>">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Start Date</label>
            <input type="number" name="start_date" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                   value="<?php echo $data['start_date']; ?>">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">End Date</label>
            <input type="number" name="end_date" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                   value="<?php echo $data['end_date']; ?>">
        </div>

        
       
        <div><input class="btn btn-primary" style="width: 300px;" type="submit" name="submit" value="Submit"></div>
    </form>
</div>
</div>

</body>
</html>