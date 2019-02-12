<?php
$myFile = fopen("myDataFile.txt", "r") or die("Unable to open file");
$count = 0;
while(!feof($myFile)){
    if(fgetc($myFile)=="C") $count++;
}
echo "There are ".$count." C in the file.";
fclose($myFile);