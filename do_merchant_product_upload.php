<!DOCTYPE html>
<?php
        include 'scripts/bootstrap_scripts/bootstrap_scripts.php';
include 'Webservices/dbconn.php';
$productname = $_POST["productname"];
$price = $_POST["price"];
$brand = $_POST["brand"];
$color = $_POST["color"];
$condition = $_POST["condition"];
$merchant_id = $_POST["merchant_id"];
$url = $_POST["url"];
$image = $_POST["image"];

$query = "INSERT INTO `item_storage`(`merchant_id`, `itemstorage_name`, `itemstorage_price_currency`,`itemstorage_price_amount`, `itemstorage_brand`, `itemstorage_color`, `itemstorage_condition`, `itemstorage_category`, `itemstorage_more_info_url`, `itemstorage_image_url`) " .
        "VALUES ('$merchant_id', '$productname', 'SGD', '$price', '$brand', '$color', '$condition', NULL, '$url', '$image')";

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
        <meta http-equiv="refresh" content="8; URL=./merchant_product_upload.php">
        <meta name="keywords" content="automatic redirection">
        <title></title>
        <script>
            $(document).ready(function () {
                alert("Product Added!");
            });
        </script>
    </head>
    <body>
        <!--<p>Please wait while the page redirects...</p>-->
    </body>
</html>