<!DOCTYPE html>

<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->

<?php include 'templateBar.php'; ?>
<html lang="en">
    <!--head-->
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- Latest compiled and minified CSS -->
        <!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css">-->

        <!--jQuery library--> 
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

        <!--Popper JS--> 
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.6/umd/popper.min.js"></script>

        <!--Latest compiled JavaScript--> 
        <!--<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js"></script>-->
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

        <!--CSS -->
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <!--script-->
        <script>
<?php $search_item = $_POST['search_item']; ?>
            var search_item = "<?php echo $search_item ?>";
            $(document).ready(function () {

                $.ajax({
                    type: "GET",
                    url: "https://svcs.ebay.com/services/search/FindingService/v1?" + "SECURITY-APPNAME=" + "GlennYeo-Software-PRD-35d705b3d-b15b0374" + "&OPERATION-NAME=" + "findItemsByKeywords" + "&SERVICE-VERSION=" + "1.0.0" + "&RESPONSE-DATA-FORMAT=" + "JSON" + "&keywords=" + search_item + "&paginationInput.entriesPerPage=" + "20" + "&GLOBAL-ID=" + "EBAY-SG" + "&paginationInput.pageNumber=" + "1",

                    cache: false,
                    dataType: "JSONP",
                    success: function (response) {
                        var response2 = JSON.stringify(response);

                        var no_of_items = response['findItemsByKeywordsResponse'][0]['searchResult'][0]['@count'];

                        var imagelink = "";
                        var product_name = "";
                        var category = "";
                        var brand = "";
                        var colour = "";
                        var condition = "";
                        var price_currency = "";
                        var price_amount = "";
                        var merchant = "";
                        var link = "";
                        for (var i = 0; i < no_of_items; i++) {
                            imagelink = response['findItemsByKeywordsResponse'][0]['searchResult'][0]['item'][i]['galleryURL'][0];
                            product_name = response['findItemsByKeywordsResponse'][0]['searchResult'][0]['item'][i]['title'][0];
                            category = response['findItemsByKeywordsResponse'][0]['searchResult'][0]['item'][i]['primaryCategory'][0]['categoryName'][0];
                            condition = response['findItemsByKeywordsResponse'][0]['searchResult'][0]['item'][i]['condition'][0]['conditionDisplayName'][0];
                            price_currency = response['findItemsByKeywordsResponse'][0]['searchResult'][0]['item'][i]['sellingStatus'][0]['convertedCurrentPrice'][0]['@currencyId'];
                            price_amount = response['findItemsByKeywordsResponse'][0]['searchResult'][0]['item'][i]['sellingStatus'][0]['convertedCurrentPrice'][0]['__value__'];
                            merchant = response['findItemsByKeywordsResponse'][0]['searchResult'][0]['item'][i]['globalId'][0];
                            link = response['findItemsByKeywordsResponse'][0]['searchResult'][0]['item'][i]['viewItemURL'][0];


                            $("#some_container").append('<div class="w3-third card"><div class="w3"><br/><img id="thumbnail1" src="' + imagelink + '" style="width:250px;"><div class="w3-container" id="product_name"><h6>PRODUCT NAME: ' + product_name +'</h6><h6 style="font-weight: bold">PRICE: ' + price_currency + " " + price_amount + '</h6><h6 id="brand' + i + '">BRAND: ' + brand + '</h6><h6 id="color' + i + '">COLOR: </h6><h6>CONDITION: ' + condition + '</h6><h6>MERCHANT: ' + merchant + '</h6><div>View Count: 99</div><a href="' + link + '"><button class="w3-button w3-block w3-border">More Information</button></a><br/></div></div></div>');
                            if ($("#brand" + i).val() === "") {
                                $("#brand" + i).hide();
                            }
                            if ($("#color" + i).val() === "") {
                                $("#color" + i).hide();
                            }

                        }

                    },
                    error: function (obj, textStatus, errorThrown) {
                        console.log("Error " + textStatus + ": " + errorThrown);
                        alert("fail");
                    }
                });

            });
        </script>
        <script>
            //                    data: "SECURITY-APPNAME=" + "GlennYeo-Software-PRD-35d705b3d-b15b0374",
            //                    data: "&OPERATION-NAME=" + "findItemsByKeywords",
            //                    data: "&SERVICE-VERSION=" + "1.0.0",
            //                    data: "&RESPONSE-DATA-FORMAT=" + "JSON",
            //                    data: "&keywords=" + "GlennYeo-handbag",
            //                    data: "&paginationInput.entriesPerPage=" + "2",
            //                    data: "&GLOBAL-ID=" + "EBAY-SG",
            //                    data: "&paginationInput.pageNumber=" + "1",

            //                        $("#debug").text(response2);

            //                            alert(product_name + "\n\n" + imagelink + "\n\n" + category + "\n\n" + condition + "\n" + price_currency + price_amount + "\n\n" + merchant + "\n\n" + link);

        </script>
        <!--style-->
        <style>
            a {
                color: black;
            }

            #topbarlogo {
                max-width: 100%;
            }

            a:hover {
                text-decoration: none;
            }
            img#thumbnail1 {
                max-height: 250px;
                min-height: 250px;
            }

            /*            .card {
                            max-height: 500px;
                        }*/

            #product_name {
                overflow: hidden;
                display: -webkit-box;
                -webkit-line-clamp: 3;
                -webkit-box-orient: vertical;
            }
        </style>

        <title></title>
    </head>
    <body>

        <!--Filter Bar-->
        <div class="w3-mobile w3-bar w3-black">

            <!--Price-->
            <div class="w3-dropdown-hover w3-black">
                <button class="w3-button w3-small">PRICE <i class="fa fa-caret-down"></i></button>
                <div class="w3-dropdown-content w3-bar-block w3-border w3-card-4 w3-small">
                    <a href="#" class="w3-bar-item w3-button">ASCENDING ORDER</a>
                    <a href="#" class="w3-bar-item w3-button">DESCENDING ORDER</a>
                </div>
            </div>

            <!--Brands-->
            <div class="w3-dropdown-hover w3-black">
                <button class="w3-button w3-small">BRANDS <i class="fa fa-caret-down"></i></button>
                <div class="w3-dropdown-content w3-bar-block w3-border w3-small">
                    <a href="#" class="w3-bar-item w3-button">AGNÈS B</a>
                    <a href="#" class="w3-bar-item w3-button">ARMANI</a>
                    <!--a href="#" class="w3-bar-item w3-button">BALENCIAGA</a>-->
                    <!--a href="#" class="w3-bar-item w3-button">BUGATTI</a>-->
                    <a href="#" class="w3-bar-item w3-button">BURBERRY</a>
                    <!--a href="#" class="w3-bar-item w3-button">BOTTEGA VENETA</a>-->
                    <a href="#" class="w3-bar-item w3-button">CELINE</a>
                    <a href="#" class="w3-bar-item w3-button">CHANEL</a>
                    <a href="#" class="w3-bar-item w3-button">CHLOE</a>
                    <a href="#" class="w3-bar-item w3-button">COACH</a>
                    <a href="#" class="w3-bar-item w3-button">CARTIER</a>
                    <a href="#" class="w3-bar-item w3-button">DIOR</a>
                    <!--a href="#" class="w3-bar-item w3-button">DUNHILL</a>-->
                    <a href="#" class="w3-bar-item w3-button">FENDI</a>
                    <!--a href="#" class="w3-bar-item w3-button">FURLA</a>-->
                    <a href="#" class="w3-bar-item w3-button">GUCCI</a>
                    <!--a href="#" class="w3-bar-item w3-button">GIVENCHY</a>-->
                    <a href="#" class="w3-bar-item w3-button">HUGO BOSS</a>
                    <a href="#" class="w3-bar-item w3-button">HERMES</a>
                    <a href="#" class="w3-bar-item w3-button">JIMMY CHOO</a>
                    <!--a href="#" class="w3-bar-item w3-button">JACOB & CO</a>-->
                    <!--a href="#" class="w3-bar-item w3-button">KENZO</a>-->
                    <!--a href="#" class="w3-bar-item w3-button">LONGINES</a>-->
                    <!--a href="#" class="w3-bar-item w3-button">LOEWE</a>-->
                    <a href="#" class="w3-bar-item w3-button">LOUIS VUITTON</a>
                    <!--a href="#" class="w3-bar-item w3-button">MARC JACOBS</a>-->
                    <a href="#" class="w3-bar-item w3-button">MULBERRY</a>
                    <a href="#" class="w3-bar-item w3-button">MONTBLANC</a>
                    <a href="#" class="w3-bar-item w3-button">MIU MIU</a>
                    <a href="#" class="w3-bar-item w3-button">PATEK PHILIPPE</a>
                    <a href="#" class="w3-bar-item w3-button">PRADA</a>
                    <!--a href="#" class="w3-bar-item w3-button">RALPH LAUREN</a>-->
                    <a href="#" class="w3-bar-item w3-button">RAY BAN</a>
                    <a href="#" class="w3-bar-item w3-button">ROLEX</a>
                    <a href="#" class="w3-bar-item w3-button">SAINT LAURENT</a>
                    <a href="#" class="w3-bar-item w3-button">SALVATORE FERRAGAMO</a>
                    <a href="#" class="w3-bar-item w3-button">TAG HEUER</a>
                    <a href="#" class="w3-bar-item w3-button">TIFFANY & CO</a>
                    <a href="#" class="w3-bar-item w3-button">TOD'S</a>
                    <!--a href="#" class="w3-bar-item w3-button">TUMI</a>-->
                    <a href="#" class="w3-bar-item w3-button">TOMMY HILFIGER</a>
                    <a href="#" class="w3-bar-item w3-button">TUDOR</a>
                    <a href="#" class="w3-bar-item w3-button">VERSACE</a>
                    <a href="#" class="w3-bar-item w3-button">VALENTINO</a>
                    <a href="#" class="w3-bar-item w3-button">VIVIENNE WESTWOOD</a>
                    <a href="#" class="w3-bar-item w3-button">YVES SAINT LAURENT</a>
                    <a href="#" class="w3-bar-item w3-button">ZEGNA</a>
                </div>
            </div>

            <!--Color-->
            <div class="w3-dropdown-hover w3-black">
                <button class="w3-button w3-small">COLOR <i class="fa fa-caret-down"></i></button>
                <div class="w3-dropdown-content w3-bar-block w3-border w3-small">
                    <a href="#" class="w3-bar-item w3-button">BEIGE</a>
                    <a href="#" class="w3-bar-item w3-button">BLACK</a>
                    <a href="#" class="w3-bar-item w3-button">BLUE</a>
                    <a href="#" class="w3-bar-item w3-button">BROWN</a>
                    <a href="#" class="w3-bar-item w3-button">GOLD</a>
                    <a href="#" class="w3-bar-item w3-button">GREY</a>
                    <a href="#" class="w3-bar-item w3-button">GREEN</a>
                    <a href="#" class="w3-bar-item w3-button">ORANGE</a>
                    <a href="#" class="w3-bar-item w3-button">PINK</a>
                    <a href="#" class="w3-bar-item w3-button">PURPLE</a>
                    <a href="#" class="w3-bar-item w3-button">RED</a>
                    <a href="#" class="w3-bar-item w3-button">SILVER</a>
                    <a href="#" class="w3-bar-item w3-button">WHITE</a>
                    <a href="#" class="w3-bar-item w3-button">YELLOW</a>
                </div>
            </div>

            <!--Condition-->
            <div class="w3-dropdown-hover w3-black">
                <button class="w3-button w3-small">CONDITION <i class="fa fa-caret-down"></i></button>
                <div class="w3-dropdown-content w3-bar-block w3-border w3-small">
                    <a href="#" class="w3-bar-item w3-button">BRAND NEW</a>
                    <a href="#" class="w3-bar-item w3-button">PRE-LOVED</a>
                </div>
            </div>

            <!--Merchant-->
            <div class="w3-dropdown-hover w3-black">
                <button class="w3-button w3-small">MERCHANT <i class="fa fa-caret-down"></i></button>
                <div class="w3-dropdown-content w3-bar-block w3-border w3-small">
                    <a href="#" class="w3-bar-item w3-button">AMAZON</a>
                    <a href="#" class="w3-bar-item w3-button">EBAY</a>
                    <a href="#" class="w3-bar-item w3-button">REEBONZ</a>
                    <a href="#" class="w3-bar-item w3-button">EZBUY</a>
                    <a href="#" class="w3-bar-item w3-button">GUMTREE</a>
                </div>
            </div>
        </div>

        <br/>
        <p id="debug"></p>

        <div id="some_container" class="w3-row-padding w3-margin-top" style="max-height: inherit">

        </div>

        <!--        <div class="w3-row-padding w3-margin-top">
                    
                                <div class="w3-third">
                        <div class="w3-card">
                            <img src="images/sample_images/bag.png" style="width:100%">
                            <div class="w3-container">
                                <h5>Product Name: </h5>
                                <h5>Brand: </h5>
                                <h5>Color: </h5>
                                <h5>Condition: </h5>
                                <h5>Price: </h5>
                                <h5>Merchant: </h5>
                                <a href="https://www.w3schools.com/jsref/met_node_appendchild.asp"><button class="w3-button w3-block w3-border">View More</button></a>
                                <br/>
                            </div>
                        </div>
                    </div>
                </div>-->
      <?php include 'templateBar_bottom.php'; ?>
      <?php include 'templateBar_bottombottom.php'; ?>
    </body>
</html>
