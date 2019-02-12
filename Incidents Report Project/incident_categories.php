<?php
$host = "localhost";
$user = "root";
$password = "";
$dbName = "incident_report_system_db";
$Incident_categories_id = '';
$Incident_categories_name = '';

$con = mysqli_connect($host, $user, $password, $dbName)
or die("Connection is failed");
// INSERT
if(isset($_POST['SAVE']))
    if(!empty(htmlspecialchars($_POST['incident_categories_name']))) {
        $Incident_categories_id = htmlspecialchars($_POST['incident_categories_id']);
        $Incident_categories_name = htmlspecialchars($_POST['incident_categories_name']);

        $query = "Insert Into incident_categories Values('$Incident_categories_id','$Incident_categories_name')";
        $result = mysqli_query($con, $query) or die ("query is failed" . mysqli_error($con));
        $Incident_categories_id = '';
        $Incident_categories_name = '';
        if (mysqli_affected_rows($con) > 0) {
            echo "<h3>You have inserted row</h3><br><br>";
        } else {
            echo "<h3>You have not inserted any rows</h3>";
        }
    }
    else {
        echo "<h3>Please fill up Incident Category Name to insert</h3><br><br>";
    }


//UPDATE
if(isset($_POST['UPDATE']))
    if(!empty(htmlspecialchars($_POST['incident_categories_id'])) && !empty(htmlspecialchars($_POST['incident_categories_name']))) {
        $Incident_categories_id = htmlspecialchars($_POST['incident_categories_id']);
        $Incident_categories_name = htmlspecialchars($_POST['incident_categories_name']);
        $query = "Update incident_categories Set id ='$Incident_categories_id', name ='$Incident_categories_name' where id = '$Incident_categories_id'";
        $result = mysqli_query($con, $query) or die ("query is failed" . mysqli_error($con));
        $Incident_categories_id = '';
        $Incident_categories_name = '';
        if (mysqli_affected_rows($con) > 0) {
            echo "<h3>You have updated " . mysqli_affected_rows($con) . " row</h3><br><br>";
        } else {
            echo "<h3>You have not updated any rows</h3><br><br>";
        }

    }
    else {
        echo "<h3>Please fill up all fields to update </h3><br><br>";
    }

//Find
if(isset($_POST['FIND']))
    if(!empty(htmlspecialchars($_POST['incident_categories_id']))) {
        $Incident_categories_id = htmlspecialchars($_POST['incident_categories_id']);
        $query = "Select * from incident_categories where id = '$Incident_categories_id'";
        $result = mysqli_query($con, $query) or die ("query is failed" . mysqli_error($con));
        if (($row = mysqli_fetch_row($result)) == true) {
            $Incident_categories_id = $row[0];
            $Incident_categories_name = $row[1];
        } else echo "<h3>record not found</h3><br><br>";
    }
    else {
        echo "<h3>Please fill up Incident Category ID field to search </h3><br><br> ";
    }

//Retrieve All

$query = "Select * from incident_categories";
$result = mysqli_query($con, $query) or die ("query is failed" . mysqli_error($con));
echo "<table class=\"table table-bordered\">";
echo "<thead><tr><th scope='col'> Incident Category ID</th><th scope='col'> Incident Category Name</th></tr></thead>";
while (($row = mysqli_fetch_row($result)) == true) {
    echo "<tbody><tr><td>$row[0]</td><td>$row[1]</td></tr></tbody>";
}
echo "</table><br><br>";

mysqli_close($con);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Incident Categories Management</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</head>
<body>
<div class="card text-center">
    <div class="card-header">
        <ul class="nav nav-tabs card-header-tabs">
            <li class="nav-item">
                <a class="nav-link active" href="incident_categories.php">Incident Categories Management</a>
            </li>
            <li class="nav-item">
                <a class="nav-link " href="Admin_Page.php">Admin Page</a>
            </li>
        </ul>
    </div>
    <div class="card-body">
        <h1 class="card-title">Incident Categories Management</h1>
    </div>
</div>
<br><br>

<form method="post" align="center">
    <div class="form-inline">
    <label> Incident Category ID: </label>
    <input type="text" class ="form-control" name="incident_categories_id" value="<?php echo $Incident_categories_id ?>"><br><br>
    </div>
    <div class="form-inline">
    <label> Incident Category Name: </label>
    <input type="text" class ="form-control" name="incident_categories_name" value="<?php echo $Incident_categories_name ?>" ><br><br>
    </div>
    <input type="submit"  class="btn btn-primary" value="Save" name="SAVE" />
    <input type="submit" class="btn btn-primary" value="Find" name="FIND" />
    <input type="submit" class="btn btn-primary" value="Update" name="UPDATE" />

</form>
</div>
</body>
</html>
