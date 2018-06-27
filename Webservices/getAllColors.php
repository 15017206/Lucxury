<?php

include 'dbconn.php';
$query = "SELECT `color` FROM `attributes`";
$result = mysqli_query($link, $query);
while ($row = mysqli_fetch_assoc($result)) {
    if ($row['color'] != "") {
        $students[] = $row;
    }
}
mysqli_close($link);
echo json_encode($students);