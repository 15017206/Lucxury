<?php
session_start();
include 'dbconn.php';
include '../scripts/bootstrap_scripts/bootstrap_scripts.php';
$product_id = $_POST['product_id2'];
$product_name = $_POST['productname2'];
$product_category = $_POST['category2'];
$product_price = $_POST['price2'];
$product_brand = $_POST['brand2'];
$product_color = $_POST['color2'];
$product_condition = $_POST['condition2'];
$product_url = "http://" . $_POST['url2'];

$query = "UPDATE `item_storage` SET `itemstorage_name` = '$product_name', `itemstorage_price_amount` = '$product_price',`itemstorage_category`='$product_category', `itemstorage_color` = '$product_color'," .
        "`itemstorage_condition` = '$product_condition',`itemstorage_brand`='$product_brand', `itemstorage_more_info_url` = '$product_url' WHERE `item_storage`.`item_storage_id` = '$product_id';";
$result = mysqli_query($link, $query);

if ($result) {
    $response["result"] = "Updated successfully";
    echo $msg = '<img src="../images/WebsiteStatusImages/loadingImage.jpg" alt=""/>';
} else {
    $response["result"] = "Fail to update data";
}

mysqli_close($link);

//echo json_encode($response);
?>

<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="refresh" content="0.1; URL=../merchant_product_upload.php">
        <meta name="keywords" content="automatic redirection">
        <title></title>
        <script>
        $(document).ready(function(){
           console.log(<?php echo $_SESSION['merchant_id'] ?>); 
        });
        </script>
        <style>
            img {
                display: block;
                margin-left: auto;
                margin-right: auto
            }
        </style>
        <script>
        </script>
    </head>
    <body>
        <!--<p>Please wait while the page redirects...</p>-->
    </body>
</html>