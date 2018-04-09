<?php
include 'dbconn.php';
$query = "SELECT * FROM `item` INNER JOIN `image` ON image.item_id = item.item_id";

    $result = mysqli_query($link, $query);
    
    
    while ($row = mysqli_fetch_assoc($result)) {
        $students[] = $row;
    }
     
    

    mysqli_close($link);

    echo json_encode($student);