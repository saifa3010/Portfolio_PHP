
<?php
require('../../db.php');
session_start();


if (isset($_POST['submit'])) {
    $email = stripslashes($_REQUEST['email']);
    $email = mysqli_real_escape_string($con, $email);
    $password = stripslashes($_REQUEST['password']);
    $password = mysqli_real_escape_string($con, $password);

    $query = "SELECT * FROM `user_info` WHERE email='$email' AND password='$password'";
    $result = mysqli_query($con, $query) or die(mysqli_error($con, $query));

    if ($result) {
        $rows = mysqli_num_rows($result);

        if ($rows == 1) {
            // Authentication successful
            $user = mysqli_fetch_assoc($result);

            // Start a session (if not started already)
            if (session_status() == PHP_SESSION_NONE) {
                session_start();
            }

            // Store user information in session (optional, but useful for future use)
            $_SESSION['user_id'] = $user['user_id'];
            $_SESSION['email'] = $user['email'];

            // Redirect to admin.php
            header("Location: admin.php?page=user");
            exit();
        } else {
            echo "Incorrect email or password";
        }
    } else {
        echo "Query failed";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../../portefolio/style1.css">
</head>
<body>
    <form class="form" method="post" name="login">
        <h1 class="login-title">Login</h1>
        <input type="email" class="login-input" name="email" placeholder="email" autofocus="true"/>
        <input type="password" class="login-input" name="password" placeholder="Password"/>
        <input type="submit" value="Login" name="submit" class="login-button"/>
    </form>
    <!-- Add additional HTML content or scripts as needed -->
</body>
</html>