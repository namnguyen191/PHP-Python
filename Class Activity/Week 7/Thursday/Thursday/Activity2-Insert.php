<?php
$empNo = $_POST['empNo'];
$empName = $_POST['empName'];
$job = $_POST['job'];
$salary = $_POST['salary'];
$date = $_POST['date'];
$host = "localhost";
$user = "root";
$password = "";
$dbName = "MyeShop";

$con = mysqli_connect($host, $user, $password, $dbName)
or die("Connection is failed");


$query ="
    INSERT INTO emp VALUES('$empNo','$empName','$job','$salary','$date')
";
$result = mysqli_query($con, $query);
if($result)
    echo "Query is successfull!";
else
    echo "Query is failed! ".mysqli_error($con);

//Close the connection
mysqli_close($con);