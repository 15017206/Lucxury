<?php

include 'dbconn.php';


if (isset($_GET["username"])) {
    $username = $_GET["username"];

    $query = "SELECT `username` FROM `user` WHERE `username` = '$username'";

    $result = mysqli_query($link, $query);

    while ($row = mysqli_fetch_assoc($result)) {
        $students = $row;
    }
    mysqli_close($link);
    
    if (isset($students)) {
        echo json_encode($students);
    } else {
        echo "no username found";
    }
};
