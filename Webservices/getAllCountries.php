<?php

include 'dbconn.php';
$query = "SELECT `country` FROM `attributes`";
$result = mysqli_query($link, $query);
while ($row = mysqli_fetch_assoc($result)) {
    if ($row['country'] != "") {
        $students[] = $row;
    }
}
mysqli_close($link);
echo json_encode($students);