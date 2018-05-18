<?php
session_start();
if (isset($_POST['username'])) {
    $_SESSION['username'] = $_POST['username'];
    
    if (isset($_SESSION['username'])) {
        $response["result"] = "Inserted successfully";
    } else {
        $response["result"] = "Fail to assign session";
    }
}