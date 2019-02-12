<?php
session_start();
if(isset($_SESSION["Ticket"])){
    $host = "localhost";
    $user = "root";
    $password = "";
    $dbName = "Week8-VuHoangNamNguyen";

    $con = mysqli_connect($host, $user, $password, $dbName)
    or die("Connection is failed");
    $query = "SELECT * FROM userlogin";
    $result = mysqli_query($con, $query) or die("Query is failed! " . mysqli_error($con));
    echo "<table border='1'>
                <th>User Name:</th>
                <th>Password</th>
                <th>Email</th>";
    while ($row = mysqli_fetch_row($result)) {
        echo "<tr>
                    <td>$row[0]</td>
                    <td>$row[1]</td>
                    <td>$row[2]</td>
                  </tr>";
    }
    echo "</table>";
    session_destroy();

    mysqli_close($con);
} else {
    echo "Access Denied";
}
