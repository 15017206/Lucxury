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

    $msg = "hello. Please wait while the webpage redirects...";
} else {
    $msg = "<p>Sorry, you must enter a valid username 
                and password to log in. <a href='login_page.php'>Back to Login Page</a></p>";
}
?>
<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="refresh" content="2; URL=home_page.php">
        <meta name="keywords" content="automatic redirection">
        <title></title>
    </head>
    <body>
        <?php
        echo $msg;
        ?>
    </body>
</html>
