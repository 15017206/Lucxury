<!DOCTYPE html>
<?php
session_start();
include 'Webservices/dbconn.php';
$username = $_POST['username'];
$password = $_POST['password'];

$query = "select * from `user` where `username` = '$username' and `password` = sha1('" . $password . "')";
$result = mysqli_query($link, $query) or die(mysqli_error($link));

if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_array($result);
    $_SESSION["user_id"] = $row['user_id'];
    $_SESSION["username"] = $row['username'];
    $_SESSION["user_type"] = $row['user_type'];

    $msg = "<img src='./images/WebsiteStatusImages/loadingImage.jpg'>";
} else {
    $msg = "<img src='./images/WebsiteStatusImages/wrongUserOrPass.jpg'>";
}
?>
<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="refresh" content="2; URL=home_page.php">
        <meta name="keywords" content="automatic redirection">
        <title></title>
        <style>
            img {
                display: block;
                margin-left: auto;
                margin-right: auto
            }
        </style>
    </head>
    <body>
        <?php
        echo $msg;
        ?>
    </body>
</html>
