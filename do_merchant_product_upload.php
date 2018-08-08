<!DOCTYPE html>
<?php
session_start();
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
$category = $_POST['category'];
//$image = $_POST["image"];
//MAKE DIR if not exists
if (!file_exists('merchant_images/' . $merchant_name)) {
    mkdir('merchant_images/' . $merchant_name, 0777, true);
}

$filename = $_FILES["fileToUpload"]["name"];
$file_basename = substr($filename, 0, strripos($filename, '.')); // get file extention
$file_ext = substr($filename, strripos($filename, '.')); // get file name
$filesize = $_FILES["fileToUpload"]["size"];
$allowed_file_types = array('.png', '.PNG', '.jpg', '.JPG', '.jpeg', '.JPEG');

$target_dir = 'merchant_images/' . $merchant_name . '/';

if (in_array($file_ext, $allowed_file_types) && ($filesize < 4194304)) {
    // Rename file
    $newfilename = "$productname" . $file_ext;

    if (file_exists($target_dir . $newfilename)) {
        // file already exists error
        echo "You have already uploaded this file.";
    } else {
        move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_dir . $newfilename);
        echo "File uploaded successfully.";
    }
} elseif (empty($file_basename)) {
    // file selection error
    echo "Please select a file to upload.";
} elseif ($filesize > 4194304) {
    // file size error
    echo "The file you are trying to upload is too large.";
} else {
    // file type error
    echo "Only these file typs are allowed for upload: " . implode(', ', $allowed_file_types);
    unlink($_FILES["fileToUpload"]["tmp_name"]);
}

$query = "INSERT INTO `item_storage`(`item_storage_id`, `merchant_id`, `itemstorage_name`, `itemstorage_price_currency`,`itemstorage_price_amount`, `itemstorage_brand`, `itemstorage_color`, `itemstorage_condition`,`itemstorage_category`, `itemstorage_more_info_url`) " .
        "VALUES (NULL, '$merchant_id', '$productname', 'SGD', '$price', '$brand', '$color', '$condition', '$category', '$url')";

$result = mysqli_query($link, $query);
$item_storage_id = mysqli_insert_id($link);

if ($result) {
    echo $response["result"] = "success";
} else {
    echo $response["result"] = "fail";
}

// Insert into image_storage table via the item_storage_id
$query3 = "INSERT INTO `image_storage` (`item_image_id`, `item_storage_id`, `itemstorage_image_url`) VALUES (NULL, '$item_storage_id', '$target_dir$newfilename');";
$result3 = mysqli_query($link, $query3);
//echo json_encode($response);
mysqli_close($link);
?>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="refresh" content="0.1; URL=./merchant_product_upload.php">
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