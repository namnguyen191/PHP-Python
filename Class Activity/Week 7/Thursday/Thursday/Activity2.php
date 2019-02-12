<?php
$host = "localhost";
$user = "root";
$password = "";
$dbName = "MyeShop";

$con = mysqli_connect($host, $user, $password, $dbName)
or die("Connection is failed");


$query ="
    SELECT * FROM emp
";
$result = mysqli_query($con, $query) or die("Query is failed! ".mysqli_error($con));
//Process the result
echo "<table border='1'>
        <th>Employee No</th>
        <th>Employee Name</th>
        <th>Job</th>
        <th>Salary</th>
        <th>Hire Date</th>";
while ($row = mysqli_fetch_row($result)){
    echo "<br>  ";
    echo "<tr>
            <td>$row[0]</td>
            <td>$row[1]</td>
            <td>$row[2]</td>
            <td>$row[3]</td>
            <td>$row[4]</td>
          </tr>";
}
echo "</table>";
//Close the connection
mysqli_close($con);