<?php

include 'dbconn.php';

if (isset($_GET)) {
    $item_storage_id = $_GET['item_storage_id'];
    $query = "DELETE FROM `image_storage` WHERE `item_storage_id` = '$item_storage_id'";
    $result = mysqli_query($link, $query);

    if ($result) {
        $query2 = "DELETE FROM `item_storage` WHERE `item_storage_id` = '$item_storage_id'";
        $result2 = mysqli_query($link, $query2);
        if ($result2) {
            $response["result"] = "Deleted successfully";
        } else {
            $response["result"] = "Fail to delete data";
        }
    } else {
        $response["result"] = "Fail to delete data";
    }



    mysqli_close($link);
    echo json_encode($response);
}