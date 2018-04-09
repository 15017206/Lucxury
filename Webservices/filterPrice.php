<?php

// Either Decending "DESC" or Ascending "ASC"
if (isset($_POST['price_type'])) {
    $priceType = $_POST["price_type"];

    if ($priceType == "ASC") {
        $query = "select * from item order by price asc";
    } else {
        $query = "select * from item order by price desc";
    }
    $result = mysqli_query($link, $query);
    while ($row = mysqli_fetch_assoc($result)){
        $items[] = $row;
    }
    mysqli_close($link);
    echo json_encode($items);
}