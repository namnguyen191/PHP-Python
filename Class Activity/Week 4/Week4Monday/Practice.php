<?php
function TAX($price){
    $tax_amount = $price*0.13;
    return $tax_amount;
}
$myPrice = 100;
$totalPrice = $myPrice + TAX($myPrice);
echo $totalPrice;
echo "<hr width=50% align=left>";
