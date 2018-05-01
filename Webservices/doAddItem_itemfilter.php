<?php
include 'dbconn.php';
if (isset($_POST["image_link"])){
    $image_link = $_POST["image_link"];
} else {
    $image_link = NULL;
}

$merchant_id = $_POST["merchant_id"];
$name = $_POST["product_name"];
$price_currency = $_POST["price_currency"];
$price_amount = $_POST["price_amount"];
$brand = $_POST["brand"];
$color = $_POST["color"];
$condition = $_POST["condition"];
$category = $_POST["category"];
$item_more_info_url = $_POST["item_more_info_url"];

$query = "INSERT INTO `item_filter` (`merchant_id`, `itemfilter_name`, `itemfilter_price_currency`, `itemfilter_price_amount`, `itemfilter_brand`, `itemfilter_color`, `itemfilter_condition`, `itemfilter_category`, `itemfilter_more_info_url`, `itemfilter_image_url`) VALUES ('$merchant_id', '$name', '$price_currency', '$price_amount', '$brand', '$color', '$condition', '$category', '$item_more_info_url', '$image_link')";

$result = mysqli_query($link, $query);

if ($result) {
    $response["result"] = "success";
} else {
    $response["result"] = "fail";
}

mysqli_close($link);
echo json_encode($response);
