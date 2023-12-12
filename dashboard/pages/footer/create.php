<?php

session_start();
require("../../../db.php");



if($_SERVER["REQUEST_METHOD"] == "POST"){
        if($_POST['submit']){ 
            $copy_right = stripslashes($_POST['copy_right']);
            $copy_right = mysqli_real_escape_string($con, $copy_right);
            // File upload handling for image
            $imageName = $_FILES['image']['name'];
            $imageTmpName = $_FILES['image']['tmp_name'];
            $imagePath = "../../../uploads/images/" . $imageName;
            move_uploaded_file($imageTmpName, $imagePath);
     



   
    
        $query = mysqli_query($con, "SELECT * FROM footer WHERE copy_right= '$copy_right'");
        if (mysqli_num_rows($query) > 0) {
            echo "<h1 style='margin-left: 500px;'>Already exists</h1>";
        } else {
            $insert = mysqli_query($con, "INSERT INTO footer ( copy_right, image) 
                           VALUES ('$copy_right', '$imagePath')");
            
            if ($insert) {
                $_SESSION['success'] = true;

                header('location:../admin.php?page=footer');              
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
    <label for="exampleInputEmail1" class="form-label">Experience</label>
    <input type="text" name="copy_right" type="text" name="experience" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
         >
</div>
<hr>
  


<div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">image</label>
    <input type="file" name="image" id="image" accept="image/*" required>

</div>
<hr>

<div><input class="btn btn-primary" style="width: 300px;" type="submit" name="submit" value="Submit"></div>
</form>
</div>

</body>
</html>

