<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Assignment 3</title>
</head>
<body>
<form method="post">
    Emp Number:<input type="text" name="empNo"><br><br>
    Emp Name: <input type="text" name="empName"><br><br>
    Job Title:
    <select name="job">
        <option value="Programmer">Programmer</option>
        <option value="Database Admin">Database Admin</option>
        <option value="Tech Support">Tech Support</option>
        <option value="Manager">Manager</option>
    </select>
    <br>
    <br>
    Department
    <input type="radio" name="dep" value="IT" checked>IT
    <input type="radio" name="dep" value="Financial">Financial
    <input type="radio" name="dep" value="Sale">Sale
    <br>
    <br>
    <input type="submit" value="Register">
    <br>
    <br>
</form>
</body>
</html>

<?php

$host = "localhost";
$user = "root";
$password = "";
$dbName = "As3-VuHoangNamNguyen";

$con = mysqli_connect($host, $user, $password, $dbName)
or die("Connection is failed");
if(isset($_POST['empNo']) && isset($_POST['empName']) && isset($_POST['job']) && isset($_POST['dep'])){
    if(empty($_POST['empNo']) || empty($_POST['empName']) ){
        echo "You need to fill up all the form fields";
    } else {
        $empNo = $_POST['empNo'];
        $empName = $_POST['empName'];
        $job = $_POST['job'];
        $dep = $_POST['dep'];

        $query = "
                INSERT INTO emp VALUES('$empNo', '$empName', '$dep', '$job') 
";
        $result = mysqli_query($con, $query) or die("Query is failed! ".mysqli_error($con));
    }
}
$query ="SELECT * FROM emp";
$result = mysqli_query($con, $query) or die("Query is failed! ".mysqli_error($con));
echo "<table border='1'>
        <th>Emp Number</th>
        <th>Emp Name</th>
        <th>Job Title</th>
        <th>Department</th>";
while ($row = mysqli_fetch_row($result)){
    echo "<tr>
                    <td>$row[0]</td>
                    <td>$row[1]</td>
                    <td>$row[2]</td>
                    <td>$row[3]</td>
                  </tr>";
}
echo "</table>";

mysqli_close($con);
?>