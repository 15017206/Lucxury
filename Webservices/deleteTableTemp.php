<?php

include 'dbconn.php';
$query0 = "DELETE FROM image_filter";
$result0 = mysqli_query($link, $query0);

if ($result0) {
    $query = "DELETE FROM item_filter";
    $result = mysqli_query($link, $query);
    if ($result) {
        $response["result_deleting_filter_table"] = "success";
    } else {
        $response["result"] = "fail";
    }
} else {
    $response["result"] = "fail";
}




mysqli_close($link);
echo json_encode($response);
