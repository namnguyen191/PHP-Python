<?php
$myFile = fopen("myDataFile.txt", "r") or die("Unable to open file");
while(!feof($myFile)){
    echo fgetc($myFile)."<br>";
}
fclose($myFile);