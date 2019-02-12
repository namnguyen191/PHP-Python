<?php
$myFile = fopen("VuHoangNamNguyen-S2.txt", "r") or die("Unable to open the file!");
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
fclose($myFile);