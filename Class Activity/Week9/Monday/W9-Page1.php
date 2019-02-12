<?php
$mydata = '123';
setcookie("mydata", $mydata, time()+3600);
header('location: W9-Page2.php');