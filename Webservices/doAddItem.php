<?php
include 'dbconn.php';

$merchant_id = $_POST["merchant_id"];
$name = $_POST["product_name"];
$price_currency = $_POST["price_currency"];
$price_amount = $_POST["price_amount"];
$brand = $_POST["brand"];
$color = $_POST["color"];
$condition = $_POST["condition"];
$category = $_POST["category"];
$item_more_info_url = $_POST["item_more_info_url"];

$query = "INSERT INTO `item` (`merchant_id`, `item_name`, `item_price_currency`, `item_price_amount`, `item_brand`, `item_color`, `item_condition`, `item_category`, `item_more_info_url`) VALUES ('$merchant_id', '$name', '$price_currency', '$price_amount', '$brand', '$color', '$condition', '$category', '$item_more_info_url')";

$result = mysqli_query($link, $query);

if ($result) {
    $response["result"] = "success";
} else {
    $response["result"] = "fail";
}

mysqli_close($link);
echo json_encode($response);
