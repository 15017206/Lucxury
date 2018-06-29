<?php

include './dbconn.php';

$query3 = "SELECT * FROM `image_storage`";
$result3 = mysqli_query($link, $query3);

while ($row3 = mysqli_fetch_assoc($result3)) {
    $students3[] = $row3;
};

$query1 = "SELECT * FROM `item_storage`";
$result1 = mysqli_query($link, $query1);

while ($row = mysqli_fetch_assoc($result1)) {
    $students[] = $row;
};



for ($i = 0; $i < count($students); $i++) {
    $merchant_id = $students[$i]["merchant_id"];
    $item_name = $students[$i]["itemstorage_name"];
    $item_price_currency = $students[$i]["itemstorage_price_currency"];
    $item_price_amount = $students[$i]["itemstorage_price_amount"];
    $item_brand = $students[$i]["itemstorage_brand"];
    $item_color = $students[$i]["itemstorage_color"];
    $item_condition = $students[$i]["itemstorage_condition"];
    $item_category = $students[$i]["itemstorage_category"];
    $item_more_info_url = $students[$i]["itemstorage_more_info_url"];
    $item_image_url = $students[$i]["itemstorage_image_url"];

    $query2 = "INSERT INTO `item_filter` (`merchant_id`, `itemfilter_name`, `itemfilter_price_currency`, `itemfilter_price_amount`, `itemfilter_brand`, `itemfilter_color`, `itemfilter_condition`, `itemfilter_category`, `itemfilter_more_info_url`, `itemfilter_image_url`) "
            . "VALUES ('$merchant_id', '$item_name', 'SGD', '$item_price_amount', '$item_brand', '$item_color', '$item_condition', '$item_category', '$item_more_info_url', '$item_image_url');";
    $result2 = mysqli_query($link, $query2);

    $last_id = mysqli_insert_id($link);
    echo $last_id . "<br/>";
    $x = $students3[$i]['itemstorage_image_url'];
    $query4 = "INSERT INTO `image_filter` (`itemfilter_id`, `itemfilter_image_url`)" .
            " VALUES ('$last_id', '$x');";
    $result4 = mysqli_query($link, $query4);
}






//for ($j = 0; $j < count($students3); $j++) {
//    $item_image_url2 = $students3[$j]["itemfilter_image_url"];
//
//    $query4 = "";
//    $result4 = mysqli_query($link, $query4);
//}

mysqli_close($link);
