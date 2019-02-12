<?php
$host = "localhost";
$user = "root";
$password = "";
$dbName = "Week8-VuHoangNamNguyen";


$con = mysqli_connect($host, $user, $password, $dbName)
or die("Connection is failed");
$username = mysqli_real_escape_string($con,$_POST['username']);
$pwd = mysqli_real_escape_string($con,$_POST['password']);
$query = "SELECT * FROM userlogin
          WHERE username = '$username'
          AND   password = '$pwd'";
$result = mysqli_query($con, $query) or die("Query is failed! " . mysqli_error($con));
if(mysqli_num_rows($result)==0){
    echo "Login Failed! Wrong Username or Password!";

} else {
    echo "Login Sucessful!";
    header('location:warmup.php');
}


mysqli_close($con);