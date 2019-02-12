<?php
if(isset($_POST["proNo"]) && isset($_POST["feedback"]) && !empty($_POST["proNo"]) && !empty($_POST["feedback"])){
    $proNo = htmlspecialchars($_POST["proNo"]);
    $proType = $_POST["proType"];
    $feedback = htmlspecialchars($_POST["feedback"]);
    echo "Product No: $proNo.<br>Product Type: $proType<br>Customer feedback: $feedback";
    $myFile = fopen('VuHoangNamNguyen-S2.txt', "a") or die("Unable to open file!");
    fwrite($myFile,"ProductNo:$proNo, ProductType:$proType, Feedback:$feedback\n");
    fclose($myFile);
} else {
    echo "Please fill in all fields!";
}