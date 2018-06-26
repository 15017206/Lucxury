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
$merchant_name = $_POST["merchant_name"];
$url = $_POST["url"];
$image = $_POST["image"];

//MAKE DIR if not exists
if (!file_exists('merchant_images/'.$merchant_name)) {
    mkdir('merchant_images/'.$merchant_name, 0777, true);
}

//FILE UPLOAD
$target_dir = 'merchant_images/'.$merchant_name.'/';
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "The file " . basename($_FILES["fileToUpload"]["name"]) . " has been uploaded.<br/>";
        echo realpath($target_file);
        echo '<br/>';
        echo realpath($target_dir);
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}

$query = "INSERT INTO `item_storage`(`merchant_id`, `itemstorage_name`, `itemstorage_price_currency`,`itemstorage_price_amount`, `itemstorage_brand`, `itemstorage_color`, `itemstorage_condition`, `itemstorage_category`, `itemstorage_more_info_url`, `itemstorage_image_url`) " .
        "VALUES ('$merchant_id', '$productname', 'SGD', '$price', '$brand', '$color', '$condition', NULL, '$url', '$target_file')";

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
        <meta http-equiv="refresh" content="1; URL=./merchant_product_upload.php">
        <meta name="keywords" content="automatic redirection">
        <title></title>
        <script>
            $(document).ready(function () {
//                alert("Product Added!");
            });
        </script>
    </head>
    <body>
        <!--<p>Please wait while the page redirects...</p>-->
    </body>
</html>