<?php
include 'dbconn.php';
$merchant_id = $_GET["merchant_id"];
$query = "SELECT * FROM `item_storage` INNER JOIN `merchant` ON `item_storage`.`merchant_id`=`merchant`.`merchant_id` WHERE `merchant`.`merchant_id` = '$merchant_id'";
$result = mysqli_query($link, $query);
while ($row = mysqli_fetch_assoc($result)) {
    $students[] = $row;
}
mysqli_close($link);
echo json_encode($students);