<?php
include 'dbconn.php';
session_start();
$merchant_username = $_POST["username"];
$merchant_password = $_POST["password"];

$query = "select * from `merchant` where `merchant_username` = '$merchant_username' and `merchant_password` = sha1('" . $merchant_password . "')";
$result = mysqli_query($link, $query) or die(mysqli_error($link));

if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_array($result);
    $_SESSION["merchant_id"] = $row['merchant_id'];
    $_SESSION["merchant_username"] = $row['merchant_username'];
    $_SESSION["merchant_name"] = $row['merchant_name'];
    $_SESSION["user_type"] = 'merchant';

    $msg = "<img src='https://eduzon.co/wp-content/uploads/2018/04/welcome-featured-image.jpg'>";
} else {
    $msg = "<img src='https://images.drivereasy.com/wp-content/uploads/2017/10/img_59e6d500051c8.png'>";
}
?>
<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="refresh" content="2; URL=../merchant_product_upload.php">
        <meta name="keywords" content="automatic redirection">
        <title></title>
    </head>
    <body>
        <?php
        echo $msg;
        ?>
    </body>
</html>