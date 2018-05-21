<?php
session_start();
if (isset($_GET['username'])) {
    $_SESSION['username'] = $_GET['username'];
    echo "ok";
//    if (isset($_SESSION['username'])) {
//        $response["result"] = "Inserted successfully";
//    } else {
//        $response["result"] = "Fail to assign session";
//    }
}