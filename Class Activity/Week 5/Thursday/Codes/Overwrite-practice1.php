<?php
$myFile = fopen("myDataFile.txt","w") or die("Unable to open the file!");
$myData = "CPAN-206";
fwrite($myFile, $myData);
fclose($myFile);