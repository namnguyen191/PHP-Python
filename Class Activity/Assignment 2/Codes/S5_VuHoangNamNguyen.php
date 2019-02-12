<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Assignment 2 Webform</title>
</head>
<body>
<form method="POST" style=" margin: 10px;">
    <label for="proNo">Product No:</label>
    <input type="text" name="proNo" id="proNo">
    <br>
    <br>
    <label>Product Type:</label>
    <input type="radio" name="proType" value="Laptop" checked="true" id="proType1"><label for="proType1">Laptop</label>
    <input type="radio" name="proType" value="Printer" id="proType2"><label for="proType2">Printer</label>
    <input type="radio" name="proType" value="PC" id="proType3"><label for="proType3">PC</label>
    <br>
    <br>
    <label for="feedback">Customer feedback:</label>
    <br>
    <textarea id="feedback" name="feedback" rows="4" cols="50"></textarea>
    <br>
    <br>
    <input type="submit" value="Submit your feedback">
</form>
</body>
</html>

<?php
if(isset($_POST["proNo"]) && isset($_POST["feedback"])) {
    if (!empty($_POST["proNo"]) && !empty($_POST["feedback"])) {
        $proNo = htmlspecialchars($_POST["proNo"]);
        $proType = $_POST["proType"];
        $feedback = htmlspecialchars($_POST["feedback"]);
        echo "<div style='margin: 10px;'>
                Product No: $proNo.<br>Product Type: $proType<br>Customer feedback: $feedback<br>
                </div>";
        $myFile = fopen('VuHoangNamNguyen-S2.txt', "a") or die("Unable to open file!");
        fwrite($myFile, "ProductNo:$proNo, ProductType:$proType, Feedback:$feedback\n");
        fclose($myFile);
    } else {
        echo "<div style='margin: 10px;'>
                
        <h3 style='color: red;'>Please fill in all fields!</h3>
        </div>";
    }
}
$myFile = fopen("VuHoangNamNguyen-S2.txt", "r") or die("Unable to open the file!");
echo "<div style=\"margin:10px;\">

<h3>All Customer Feedbacks:</h3> <br>";
while(!feof($myFile)){
    if(fgetc($myFile)==","){
        while(!feof($myFile)){
            if(fgetc($myFile)==","){
                echo fgets($myFile)."<br>";
                break;
            }
        }
    }
}
echo "</div>";
fclose($myFile);
?>