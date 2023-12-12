<?php

session_start();
require("../../../db.php");


    $id=$_GET["edit"];
    $query = $con -> query("SELECT * from user_info where id= '$id'");
    $data = $query->fetch_assoc();

    if (!$data) {
        // Handle error, perhaps redirect to an error page
        die("User not found");
    }



if(isset($_POST['submit'])){

        $username = stripslashes($_REQUEST['username']);
        $username = mysqli_real_escape_string($con, $username);
        $email = stripslashes($_REQUEST['email']);
        $email = mysqli_real_escape_string($con, $email);
        $address = stripslashes($_REQUEST['address']);
        $address = mysqli_real_escape_string($con, $address);
        $phone = stripslashes($_REQUEST['phone']);
        $phone = mysqli_real_escape_string($con, $phone);
        $age = stripslashes($_REQUEST['age']);
        $age = mysqli_real_escape_string($con, $age);
        $experience = stripslashes($_REQUEST['experience']);
        $experience = mysqli_real_escape_string($con, $experience);
       



       
   
    
        $query=mysqli_query($con,"UPDATE user_info SET id='$id', username='$username',email='$email',
        address='$address',phone='$phone',age='$age',experience='$experience' WHERE id=$id ");
        if($query){
            $_SESSION['success'] = true;

            header('location:../admin.php?page=user');
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
    <form method="POST">

        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Username</label>
            <input type="text" name="username" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                   value="<?php echo $data['username']; ?>">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Email</label>
            <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                   value="<?php echo $data['email']; ?>">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Address</label>
            <input type="text" name="address" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                   value="<?php echo $data['address']; ?>">
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Phone</label>
            <input type="text" name="phone" class="form-control" id="exampleInputPassword1"
                   value="<?php echo $data['phone']; ?>">
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Age</label>
            <input type="number" name="age" class="form-control" id="exampleInputPassword1"
                   value="<?php echo $data['age']; ?>">
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Experience</label>
            <input type="number" name="experiment" class="form-control" id="exampleInputPassword1"
                   value="<?php echo $data['experience']; ?>">
        </div>
        <div><input class="btn btn-primary" style="width: 300px;" type="submit" name="submit" value="Submit"></div>
    </form>
</div>

</body>
</html>