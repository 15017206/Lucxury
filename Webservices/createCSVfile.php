<?php

include './dbconn.php';
//if (isset($_GET["Export"])) {

header('Content-Type: text/csv; charset=utf-8');
header('Content-Disposition: attachment; filename=data.csv');
$output = fopen("php://output", "w");
fputcsv($output, array("click id", "item id", "user id", "click datetime", "user id", "email", "username", "password", "user type", "first name", "last name", "nric", "country", "dob", "gender", "address", "postal code", "item id", "item name", "item price currency", "item price amount", "item brand", "item color", "item condition", "item category", "item more info url", "item image url", "merchant name", "merchant username", "merchant password","merchant type"));
$query = "SELECT * FROM `click` INNER JOIN `user` ON `click`.`user_id` =`user`.`user_id` INNER JOIN `item_click` ON `item_click`.`item_id`=`click`.`item_id` INNER JOIN `merchant` on `item_click`.`merchant_id`=`merchant`.`merchant_id`";
$result = mysqli_query($link, $query);
while ($row = mysqli_fetch_assoc($result)) {
    fputcsv($output, $row);
}
fclose($output);
//}  