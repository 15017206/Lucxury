<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1">
        <title></title>
        <style>
            img {
                height: 100px;
                width: 100px;
            }
        </style>

        <?php
        session_start();
        include 'scripts/bootstrap_scripts/bootstrap_scripts.php';
        if (!isset($_SESSION['merchant_id'])) {
            header("Location: merchant_dashboard_login.php");
            die();
        }
        ?>
        <script>
            $(document).ready(function () {
                var merchant_id = '<?php echo $_SESSION["merchant_id"]; ?>';
                var merchant_name = '<?php echo $_SESSION["merchant_name"]; ?>';
                var user_type = '<?php echo $_SESSION["user_type"]; ?>';
                populateBrands();
                populateColors();

                console.log("merchant id: " + merchant_id);
                console.log("merchant name: " + merchant_name);
                console.log("user type: " + user_type);

                $("#merchant_name").val(merchant_name);
                $("#merchant_id").val(merchant_id);
                var image_url;
                $.ajax({
                    type: "GET",
                    url: "Webservices/getMerchantsProductsByMerchantId.php",
                    data: {merchant_id: merchant_id},
                    cache: false,
                    dataType: "JSON",
                    success: function (response) {
                        for (var i = 0; i < response.length; i++) {
                            console.log("item storage id is: " + response[i]['item_storage_id']);
                            $("#some_container").append(
                                    '<tr>' +
                                    '<th scope="row">' + response[i]['item_storage_id'] + '</th>' +
                                    '<td>' + response[i]['itemstorage_name'] + '</td>' +
                                    '<td>' + response[i]['itemstorage_price_currency'] + '</td>' +
                                    '<td>' + response[i]['itemstorage_price_amount'] + '</td>' +
                                    '<td>' + response[i]['itemstorage_brand'] + '</td>' +
                                    '<td>' + response[i]['itemstorage_color'] + '</td>' +
                                    '<td>' + response[i]['itemstorage_condition'] + '</td>' +
                                    '<td>' + response[i]['merchant_name'] + '</td>' +
                                    "<td><a target='_blank' href='" + response[i]['itemstorage_more_info_url'] + "'>" + response[i]['itemstorage_more_info_url'] + "</td>" +
                                    "<td id='preceding"+ response[i]['item_storage_id'] +"'></td>" +
                                    "<td><a href='#'>Update</a><br/><a href='#' onclick='deleteItem(" + response[i]['item_storage_id'] + ")'>Delete</a></td>" +
                                    '</tr>' +
                                    '</tbody>' +
                                    '</table>')

                            // Inner ajax for retrieving multiple images per item
                            $.ajax({
                                type: "GET",
                                url: "Webservices/getImagesFromItemId.php",
                                data: {item_storage_id: response[i]['item_storage_id']},
                                cache: false,
                                dataType: "JSON",
                                success: function (response2) {
                                    for (var i = 0; i < response2.length; i++) {
                                        console.log("image response is: " + response2[i]['itemstorage_image_url']);
                                        image_url = response2[i]['itemstorage_image_url'];
                                        $('#preceding'+response2[i]['item_storage_id']).append("<td><a target='_blank' href='" + image_url + "'><img src='" + image_url + "'></td>");
                                    }
                                },
                                error: function (obj, textStatus, errorThrown) {
                                    console.log("Error " + textStatus + ": " + errorThrown);
                                }
                            });

                        }
                    },
                    error: function (obj, textStatus, errorThrown) {
                        console.log("Error " + textStatus + ": " + errorThrown);
                        $("#some_container").html("Sorry, No products here");
                    }
                });



                function populateBrands() {
                    $('#brand_container').empty();
                    $.ajax({
                        type: "GET",
                        url: "Webservices/getAllBrands.php",
                        cache: false,
                        dataType: "JSON",
                        success: function (response) {
                            console.log("brands count: " + response.length);
                            for (var i = 0; i < response.length; i++) {
                                $('#brand_container').append('<option value="' + response[i]['brand'] + '">' + response[i]['brand'] + '</option>');
                            }
                        },
                        error: function (obj, textStatus, errorThrown) {
                            console.log("Error " + textStatus + ": " + errorThrown);
                        }
                    });
                }

                function populateColors() {
                    $('#color_container').empty();
                    $.ajax({
                        type: "GET",
                        url: "Webservices/getAllColors.php",
                        cache: false,
                        dataType: "JSON",
                        success: function (response) {
                            console.log("colors count: " + response.length);
                            for (var i = 0; i < response.length; i++) {
                                $('#color_container').append('<option value="' + response[i]['color'] + '">' + response[i]['color'] + '</option>');
                            }
                        },
                        error: function (obj, textStatus, errorThrown) {
                            console.log("Error " + textStatus + ": " + errorThrown);
                        }
                    });
                }
            });
            function deleteItem(item_storage_id) {
                if (confirm("Are you sure?")) {

                }
            }
        </script>
    </head>
    <body>
        <div class="">
            <br/>
            <div id="some_container0">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Product name</th>
                            <th scope="col">Currency</th>
                            <th scope="col">Amount/$</th>
                            <th scope="col">Brand</th>
                            <th scope="col">Color</th>
                            <th scope="col">Condition</th>
                            <th scope="col">Merchant</th>
                            <th scope="col">URL</th>
                            <th scope="col">Image</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody id="some_container">  

                    </tbody>
                </table>
            </div>

        </div>


        <div class="container">
            <form method="post" action="do_merchant_product_upload.php" enctype="multipart/form-data">
                <h1 align="center">Product Upload</h1>

                <!--merchant-->
                <div class="form-group">
                    <label for="merchant">MERCHANT NAME</label>
                    <input readonly type="text" class="form-control" name="merchant_name" id="merchant_name" required placeholder="">
                </div>

                <!--merchant id-->
                <div class="form-group">
                    <label for="merchant">MERCHANT ID</label>
                    <input readonly type="text" class="form-control" name="merchant_id" id="merchant_id" required placeholder="">
                </div>

                <!--product name-->
                <div class="form-group">
                    <label for="productname">PRODUCT NAME</label>
                    <input type="text" class="form-control" name="productname" id="productname" aria-describedby="productnameHelp" required placeholder="">
                    <small id="productnameHelp" class="form-text text-muted">Product Model</small>
                    <small id="username_output" class=""></small>
                </div>

                <!--price-->
                <div class="form-group">
                    <label for="price">PRICE</label>
                    <div class="input-group mb-2">
                        <div class="input-group-prepend">
                            <div class="input-group-text">$</div>
                        </div>
                        <input type="number" class="form-control" name="price" id="price" aria-describedby="priceHelp" required placeholder="">
                    </div>
                    <small id="priceHelp" class="form-text text-muted">Price in SGD e.g $399.00</small>
                    <small id="username_output" class=""></small>
                </div>
                <!--brand-->
                <div class="form-group">
                    <label for="brand">BRAND</label>
                    <!--<input type="text" class="form-control" name="brand" id="brand" required placeholder="">-->
                    <select id="brand_container" name="brand" class="form-control">
                    </select>
                </div>

                <!--color-->
                <div class="form-group">
                    <label for="color">COLOR</label>
                    <!--<input type="text" class="form-control" name="color" id="color" required placeholder="">-->
                    <select id="color_container" name="color" class="form-control">
                    </select>
                </div>

                <!--condition-->
                <div class="form-group">
                    <label for="condition">CONDITION</label>
                    <!--<input type="text" class="form-control" name="condition" id="condition" required placeholder="">-->
                    <select class="form-control" name="condition">
                        <option value="Brand New">Brand New</option>
                        <option value="Preloved">Preloved</option>
                    </select>
                </div>

                <!--URL-->
                <div class="form-group">
                    <label for="url">Product URL (Merchant's website):</label>
                    <div class="input-group mb-2">
                        <div class="input-group-prepend">
                            <div class="input-group-text">http://</div>
                        </div>
                        <input type="text" class="form-control" name="url" id="url" required placeholder="">
                    </div>
                    <small id="urlHelp" class="form-text text-muted">Just key in wwww.yourwebsitehere.com</small>
                </div>

                <!--image_upload-->
                <div class="form-group">
                    <label for="image">IMAGE</label>
                    <input type="file" accept="image/*" class="form-control" name="fileToUpload" id="fileToUpload" required placeholder="">
                </div>

                <button type="submit" class="btn btn-primary" style="width:20%">UPLOAD</button>
                <br/>
                <br/>
            </form>
        </div>
    </body>
</html>
