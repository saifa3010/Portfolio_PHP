<?php





if($_SERVER["REQUEST_METHOD"] == "POST"){
        if($_POST['submit']){ 
            $link = stripslashes($_REQUEST['link']);
            $link = mysqli_real_escape_string($con, $link);
            $brief = stripslashes($_REQUEST['brief']);
            $brief = mysqli_real_escape_string($con, $brief);
            $imageName = $_FILES['image']['name'];
            $imageTmpName = $_FILES['image']['tmp_name'];
            $imagePath = "../../../uploads/images/" . $imageName;
            move_uploaded_file($imageTmpName, $imagePath);
     


        require("../../../db.php");

   
    
        $query = mysqli_query($con, "SELECT * FROM projects WHERE link= '$link'");
        if (mysqli_num_rows($query) > 0) {
            echo "<h1 style='margin-left: 500px;'>Already exists</h1>";
        } else {
            $insert = mysqli_query($con, "INSERT INTO projects ( link, image ,brief) 
                           VALUES ('$link', '$imagePath','$brief')");
            
            if ($insert) {
                echo "<h1 style='margin-left: 500px;'>Data inserted successfully</h1>";
            } else {
                echo "<h1 style='margin-left: 500px;'>Error inserting data: " . mysqli_error($con) . "</h1>";
            }
        }

        if($_POST['submit']){
            header('location:../admin.php?page=project');
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
            <label for="exampleInputEmail1" class="form-label">link</label>
            <input type="text" name="link"  required>


        </div>

        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Brief</label>
            <input type="text" name="brief"  required>


        </div>
        
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">image</label>
            <input type="file" name="image" id="image" accept="image/*" required>

        </div>
       
        <div><input class="btn btn-primary" style="width: 300px;" type="submit" name="submit" value="Submit"></div>
    </form>
</div>

</body>
</html>