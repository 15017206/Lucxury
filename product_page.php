<!DOCTYPE html><?php include 'templateBar.php'; ?><html lang="en">    <!--head-->    <head>        <meta charset="UTF-8">        <meta name="viewport" content="width=device-width, initial-scale=1">        <!-- Latest compiled and minified CSS -->        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css">        <!--jQuery library-->         <script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>        <!--Popper JS-->         <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.6/umd/popper.min.js"></script>        <!--Latest compiled JavaScript-->         <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js"></script>        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">        <!--CSS -->        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">        <!--script-->        <script>            $(document).ready(function () {                wipe_item_temp_table();                add_itemstorage_to_itemfilter();<?php $search_item = $_POST['search_item']; ?>                var search_item = "<?php echo $search_item ?>";<?php include 'Webservices/merchantsAPIs/ebayAPI.js' ?>            }); // end of document.ready            window.onload = function () {                filterItems("ASC");            };            //When someone does filtering            function filterItems(e) {                $("#some_container").empty();                var output = "";                var value = e;                var key = "";                if (e == "ASC" || e == "DESC") {                    key = "priceType";                } else if (e == "AGNÈS B" || e == "ARMANI" || e == "BURBERRY" || e == "CELINE" || e == "CHANEL" || e == "CHLOE" || e == "COACH" || e == "CARTIER" || e == "DIOR" || e == "FENDI" || e == "GUCCI" || e == "HUGO BOSS" || e == "HERMES" || e == "JIMMY CHOO" || e == "LOUIS VUITTON" || e == "MULBERRY" || e == "MONTBLANC" || e == "MIU MIU" || e == "PATEK PHILIPPE" || e == "PRADA" || e == "RAY BAN" || e == "ROLEX" || e == "SAINT LAURENT" || e == "SALVATORE FERRAGAMO" || e == "TAG HEUER" || e == "TIFFANY & CO" || e == "TODS" || e == "TOMMY HILFIGER" || e == "TUDOR" || e == "VERSACE" || e == "VALENTINO" || e == "VIVIENNE WESTWOOD" || e == "YVES SAINT LAURENT" || e == "ZEGNA") {                    key = "brands";                } else if (e == "BEIGE" || e == "BLACK" || e == "BLUE" || e == "BROWN" || e == "GOLD" || e == "GREY" || e == "GREEN" || e == "ORANGE" || e == "PINK" || e == "PURPLE" || e == "RED" || e == "SILVER" || e == "WHITE" || e == "YELLOW") {                    key = "colors";                } else if (e == "NEW" || e == "PRE-LOVED") {                    key = "conditions";                } else if (e == "AMAZON" || e == "EBAY" || e == "REEBONZ" || e == "EZBUY" || e == "GUMTREE") {                    key = "merchants";                }//                alert("key is: " + key + " and value is " + value);                $.ajax({                    type: "GET",                    url: "Webservices/filter.php",                    cache: false,                    data: key + "=" + value,                    dataType: "JSON",                    success: function (response) {                        var item_id = "";                        var image_url = "";                        var product_name = "";                        var product_price_currency = "";                        var product_price_amount = "";                        var product_brand = "";                        var product_color = "";                        var product_condition = "";                        var merchant_name = "";                        var merchant_type = "";                        var merchant_url = "";                        for (var i = 0; i < response.length; i++) {                            // to filter if a merchant does not have any items yet; avoids the NULL NULL object appearing                                            if (response[i]['itemfilter_id'] != null) {                                item_id = response[i]['itemfilter_id'];                                image_url = response[i]['itemfilter_image_url'];                                product_name = response[i]['itemfilter_name'];                                product_price_amount = response[i]['itemfilter_price_amount'];                                product_price_currency = response[i]['itemfilter_price_currency'];                                product_brand = response[i]['itemfilter_brand'];                                product_color = response[i]['itemfilter_color'];                                product_condition = response[i]['itemfilter_condition'];                                merchant_name = response[i]['merchant_name'];                                merchant_type = response[i]['merchant_type'];                                merchant_url = response[i]['itemfilter_more_info_url']                                output += '<div class="w3-third card">' +                                        '<br/>' +                                        '<img class="thumbnail1" src="' + image_url + '">' +                                        '<br/>' +//                                    '<a href="" class="align">Image 2</a>' +//                                    '<a href="" class="align">Image 3</a>' +//                                    '<a href="" class="align">Image 4</a>' +                                        '<div class="" id="product_name"><h6 id="product_nameh6">PRODUCT NAME: ' + product_name + '</h6>' +                                        '<h6 style="font-weight: bold">PRICE: ' + product_price_currency + " " + product_price_amount + '</h6>' +                                        '<h6 id="brand">BRAND: ' + product_brand + '</h6><h6 id="color">COLOR: </h6>' +                                        '<h6>CONDITION: ' + product_condition + '</h6><h6>MERCHANT: ' + merchant_name + '</h6>' +//                                        '<div>View Count: 99</div>' +                                        '<br/>' +                                        '<a href="' + merchant_url + '" target="_blank" onclick="generateClicks(' + item_id + ')" class="w3-button w3-block w3-border">More Information</a>' +                                        '</div>' +                                        '</div>'                            }                        }                        $("#some_container").append(output);                    },                    error: function (obj, textStatus, errorThrown) {                        console.log("Error " + textStatus + ": " + errorThrown);                        // alert("fail to filter items");                    }                });                // alert(priceType.toString());            }            function generateClicks(item_id) {                $.ajax({                    type: "GET",                    url: "Webservices/doGenerateClicks.php",                    data: {item_id: item_id},                    cache: false,//                    dataType: "JSON",                    success: function (response) {                        console.log("click tagged");                        console.log(response);                    },                    error: function (obj, textStatus, errorThrown) {                        console.log("Error " + textStatus + ": " + errorThrown);                        alert("fail to generate clicks");                    }                });            }            function add_itemstorage_to_itemfilter() {                $.ajax({                    type: "GET",                    url: "Webservices/addItemsToItemTempTable.php",                    cache: false,//                    dataType: "JSON",                    success: function (response) {                        console.log("added!!");                        console.log(response);                    },                    error: function (obj, textStatus, errorThrown) {                        console.log("Error " + textStatus + ": " + errorThrown);                        alert("fail to generate clicks");                    }                });            }            function wipe_item_temp_table() {                $.ajax({                    type: "GET",                    url: "Webservices/deleteTableTemp.php",                    cache: false,                    dataType: "JSON",                    success: function (response) {//                        alert("table deleted");                    },                    error: function (obj, textStatus, errorThrown) {                        console.log("Error " + textStatus + ": " + errorThrown);                        alert("fail to wipe filter table");                    }                });            }        </script>        <!--style-->        <style>            a {                color: black;            }            #topbarlogo {                max-width: 100%;            }            a:hover {                text-decoration: none;            }            img.thumbnail1 {                display: block;                width:250px;                height:250px;                margin-left: auto;                margin-right: auto;            }            img.thumbnail2{                width: 100%;                display: block;                margin-left: auto;                margin-right: auto;            }            #product_name {                display: -webkit-box;                -webkit-line-clamp: 3;                -webkit-box-orient: vertical;                height: 390px;            }            .align {                text-align: center;            }        </style>        <title>1</title>    </head>    <body>        <?php include 'filterBar.html'; ?>        <br/>        <p id="debug"></p>        <div id="some_container" class="w3-row-padding w3-margin-top" style="max-height: inherit">        </div>        <?php include 'templateBar_bottom.php'; ?>        <?php include 'templateBar_bottombottom.php'; ?>    </body></html>