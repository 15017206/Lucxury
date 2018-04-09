<?php

include 'dbconn.php';
if (isset($_GET['priceType'])) {
    $priceType = $_GET['priceType'];
    $query = "SELECT * FROM `item_temp` ORDER BY price_amount " . $priceType;
    $result = mysqli_query($link, $query);
    while ($row = mysqli_fetch_assoc($result)) {
        $items[] = $row;
    }
    mysqli_close($link);
    echo json_encode($items);
} else if (isset($_GET["brands"])) {
    $brands = $_GET["brands"];
    $query = "SELECT * FROM item_temp ORDER BY name " . $brands;
    $result = mysqli_query($link, $query);
    while ($row = mysqli_fetch_assoc($result)) {
        $items[] = $row;
    }
    mysqli_close($link);
    echo json_encode($items);
} elseif (isset($_GET["colors"])) {
    $colors = $_GET["colors"];
} elseif (isset($_GET["conditions"])) {
    $conditions = $_GET["conditions"];
} elseif (isset($_GET["merchants"])) {
    $merchants = $_GET["merchants"];
}