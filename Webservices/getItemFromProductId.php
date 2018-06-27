<?php
include 'dbconn.php';
$item_id = $_GET['item_id'];
$query = "SELECT * FROM `item_storage` WHERE `item_storage_id`= '$item_id'";
$result = mysqli_query($link, $query);
while ($row = mysqli_fetch_assoc($result)) {
    $students = $row;
}
mysqli_close($link);
echo json_encode($students);