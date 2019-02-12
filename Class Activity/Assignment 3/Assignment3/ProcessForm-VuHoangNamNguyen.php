<?php
if(empty($_POST['empNo']) || empty($_POST['empName']) ){
    echo "You need to fill up all the form fields";
} else {
    $empNo = $_POST['empNo'];
    $empName = $_POST['empName'];
    $job = $_POST['job'];
    $dep = $_POST['dep'];

    $host = "localhost";
    $user = "root";
    $password = "";
    $dbName = "As3-VuHoangNamNguyen";

    $con = mysqli_connect($host, $user, $password, $dbName)
    or die("Connection is failed");

    $query = "
                INSERT INTO emp VALUES('$empNo', '$empName', '$dep', '$job') 
";
    $result = mysqli_query($con, $query);
    if($result){
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
    } else
        echo "Query is failed! ".mysqli_error($con);
    mysqli_close($con);
}