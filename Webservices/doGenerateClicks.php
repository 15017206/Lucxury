<?php
include './dbconn.php';
session_start();

$item_id = $_GET["item_id"];
// 1. take entire row of itemfilter to item table
$query1 = "SELECT * FROM `item_filter` WHERE `itemfilter_id` = '$item_id'";

$result1 = mysqli_query($link, $query1);

while ($row = mysqli_fetch_assoc($result1)) {
    $item = $row;
}

$itemfilter_id = $item["itemfilter_id"];
$merchant_id = $item["merchant_id"];
$itemfilter_name = $item["itemfilter_name"];
$itemfilter_price_currency = $item["itemfilter_price_currency"];
$itemfilter_price_amount = $item["itemfilter_price_amount"];
$itemfilter_brand = $item["itemfilter_brand"];
$itemfilter_color = $item["itemfilter_color"];
$itemfilter_condition = $item["itemfilter_condition"];
$itemfilter_category = $item["itemfilter_category"];
$itemfilter_more_info_url = $item["itemfilter_more_info_url"];
$itemfilter_image_url = $item["itemfilter_image_url"];

// 2. check if there is item id in item table. If there isnt, then add it

$query1b = "SELECT * FROM `item_click` WHERE `item_id`='$item_id'";
$result1b = mysqli_query($link, $query1b);

if (!$row1b = mysqli_fetch_assoc($result1b)) {
    $item1b = $row1b["item_id"];

    $query2 = "INSERT INTO `item_click` (`item_id`, `merchant_id`, `item_name`, `item_price_currency`, `item_price_amount`, `item_brand`, `item_color`, `item_condition`, `item_category`, `item_more_info_url`, `item_image_url`) VALUES ('$itemfilter_id', '$merchant_id', '$itemfilter_name', '$itemfilter_price_currency', '$itemfilter_price_amount', '$itemfilter_brand', '$itemfilter_color', '$itemfilter_condition', '$itemfilter_category', '$itemfilter_more_info_url', '$itemfilter_image_url');";
    $result2 = mysqli_query($link, $query2);
}

// 3. add the clicks to the click table - with the item_id, click datetime, click ip address

    $queryTimeAndDate = "SELECT NOW() as `now`";
    $result6 = mysqli_query($link, $queryTimeAndDate);
    $row = $result6->fetch_array();
    $now = $row['now'];
//
$user_id = $_SESSION["user_id"];
echo $user_id;
echo $itemfilter_id;
echo $now;
$query3 = "INSERT INTO `click` (`item_id`, `user_id`, `click_datetime`) VALUES ('$itemfilter_id', '$user_id', '$now')";
$result3 = mysqli_query($link, $query3);

    mysqli_close($link);
//    echo json_encode($item);
