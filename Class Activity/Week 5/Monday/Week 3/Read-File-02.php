<?php
$read = file('myPhoneBook');
foreach ($read as $line){
    echo $line."<br>";
}
echo "The file size is: ".filesize('myPhoneBook')."<br>";