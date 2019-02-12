<?php
if(isset($_COOKIE['mydata'])){
    $mydata = $_COOKIE['mydata'];
    echo $mydata;
} else {
    echo "No Cookie!";
}
