<?php
//Read Form Data
$keyword = $_POST['email'];


    $host = "localhost";
    $user = "root";
    $password = "";
    $dbName = "EventSchedule";

    $con = mysqli_connect($host, $user, $password, $dbName)
    or die("Connection is failed");
    $query ="SELECT * FROM registered WHERE email LIKE '%$keyword%'";
    $result = mysqli_query($con, $query) or die("Query is failed! ".mysqli_error($con));
    echo "The number of rows are: ".mysqli_num_rows($result)."<br>";
    if(mysqli_num_rows($result) == 0){
        echo "The email does not exist!";
    } else {
        echo "<table border='1'>
                <th>Email</th>
                <th>Status</th>
                <th>City</th>";
        while ($row = mysqli_fetch_row($result)){
            echo "<tr>
                    <td>$row[0]</td>
                    <td>$row[1]</td>
                    <td>$row[2]</td>
                  </tr>";
        }
        echo "</table>";
    }



    mysqli_close($con);
