<?php

include 'dbconn.php';

if (isset($_GET)) {
    $item_storage_id = $_GET['item_storage_id'];

    $query0 = "SELECT * FROM `image_storage` WHERE `item_storage_id` = '$item_storage_id'";
    $result0 = mysqli_query($link, $query0);

    while ($row = mysqli_fetch_assoc($result0)) {
        $item_url = $row;
    }
    $image_dir = "../".$item_url["itemstorage_image_url"];

    if (unlink($image_dir)) {
        echo sprintf("The file %s deleted successfully", $image_dir);
    } else {
        echo sprintf("An error occurred deleting the file %s", $image_dir);
    }

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
//    echo json_encode($response);
}