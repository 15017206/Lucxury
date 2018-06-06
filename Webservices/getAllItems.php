<?php

include 'dbconn.php';
$query = "SELECT * FROM `item_filter` RIGHT JOIN merchant ON merchant.merchant_id=item_filter.merchant_id";
$result = mysqli_query($link, $query);
while ($row = mysqli_fetch_assoc($result)) {
    $students[] = $row;
}
mysqli_close($link);
echo json_encode($students);