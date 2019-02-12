<?php
$host = "localhost";
$user = "root";
$password = "";
$dbName = "incident_report_system_db";
$Incident_report_id = '';
$Email = '';
$Category_id ='';
$Description ='';
$Level_of_urgency ='';
$Location = '';
$Date_time = '';

$con = mysqli_connect($host, $user, $password, $dbName)
or die("Connection is failed");
// Insert
if(isset($_POST['INSERT'])){
    $Email = htmlspecialchars($_POST['email']);
    $Category_id = htmlspecialchars($_POST['category_id']);
    $Description = htmlspecialchars($_POST['description']);
    $Level_of_urgency = htmlspecialchars($_POST['level_of_urgency']);
    $Location = htmlspecialchars($_POST['location']);
    $Date_time = htmlspecialchars($_POST['date_time']);
    $query = "Insert Into incident_reports Values('$Incident_report_id','$Email','$Category_id','$Description','$Level_of_urgency',' $Location','$Date_time')";
    $result = mysqli_query($con, $query)or die ("query is failed" . mysqli_error($con));

    if (mysqli_affected_rows($con) > 0){
        echo "<h3>You have inserted row</h3><br><br>";
    }
    else {
        echo "<h3>You have not inserted any rows</h3><br><br>";
    }
}

$query_selectall_incident_reports = "Select * from incident_reports ";
$result_selectall_incident_reports = mysqli_query($con, $query_selectall_incident_reports) or die ("query is failed" . mysqli_error($con));
echo "<table class=\"table table-bordered\">";
echo "<thead><tr><th  scope='col'>Inident Report ID </th><th  scope='col'>Email</th><th  scope='col'>Category ID</th><th  scope='col'>Description</th><th  scope='col'>Level of Urgency</th><th  scope='col'>Location</th><th  scope='col'>Data & Time</th></tr></thead>";
while (($row = mysqli_fetch_row($result_selectall_incident_reports )) == true) {
    echo "<tbody><tr><td>$row[0]</td><td>$row[1]</td><td>$row[2]</td><td>$row[3]</td><td>$row[4]</td><td>$row[5]</td><td>$row[6]</td></tr></tbody>";
}
echo "</table><br><br>";

// Select user_email output
$query_select_incident_reports = "Select * from incident_reports WHERE user_email='$Email' ";
$result_select_incident_reports = mysqli_query($con, $query_select_incident_reports) or die ("query is failed" . mysqli_error($con));
echo "<table class=\"table table-bordered\">";
echo "<thead><tr><th  scope='col'>Inident Report ID </th><th  scope='col'>Email</th><th  scope='col'>Category ID</th><th  scope='col'>Description</th><th  scope='col'>Level of Urgency</th><th  scope='col'>Location</th><th  scope='col'>Data & Time</th></tr></thead>";
while (($row = mysqli_fetch_row($result_select_incident_reports )) == true) {
    echo "<tbody><tr><td>$row[0]</td><td>$row[1]</td><td>$row[2]</td><td>$row[3]</td><td>$row[4]</td><td>$row[5]</td><td>$row[6]</td></tr></tbody>";
}
echo "</table><br><br>";

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Incident Reports Management</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<div class="card text-center">
    <div class="card-header">
        <ul class="nav nav-tabs card-header-tabs">
            <li class="nav-item">
                <a class="nav-link active" href="Guest_Incident_reports.php">Guest Incident Reports </a>
            </li>
        </ul>
    </div>
    <div class="card-body">
        <h1 class="card-title">Guest Incident Reports </h1>
    </div>
</div>
<br><br>
<form method="post" align="center">
    <div class="form-inline">
        <label>Email:</label>
        <input type="text" name="email" class ="form-control" value="<?php echo $Email ?>" required> <br><br>
    </div>
    <div class="form-inline">
        <label>Category ID:</label>
        <select name="category_id"class ="form-control" required>
        <option value="">None</option>
        <?php
        $query_select_incident_categories = "SELECT * FROM incident_categories";
        $result_select_incident_categories = mysqli_query($con, $query_select_incident_categories);
        while ($row = mysqli_fetch_array($result_select_incident_categories)){
        echo "<option value=$row[0]> ".$row[0]." -- ".$row[1]."</option>";
        }
        ?>
        </select><br><br>
    </div>
    <div class="form-inline">
<label>Description:</label>
<textarea rows="4" cols="50" name="description" class ="form-control" required></textarea><br><br>
    </div>
    <div class="form-inline">
<label>Level of Urgency:</label>
<select name="level_of_urgency" class ="form-control" required>
    <option value="">None</option>
    <option value="Low">Low</option>
    <option value="Medium">Medium</option>
    <option value="High">High</option>
    <option value="Critical">Critical</option>
</select><br><br>
    </div>
    <div class="form-inline">
<label>Location:</label>
<input type="text" name="location" class ="form-control" required><br><br>
    </div>
    <div class="form-inline">
<label>Date & Time:</label>
<input type="datetime-local" name="date_time" class ="form-control" required><br><br>
    </div>
<input type="submit" class="btn btn-primary" name="INSERT" value="Send">
</form>
</body>
</html>


