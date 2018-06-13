<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1">
        <title></title>

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
                console.log("merchant id: " + merchant_id);
                console.log("merchant name: " + merchant_name);
                console.log("user type: " + user_type);

                $("#merchant_name").val(merchant_name);
                $("#merchant_id").val(merchant_id);

                $.ajax({
                    type: "GET",
                    url: "Webservices/getMerchantsProductsByMerchantId.php",
                    data: {merchant_id: "1"},
                    cache: false,
                    dataType: "JSON",
                    success: function (response) {
                        console.log(response);
                        for (var i = 0; i < response.length; i++) {
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
                                    '<td>' + response[i]['itemstorage_more_info_url'] + '</td>' +
                                    '<td>' + response[i]['itemstorage_image_url'] + '</td>' +
                                    '</tr>' +
                                    '</tbody>' +
                                    '</table>')
                        }
                    },
                    error: function (obj, textStatus, errorThrown) {
                        console.log("Error " + textStatus + ": " + errorThrown);
                        alert("fail");
                    }
                });


            });
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
                            <th scope="col">Amount</th>
                            <th scope="col">Brand</th>
                            <th scope="col">Color</th>
                            <th scope="col">Condition</th>
                            <th scope="col">Merchant</th>
                            <th scope="col">URL</th>
                            <th scope="col">Image</th>
                        </tr>
                    </thead>
                    <tbody id="some_container">  

                    </tbody>
                </table>
            </div>

        </div>


        <div class="container">
            <form method="post" action="do_merchant_product_upload.php">
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
                    <small id="productnameHelp" class="form-text text-muted">Describe your product</small>
                    <small id="username_output" class=""></small>
                </div>

                <!--price-->
                <div class="form-group">
                    <label for="price">PRICE</label>
                    <input type="text" class="form-control" name="price" id="price" aria-describedby="priceHelp" required placeholder="">
                    <small id="priceHelp" class="form-text text-muted">Price in SGD e.g $399.00</small>
                    <small id="username_output" class=""></small>
                </div>

                <!--brand-->
                <div class="form-group">
                    <label for="brand">BRAND</label>
                    <input type="text" class="form-control" name="brand" id="brand" required placeholder="">
                </div>

                <!--brand-->
                <div class="form-group">
                    <label for="color">COLOR</label>
                    <input type="text" class="form-control" name="color" id="color" required placeholder="">
                </div>


                <!--condition-->
                <div class="form-group">
                    <label for="condition">CONDITION</label>
                    <input type="text" class="form-control" name="condition" id="condition" required placeholder="">
                </div>

                <!--URL-->
                <div class="form-group">
                    <label for="url">URL</label>
                    <input type="text" class="form-control" name="url" id="url" required placeholder="">
                </div>

                <!--image_upload-->
                <div class="form-group">
                    <label for="image">IMAGE</label>
                    <input type="text" class="form-control" name="image" id="image" required placeholder="">
                </div>

                <button type="submit" class="btn btn-primary" style="width:20%">UPLOAD</button>
                <br/>
                <br/>
            </form>
        </div>
    </body>
</html>
