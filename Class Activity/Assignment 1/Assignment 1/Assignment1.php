<?php
/**
 * Created by PhpStorm.
 * User: Nam Nam
 * Date: 2018-09-22
 * Time: 12:02 PM
 */
$vehAndPlat = array(
    "Toyota" => "KP8-C951",
    "Mercedes" => "RC9-K505",
    "BMW" => "ZW7-S312",
    "Acura" => "HR4-P301",
    "Infinity" => "YR5-S132",
    "Cadillac" => "SV6-F526"
);
asort($vehAndPlat);
//Question 1
foreach($vehAndPlat as $veh => $plat){
    echo "Vehicle brand: $veh. Plate number: $plat.<br>";
}
//Question 2
foreach(array_values($vehAndPlat) as $key => $value){
    $dis = array_search("$value", $vehAndPlat);
    echo "Vehicle brand: $dis. Plate number: $value.<br>";
}
//Bonus Question
function displayArrayOrderByVal($keyMsg, $valMsg, $ar){
    asort($ar);
    foreach ($ar as $key => $value){
        echo "$keyMsg $key. $valMsg $value.<br>";
    }
}
displayArrayOrderByVal("Vehicle brand:", "Plate number:",$vehAndPlat);
