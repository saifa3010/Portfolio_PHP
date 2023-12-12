<?php
session_start();
require("../../../db.php");

$id = $_GET["edit"];
$query = $con->query("SELECT * FROM about_us WHERE id='$id'");
$data = $query->fetch_assoc();

if (!$data) {
    die("User not found");
}

if (isset($_POST['submit'])) {
    $description = stripslashes($_REQUEST['description']);
    $description = mysqli_real_escape_string($con, $description);
    $degree = stripslashes($_REQUEST['degree']);
    $degree = mysqli_real_escape_string($con, $degree);

    // File upload handling for image
    $imageName = $_FILES['image']['name'];
    $imageTmpName = $_FILES['image']['tmp_name'];
    $imagePath = "../../../uploads/images/" . $imageName;
    move_uploaded_file($imageTmpName, $imagePath);

    $query = mysqli_query($con, "UPDATE about_us SET description='$description',
     degree='$degree', image='$imagePath' WHERE id=$id");

    if ($query) {
        $_SESSION['success'] = true;

        header('location:../admin.php?page=about');
    } else {
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
            <label for="exampleInputEmail1" class="form-label">Description</label>
            <input type="text" name="description" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                   value="<?php echo $data['description']; ?>">
        </div>
        <hr>

        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Degree</label>
            <input type="text" name="degree" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                   value="<?php echo $data['degree']; ?>">
        </div>
        <hr>

        

        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Current Image</label>
            <img src="<?php echo $data['image']; ?>" alt="Current Image" style="max-width: 200px;">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Image</label>
             <input type="file" name="image" id="image" accept="image/*" required
             value="<?php echo "images/" . $row['image']; ?>">

        </div>
       
        <div><input class="btn btn-primary" style="width: 300px;" type="submit" name="submit" value="Submit"></div>
    </form>
</div>
</div>

</body>
</html>