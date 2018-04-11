<?php
$itemfilter_id = $_GET["itemfilter_id"];
include 'dbconn.php';
$query = "SELECT item_filter.itemfilter_id, image_filter.itemfilter_image_url 
FROM item_filter 
INNER JOIN image_filter on item_filter.itemfilter_id = image_filter.itemfilter_id
WHERE item_filter.itemfilter_id = '$itemfilter_id'";
$result = mysqli_query($link, $query);
while ($row = mysqli_fetch_assoc($result)) {
    $students[] = $row;
}
mysqli_close($link);
echo json_encode($students);
