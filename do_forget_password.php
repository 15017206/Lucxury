<!DOCTYPE html>
<?php
include './Webservices/dbconn.php';
$email = $_POST["email"];
$username = $_POST["username"];
$query = "select * from `user` where `email` = '$email' and `username` = '$username'";
$result = mysqli_query($link, $query) or die(mysqli_error($link));

if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_array($result);

    $characters = 'abcdefghijklmnopqrstuvwxyz0123456789!@#$%^&*()_+{}|:<>?-=[]\;';
    $string = '';
    $max = strlen($characters) - 1;
    for ($i = 0; $i < 20; $i++) {
        $string .= $characters[mt_rand(0, $max)];
    }
    $query2 = "UPDATE `user` SET `password` = sha1('$string') WHERE `username` = '$username' AND `email` = '$email'";
    $result = mysqli_query($link, $query2) or die(mysqli_error($link));
//    Email init
    $headers = 'MIME-Version: 1.0' . "\r\n";
    $headers .= 'From: Your name <lucxury@lucxury.com>' . "\r\n";
    $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

    $subject = "Lucxury - Password reset";
    $msgForWebsite = "Password has been reset. Please check your email and spam/junk folder.";
    $msgForEmail = "Hi, $username, \n Your password is: $string <a href='https://www.lucxury.com/login_page.php'>Login to Lucxury</a>";

    mail("glennicia@hotmail.com", "Subject 1", $msgForEmail, $headers);
} else {
    $msgForWebsite = "sorry, invalid credentials";
}
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        echo $msgForWebsite;
        ?>
    </body>
</html>
