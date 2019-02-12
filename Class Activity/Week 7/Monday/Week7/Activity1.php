<?php
//Database program

//Declaring some variables
$host = "localhost";
$user = "root";
$password = "";

//Step 1: Connect to the DB server
$con = mysqli_connect($host,$user,$password);
if(mysqli_connect_errno()){
    echo "Failed to connect to MySQL: ".mysqli_connect_error($con);
}
else
    echo "<h1>Welcome to my DB program</h1>";

//Step 2: Select the Database
$db = mysqli_select_db($con, "xyzAgency");
if($db)
    echo "Database is selected.";
else
    echo "Database isn't found!";
