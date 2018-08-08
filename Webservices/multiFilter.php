<?php

include 'dbconn.php';
$additional_filters_2 = "";
$additional_filters = "";
$additional_filters2 = "";
$additional_filters3 = "";
$additional_filters4 = "";

//need items like shoes etc.
//need gender $_GET from session too

if (isset($_GET['priceType'])) {
    $priceType = $_GET['priceType'];
    $additional_filters_2 = "`itemfilter`.`itemfilter_price_amount` " . $priceType;
} else {
    $additional_filters_2 = "`item_filter`.`itemfilter_name`";
}

if (isset($_GET['brands'])) {
    $brands = $_GET['brands'];
    $additional_filters = "WHERE `item_filter`.`itemfilter_brand` like '%$brands%' ";
}

if (isset($_GET['color'])) {
    $color = $_GET['color'];
    $additional_filters2 . "WHERE `item_filter`.`itemfilter_color` like '%$color%' ";
}

if (isset($_GET['condition'])) {
    $condition = $_GET['condition'];
    $additional_filters3 . "WHERE `item_filter`.`itemfilter_condition` like '%$condition%' ";
}

if (isset($_GET['merchant_name'])) {
    $merchant = $_GET['merchant_name'];
    $additional_filters4 . "WHERE `merchant`.`merchant_name` like '%$merchant%' ";
}

$query = "SELECT * FROM `item_filter` INNER JOIN `merchant` ON `merchant`.`merchant_id`=`item_filter`.`merchant_id` " . $additional_filters . $additional_filters2 . $additional_filters3 . $additional_filters4 . " ORDER BY `merchant`.`featured_merchant` DESC, " . $additional_filters_2;
$result = mysqli_query($link, $query);

while ($row = mysqli_fetch_assoc($result)) {
    $items[] = $row;
}
mysqli_close($link);
echo json_encode($items);
