<!DOCTYPE html>
<?php
include 'Webservices/dbconn.php';
session_start();
$username = $_POST["username"];
$password = $_POST["password"];

$query = "select * from `user` where `username` = '". $username ."' and `password` = sha1('".$password."')";
$result = mysqli_query($link, $query) or die(mysqli_error($link));

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_array($result);
        $_SESSION['user_id'] = $row['user_id'];
        $_SESSION['username'] = $row['username'];
        header("location: home_page.php");
        $msg = "hello";
    } else {
        $msg = "<p>Sorry, you must enter a valid username 
                and password to log in. <a href='login_page.php'>Back to Login Page</a></p>";
    }
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        echo $msg;
        ?>
    </body>
</html>
