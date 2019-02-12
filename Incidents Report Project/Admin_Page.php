<?php
$host = "localhost";
$user = "root";
$password = "";
$dbName = "incident_report_system_db";
$Email = '';

$con = mysqli_connect($host, $user, $password, $dbName)
or die("Connection is failed");

if(isset($_POST['email']))
$Email = htmlspecialchars($_POST['email']);

?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Page</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<div class="card text-center">
    <div class="card-header">
        <ul class="nav nav-pills card-header-tabs">
            <li class="nav-item">
                <a class="nav-link active" href="Admin_Page.php">Admin Page</a>
            </li>
            <li class="nav-item">
                <a class="nav-link " href="incident_categories.php">Incident Categories</a>
            </li>
            <li class="nav-item">
                <a class="nav-link " href="incident_reports_management.php">Incident Reports Management</a>
            </li>
        </ul>
    </div>
    <div class="card-body">
        <br><br><h1 class="card-title">Admin Page</h1><br><br>
        <form align="center">
            <div class="form-inline">
                <label>Email:</label>
                <input type="text" class ="form-control" value="<?php echo $Email ?>"><br><br>
            </div>
        </form>
        <a href="incident_categories.php" class="btn btn-primary">Incident Categories</a>
        <a href="incident_reports_management.php" class="btn btn-primary">Incident Reports Management</a>
    </div>
</div>
</body>
</html>


