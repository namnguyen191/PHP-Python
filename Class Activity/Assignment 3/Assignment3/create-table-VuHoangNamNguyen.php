<?php

$host = "localhost";
$user = "root";
$password = "";
$dbName = "As3-VuHoangNamNguyen";

$con = mysqli_connect($host, $user, $password, $dbName)
or die("Connection is failed");

$query ="
    CREATE TABLE EMP(EmpNo VARCHAR(5) PRIMARY KEY,
                     EmpName VARCHAR(25),
                     Department VARCHAR(15),
                     EmpJob VARCHAR(20))
";
$result = mysqli_query($con, $query);
if($result)
    echo "Query is successfull!";
else
    echo "Query is failed! ".mysqli_error($con);

mysqli_close($con);