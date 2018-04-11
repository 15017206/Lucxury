<?php

include 'dbconn.php';
$query = "SELECT itemfilter_id, image_url FROM item_filter inner join image_filter on item_filter.itemfilter_id = image_filter.itemfilter_id";
$result = mysqli_query($link, $query);
while ($row = mysqli_fetch_assoc($result)) {
    $students[] = $row;
}
mysqli_close($link);
echo json_encode($students);
