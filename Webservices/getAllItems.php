<?php

include 'dbconn.php';
$query = "SELECT item.item_id, image.item_image_url, merchant.merchant_name FROM item INNER JOIN image ON item.item_id = image.item_id INNER JOIN merchant ON item.merchant_id = item.merchant_id";
$result = mysqli_query($link, $query);
while ($row = mysqli_fetch_assoc($result)) {
    $students[] = $row;
}
mysqli_close($link);
echo json_encode($students);
