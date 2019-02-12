<?php
$custNo = $_POST['custNo'];
$custName = $_POST['custName'];
$custAdd = $_POST['custAdd'];
$host = "localhost";
$user = "root";
$password = "";
$dbName = "MyeShop";

$con = mysqli_connect($host, $user, $password, $dbName)
or die("Connection is failed");


$query ="
    INSERT INTO customer VALUES('$custNo','$custName','$custAdd')
";
$result = mysqli_query($con, $query);
if($result)
    echo "Query is successfull!";
else
    echo "Query is failed! ".mysqli_error($con);

//Close the connection
mysqli_close($con);