<?php
//Declaring some variables
$host = "localhost";
$user = "root";
$password = "";
$dbName = "xyzAgency";

//Connect to the Server and Select Database
$con = mysqli_connect($host, $user, $password, $dbName)
    or die("Connection is failed");
echo "<h3>Welcome to my activity: Nam</h3>";

//Formulate Query and Pose the Query
$query ="
    CREATE TABLE info(id VARCHAR(15))
";
$result = mysqli_query($con, $query);
if($result)
    echo "Query is successfull!";
else
    echo "Query is failed! ".mysqli_error($con);

//Close the connection
mysqli_close($con);