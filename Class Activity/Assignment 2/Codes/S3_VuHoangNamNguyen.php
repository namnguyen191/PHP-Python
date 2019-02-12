<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Assignment 2 Webform</title>
</head>
<body>
<form method="POST">
    <label for="proNo">Product No:</label>
    <input type="text" name="proNo" id="proNo">
    <br>
    <br>
    <label>Product Type:</label>
    <input type="radio" name="proType" value="Laptop" checked="true">Laptop
    <input type="radio" name="proType" value="Printer">Printer
    <input type="radio" name="proType" value="PC">PC
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
        echo "Product No: $proNo.<br>Product Type: $proType<br>Customer feedback: $feedback";
        $myFile = fopen('VuHoangNamNguyen-S2.txt', "a") or die("Unable to open file!");
        fwrite($myFile, "ProductNo:$proNo, ProductType:$proType, Feedback:$feedback\n");
        fclose($myFile);
    } else {
        echo "Please fill in all fields!";
    }
}
?>