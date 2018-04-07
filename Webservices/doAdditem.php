<?php

include 'dbconn.php';

if (isset($_POST["brand"])){
    $_POST["brand"];
} else {
    $brand = "";
}
if (isset($_POST["color"])){
    $_POST["color"];
} else {
    $color = "";
}
$image = $_POST["image"];
$desc = $_POST["desc"];
$price = $_POST["price"];
//$brand = $_POST["brand"];
//$color = $_POST["color"];
$condition = $_POST["condition"];
$category = $_POST["category"];
$merchant = $_POST["merchant"];

$query = "insert into filter_items (`image`, `desc`, `price`, `brand`, `color`, `condition`, `category`, `merchant`)"
        . " values ('$image','$desc','$price','$brand','$color','$condition', '$category', '$merchant')";

$result = mysqli_query($link, $query);

if ($result){
    $response["result"] = "success";
} else {
    $response["result"] = "fail";
}

mysqli_close($link);