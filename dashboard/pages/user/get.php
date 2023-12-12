<?php  


$con = new mysqli("localhost","root","","portfolio");
if (mysqli_connect_errno()){
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$query = "SELECT * FROM user_info";
$result = $con -> query($query);

$data = [];

while ($row = $result->fetch_assoc()){
    $data [] = $row;
}



?>