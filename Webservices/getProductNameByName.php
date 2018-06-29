<?php

include 'dbconn.php';
$product_name = $_GET["product_name"];
$query = "SELECT * FROM `item_storage` WHERE `itemstorage_name` = '$product_name'";
$result = mysqli_query($link, $query);
if ($row = mysqli_fetch_assoc($result)) {
    echo "product name found";
} else {
    echo "nothing";
}

//echo json_encode($students);

mysqli_close($link);