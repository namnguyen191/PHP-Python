<?php
//1. Open The File
$myFile = fopen('myPhoneBook','r');
//2. Read Data
$myData = fread($myFile, filesize('myPhoneBook'));
echo $myData;
//3. Close The File
fclose($myFile);