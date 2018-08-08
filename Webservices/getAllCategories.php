<?php


include 'dbconn.php';
$query = "SELECT `category` FROM `attributes`";
$result = mysqli_query($link, $query);
while ($row = mysqli_fetch_assoc($result)) {
    if ($row['category'] != "") {
        $students[] = $row;
    }
}
mysqli_close($link);
echo json_encode($students);