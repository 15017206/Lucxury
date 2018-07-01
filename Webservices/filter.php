<?php
include 'dbconn.php';



if (isset($_GET['priceType'])) {

    $priceType = $_GET['priceType'];
    $query = "SELECT * FROM `item_filter` RIGHT JOIN merchant ON merchant.merchant_id=item_filter.merchant_id ORDER BY itemfilter_price_amount " . $priceType;
    $result = mysqli_query($link, $query);
    while ($row = mysqli_fetch_assoc($result)) {
        $items[] = $row;
    }
    mysqli_close($link);
    echo json_encode($items);
} else if (isset($_GET["brands"])) {

    $brands = $_GET["brands"];
    $query = "SELECT * FROM `item_filter` WHERE `itemfilter_name` LIKE '%$brands%' OR `itemfilter_brand` LIKE '%$brands%'";
    $result = mysqli_query($link, $query);
    while ($row = mysqli_fetch_assoc($result)) {
        $items[] = $row;
    }
    mysqli_close($link);
    echo json_encode($items);
} elseif (isset($_GET["colors"])) {
    $colors = $_GET["colors"];

    $query = "SELECT * FROM `item_filter` WHERE `itemfilter_name` LIKE '%$colors%' OR `itemfilter_brand` LIKE '%$colors%'";
    $result = mysqli_query($link, $query);
    while ($row = mysqli_fetch_assoc($result)) {
        $items[] = $row;
    }
    mysqli_close($link);
    echo json_encode($items);
} elseif (isset($_GET["conditions"])) {
    $conditions = $_GET["conditions"];

    $query = "SELECT * FROM `item_filter` WHERE `itemfilter_condition` LIKE '%$conditions%'";
    $result = mysqli_query($link, $query);
    while ($row = mysqli_fetch_assoc($result)) {
        $items[] = $row;
    }
    mysqli_close($link);
    echo json_encode($items);
} elseif (isset($_GET["merchants"])) {
    $merchants = $_GET["merchants"];

    $query = "SELECT * FROM `item_filter`  RIGHT JOIN merchant ON merchant.merchant_id=item_filter.merchant_id WHERE `merchant_name` LIKE '%$merchants%'";
    $result = mysqli_query($link, $query);
    while ($row = mysqli_fetch_assoc($result)) {
        $items[] = $row;
    }
    mysqli_close($link);
    echo json_encode($items);
}