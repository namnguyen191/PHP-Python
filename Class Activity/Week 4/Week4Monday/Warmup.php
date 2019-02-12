<?php
$countryAndCapital = array(
    "Vietnam" => "Hanoi",
    "Canada" => "Ottawa",
    "France" => "Paris",
    "U.S" => "Washington DC"
);
ksort($countryAndCapital);
foreach ($countryAndCapital as $country => $capital){
    echo "The capital of $country is $capital.<br>";
}
function displayArray($array){
    foreach ($array as $key => $value){
        echo "$key ==> $value.<br>";
    }
}
echo "<hr width=50% align=left>";
displayArray($countryAndCapital);
echo "<hr width=50% align=left>";
function displayFirstEleOfArray($array){
    return array_values($array)[0];
}
echo displayFirstEleOfArray($countryAndCapital);