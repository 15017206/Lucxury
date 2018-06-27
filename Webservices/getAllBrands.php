<?php

include 'dbconn.php';
$query = "SELECT `brand` FROM `attributes`";
$result = mysqli_query($link, $query);

while ($row = mysqli_fetch_assoc($result)) {
    if ($row['brand'] != "") {
        $students[] = $row;
    }
}
mysqli_close($link);
echo json_encode($students);
