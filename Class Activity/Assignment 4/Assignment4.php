<?php
// declaring some variables
$host = "localhost";
$user = "root";
$password = "";
$dbName = "Assignment4-VuHoangNamNguyen";
$Name='';
$City='';
$Tel = '';

//Connect to the Server+Select DB
$con = mysqli_connect($host, $user, $password, $dbName)
or die("Connection is failed");

//SAVE
if(isset($_POST['SAVE'])){
    $Name = $_POST['name'];
    $City = $_POST['city'];
    $Tel = $_POST['tel'];
    $query = "Insert Into Info Values('$Name','$City','$Tel')";
    $result = mysqli_query($con, $query);
    if($result)
        echo "New Record Inserted Successfully!";
    else
        echo ("query is failed" . mysqli_error($con));
    $Name='';
    $City='';
    $Tel='';
}
//Update & Edit
if(isset($_POST['UPDATE'])){
    $Name = $_POST['name'];
    $City = $_POST['city'];
    $Tel = $_POST['tel'];
    $query = "Update Info Set city ='$City', tel = '$Tel' where name = '$Name'";
    $result = mysqli_query($con, $query) or die ("query is failed" . mysqli_error($con));
    if(mysqli_affected_rows($con)>0){
        echo "Data Updated Successfully";
    } else
        echo "Fail to Update Record";
    $Name='';
    $City='';
    $Tel='';
}
//Delete
if(isset($_POST['DELETE'])){
    $Name = $_POST['name'];
    $query = "Delete from Info where name = '$Name'";
    $result = mysqli_query($con, $query) or die ("query is failed" . mysqli_error($con));
    if(mysqli_affected_rows($con)>0)
        echo "Data Deleted Successfully";
    else
        echo "Data deleted failed";
    $Name='';
    $City='';
    $Tel='';
}
//Find
if(isset($_POST['FIND'])){
    $Name = $_POST['name'];
    $query = "Select * from Info where name = '$Name'";
    $result = mysqli_query($con, $query) or die ("query is failed" . mysqli_error($con));
    if (($row = mysqli_fetch_row($result)) == true) {
        $Name = $row[0];
        $City = $row[1];
        $Tel = $row[2];
    }
    else echo "record not found";
}
//Retrieve All
$query = "Select * from Info";
$result = mysqli_query($con, $query) or die ("query is failed" . mysqli_error($con));
echo "<table border='1' >";
echo "<tr><th>Name</th><th>City</th><th>Tel</th></tr>";
while (($row = mysqli_fetch_row($result)) == true) {
    echo "<tr><td>$row[0]</td><td>$row[1]</td><td>$row[2]</td></tr>";
}
echo "</table>";

mysqli_close($con);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Search Form</title>
</head>
<body>
<form method="post">
    <p> Enter Name:<input type="text" placeholder="Enter Name" name="name" value="<?php echo $Name ?>" /> </p>
    <p> Enter City:<input type="text" name="city" value="<?php echo $City ?>" /> </p>
    <p> Enter Tel:<input type="text" name="tel" value="<?php echo $Tel ?>" /> </p>
    <input type="submit" value="Update" name="UPDATE" />
    <input type="submit" value="Delete" name="DELETE" />
    <input type="submit" value="Save" name="SAVE" />
    <input type="submit" value="Find" name="FIND" />

</form>
</body>
</html>