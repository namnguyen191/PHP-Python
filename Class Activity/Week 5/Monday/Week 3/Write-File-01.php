<?php
//Create a program which add a new phone number to the file
//1. Open
$myFile = fopen('myPhoneBook','a');
$myData = "888111222";
//2. Write
fwrite($myFile, $myData);
//3. Close
fclose($myFile);