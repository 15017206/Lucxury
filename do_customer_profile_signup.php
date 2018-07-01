<!DOCTYPE html>
<?php
include 'Webservices/dbconn.php';
$email = $_POST["email"];
$username = $_POST["username"];
$password = $_POST["password"];
$first_name = $_POST["first_name"];
$last_name = $_POST["last_name"];
//$nric = $_POST["nric"];
//$dob = $_POST["dob"];
$gender = $_POST["gender"];
//$postal_code = $_POST["postal_code"];
//$home_address = $_POST["home_address"];
$country = $_POST["country"];

$query = "INSERT INTO `user`(`email`, `username`, `password`,`user_type`, `first_name`, `last_name`, `nric`, `country`, `dob`, `gender`, `address`, `postal_code`) " .
        "VALUES ('$email', '$username',SHA1('$password'),'user', '$first_name','$last_name',null , '$country', null,'$gender', null, null)";

$result = mysqli_query($link, $query);

if ($result) {
    $response["result"] = "success";
} else {
    $response["result"] = "fail";
}
//echo json_encode($response);
mysqli_close($link);
?>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="refresh" content="0.1; URL=home_page.php">
        <meta name="keywords" content="automatic redirection">
        <title></title>
        <?php include 'scripts/bootstrap_scripts/bootstrap_scripts.php'; ?>
        <script>
            $(document).ready(function () {
                var gender = "<?php echo $gender ?>";
                alert("Account created! Please wait..");
            });
        </script>
    </head>
    <body>
        <!--<p>Please wait while the page redirects...</p>-->
    </body>
</html>
