<?php

include 'dbconn.php';

$query = "DELETE FROM item_filter";

$result = mysqli_query($link, $query);

if ($result) {
    $response["result"] = "success";
} else {
    $response["result"] = "fail";
}
mysqli_close($link);
echo json_encode($response);
