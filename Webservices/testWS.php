<?php

include 'dbconn.php';
$query = "SELECT * FROM `item`";

$result = mysqli_query($link, $query);


while ($row = mysqli_fetch_assoc($result)) {
    $users[] = $row;
}
mysqli_close($link);

echo json_encode($users);