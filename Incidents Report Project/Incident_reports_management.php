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

//Update
if(isset($_POST['UPDATE']))
    if (!empty($Email = htmlspecialchars($_POST['email'])) && !empty($Category_id = htmlspecialchars($_POST['category_id']))&&
        !empty($Category_id = htmlspecialchars($_POST['description']))&& !empty($Category_id = htmlspecialchars($_POST['level_of_urgency']))&&
        !empty($Category_id = htmlspecialchars($_POST['location']))&& !empty($Category_id = htmlspecialchars($_POST['date_time']))) {
        $Email = htmlspecialchars($_POST['email']);
        $Category_id = htmlspecialchars($_POST['category_id']);
        $Description = htmlspecialchars($_POST['description']);
        $Level_of_urgency = htmlspecialchars($_POST['level_of_urgency']);
        $Location = htmlspecialchars($_POST['location']);
        $Date_time = htmlspecialchars($_POST['date_time']);
        $query = "Update incident_reports Set category_id ='$Category_id', description='$Description', level= '$Level_of_urgency',location= '$Location',date_time = '$Date_time' WHERE user_email = '$Email'";
        $result = mysqli_query($con, $query) or die ("query is failed" . mysqli_error($con));
        $Incident_report_id = '';
        $Email = '';
        $Category_id = '';
        $Description = '';
        $Level_of_urgency = '';
        $Location = '';
        $Date_time = '';
        if (mysqli_affected_rows($con) > 0) {
            echo "<h3>You have updated " . mysqli_affected_rows($con) . " row </h3><br><br>";
        } else {
            echo "<h3>You have not updated any rows</h3><br><br>";
        }

    }
    else {
        echo "<h3>Please fill up all fields to update</h3> <br><br>" ;
    }

//Delete
if(isset($_POST['DELETE']))
    if (!empty($Email = htmlspecialchars($_POST['email']))) {
        $Email = htmlspecialchars($_POST['email']);
        $query = "Delete from incident_reports where user_email = '$Email'";
        $result = mysqli_query($con, $query) or die ("query is failed" . mysqli_error($con));
        $Incident_report_id = '';
        $Email = '';
        $Category_id = '';
        $Description = '';
        $Level_of_urgency = '';
        $Location = '';
        $Date_time = '';
        if (mysqli_affected_rows($con) > 0) {
            echo "<h3>You have deleted " . mysqli_affected_rows($con) . " row </h3><br><br>";
        } else {
            echo "<h3>Record not found !! Delete failed</h3><br><br>";
        }
    }
    else {
        echo "<h3>Please fill up Email field to delete </h3><br><br>";
    }

//Find
if(isset($_POST['FIND']))
    if (!empty($Email = htmlspecialchars($_POST['email']))) {
        $Email = htmlspecialchars($_POST['email']);
        $query = "Select * from incident_reports where user_email = '$Email'";
        $result = mysqli_query($con, $query) or die ("query is failed" . mysqli_error($con));
        if (($row = mysqli_fetch_row($result)) == true) {
            $Incident_report_id = $row[0];
            $Email = $row[1];
            $Category_id = $row[2];
            $Description = $row[3];
            $Level_of_urgency = $row[4];
            $Location = $row[5];
            $Date_time = $row[6];
        } else echo "<h3>Record not found !! Find failed</h3><br><br>";
    }
    else {
        echo "<h3>Please fill up Email field to search</h3><br><br>";
    }

$query_selectall_incident_reports = "Select * from incident_reports ";
$result_selectall_incident_reports = mysqli_query($con, $query_selectall_incident_reports) or die ("query is failed" . mysqli_error($con));
echo "<table class=\"table table-bordered\">";
echo "<thead><tr><th scope='col'>Inident Report ID </th><th scope='col'>Email</th><th scope='col'>Category ID</th><th scope='col'>Description</th><th scope='col'>Level of Urgency</th><th scope='col'>Location</th><th scope='col'>Data & Time</th></tr></thead>";
while (($row = mysqli_fetch_row($result_selectall_incident_reports )) == true) {
    echo "<tr><td>$row[0]</td><td>$row[1]</td><td>$row[2]</td><td>$row[3]</td><td>$row[4]</td><td>$row[5]</td><td>$row[6]</td></tr>";
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
                <a class="nav-link active" href="incident_reports_management.php">Incident Reports Management</a>
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
    <label>Email:</label>
    <input type="text" class ="form-control" name="email" value="<?php echo $Email ?>"> <br><br>
    </div>
    <div class="form-inline">
    <label>Category ID:</label>
    <select name="category_id" class ="form-control">
        <option value="">None</option>
        <?php
        $query_select_incident_categories = "SELECT * FROM incident_categories";
        $result_select_incident_categories = mysqli_query($con, $query_select_incident_categories);
        while ($row = mysqli_fetch_row($result_select_incident_categories)) {

            if ($Category_id == $row[0]){
                echo "<option selected value=$row[0]> " . $row[0] . " -- " . $row[1] . "</option>";
            }
            else {
                echo "<option value=$row[0]> " . $row[0] . " -- " . $row[1] . "</option>";
            }

        }

        ?>
    </select><br><br>
    </div>
    <div class="form-inline">
    <label>Description:</label>
    <textarea rows="4" cols="50" name="description" class ="form-control"> <?php echo $Description ?></textarea><br><br>
    </div>
    <div class="form-inline">
    <label>Level of Urgency:</label>
    <select name="level_of_urgency" class ="form-control">
        <option value="">None</option>
        <option <?=($Level_of_urgency == 'Low' ? 'selected=""' : '')?>id="Low" value="Low">Low</option>
        <option <?=($Level_of_urgency == 'Medium' ? 'selected=""' : '')?>id="Medium" value="Medium">Medium</option>
        <option <?=($Level_of_urgency == 'High' ? 'selected=""' : '')?>id="High" value="High">High</option>
        <option <?=($Level_of_urgency == 'Critical' ? 'selected=""' : '')?>id="Critical" value="Critical">Critical</option>
    </select><br><br>
    </div>
    <div class="form-inline">
    <label>Location:</label>
    <input type="text" name="location" class ="form-control" value="<?php echo $Location  ?>"><br><br>
    </div>
    <div class="form-inline">
    <label>Date & Time:</label>
    <input type="datetime-local" name="date_time" class ="form-control" value="<?php echo  $Date_time ?>"><br><br>
    </div>
    <input type="submit"  class="btn btn-primary" value="Find" name="FIND" />
    <input type="submit"  class="btn btn-primary" value="Update" name="UPDATE" />
    <input type="submit"  class="btn btn-primary" value="Delete" name="DELETE" />


</form>
</body>
</html>
