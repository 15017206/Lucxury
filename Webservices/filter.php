<?php

include 'dbconn.php';
if (isset($_GET['priceType'])) {
    
    $priceType = $_GET['priceType'];
    $query = "SELECT * FROM item INNER JOIN image ON item.item_id = image.item_id INNER JOIN merchant ON item.merchant_id = item.merchant_id ORDER BY item_price_amount " . $priceType;
    $result = mysqli_query($link, $query);
    while ($row = mysqli_fetch_assoc($result)) {
        $items[] = $row;
    }
    mysqli_close($link);
    echo json_encode($items);
} else if (isset($_GET["brands"])) {
    
    $brands = $_GET["brands"];
    $query = "SELECT * FROM `item` WHERE name LIKE '%$brands%' OR brand LIKE '%$brands%'";
    $result = mysqli_query($link, $query);
    while ($row = mysqli_fetch_assoc($result)) {
        $items[] = $row;
    }
    mysqli_close($link);
    echo json_encode($items);
} elseif (isset($_GET["colors"])) {
    $colors = $_GET["colors"];

    $query = "SELECT * FROM `item` WHERE name LIKE '%$colors%' OR brand LIKE '%$colors%'";
    $result = mysqli_query($link, $query);
    while ($row = mysqli_fetch_assoc($result)) {
        $items[] = $row;
    }
    mysqli_close($link);
    echo json_encode($items);
} elseif (isset($_GET["conditions"])) {
    $conditions = $_GET["conditions"];

    $query = "SELECT * FROM `item` WHERE condition LIKE '%$conditions%'";
    $result = mysqli_query($link, $query);
    while ($row = mysqli_fetch_assoc($result)) {
        $items[] = $row;
    }
    mysqli_close($link);
    echo json_encode($items);
} elseif (isset($_GET["merchants"])) {
    $merchants = $_GET["merchants"];
}