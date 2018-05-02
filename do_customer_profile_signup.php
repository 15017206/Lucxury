<!DOCTYPE html>
<?php
include 'Webservices/dbconn.php';
$email = $_POST["email"];
$username = $_POST["username"];
$password = $_POST["password"];
$first_name = $_POST["first_name"];
$last_name = $_POST["last_name"];
$nric = $_POST["nric"];
$dob = $_POST["dob"];
$gender = $_POST["gender"];
$postal_code = $_POST["postal_code"];
$home_address = $_POST["home_address"];
$country = $_POST["country"];

$query = "INSERT INTO `user`(`email`, `username`, `password`, `first_name`, `last_name`, `nric`, `country`, `dob`, `gender`, `address`, `postal_code`) " .
                    "VALUES ('$email', '$username',SHA1('$password'), '$first_name','$last_name', '$nric','$country','$dob','$gender', '$home_address','$postal_code')";

$result = mysqli_query($link, $query);

if ($result) {
    $response["result"] = "success";
} else {
    $response["result"] = "fail";
}
echo json_encode($response);
mysqli_close($link);
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <?php include 'scripts/bootstrap_scripts/bootstrap_scripts.php'; ?>
        <script>
            $(document).ready(function () {
                var gender = "<?php echo $gender ?>";
            });
        </script>
    </head>
    <body>
        <?php
        // put your code here
        ?>
    </body>
</html>
