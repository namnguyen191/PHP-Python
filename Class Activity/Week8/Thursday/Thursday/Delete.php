<?php
$host = "localhost";
$user = "root";
$password = "";
$dbName = "Week8-VuHoangNamNguyen";

$con = mysqli_connect($host, $user, $password, $dbName)
or die("Connection is failed");
$username = mysqli_real_escape_string($con, $_POST['username']);

$query = "DELETE FROM userlogin
          WHERE username = '$username'";
$result = mysqli_query($con, $query) or die("Query is failed! " . mysqli_error($con));
if(mysqli_affected_rows($con)>0){
    echo "User Deleted";
} else {
    echo "No user found";
}




mysqli_close($con);