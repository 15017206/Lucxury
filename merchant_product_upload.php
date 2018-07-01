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
        include 'merchant_navbar.php';
        if (!isset($_SESSION['merchant_id'])) {
            header("Location: merchant_dashboard_login.php");
            die();
        }
        ?>
        <script>
            $(document).ready(function () {
                product_name = "";
                var merchant_id = '<?php echo $_SESSION["merchant_id"]; ?>';
                var merchant_name = '<?php echo $_SESSION["merchant_name"]; ?>';
                var user_type = '<?php echo $_SESSION["user_type"]; ?>';
                populateBrands();
                populateColors();
//                $('#table_product_inv').hide("fast");
                console.log("merchant id: " + merchant_id);
                console.log("merchant name: " + merchant_name);
                console.log("user type: " + user_type);

                $("#merchant_name").val(merchant_name);
                $("#merchant_id").val(merchant_id);
                var image_url;

                $('#productname').blur(function () {
                    var xy = $(this).val();
                    if (xy.indexOf("'") > -1 || xy.indexOf('"') > -1) {
                        $('#productname').attr('class', 'form-control is-invalid');
                        $('#productname_output').attr('class', 'invalid-feedback');
                        $('#productname_output').text("No special characters allowed such as - \' or \"     ");
                        $(':input[type="submit"]').prop('disabled', true);
                    } else if ($(this).val() != "") {
                        checkProductName($(this).val());
                    }
                });

//                $('#productname2').blur(function () {
//                    if ($(this).val() != "") {
//                        checkProductName($(this).val());
//                    }
//                });

                $.ajax({
                    type: "GET",
                    url: "Webservices/getMerchantsProductsByMerchantId.php",
                    data: {merchant_id: merchant_id},
                    cache: false,
                    dataType: "JSON",
                    success: function (response) {
                        console.log("response getMProds: " + response);
                        if (response != null) {
                            for (var i = 0; i < response.length; i++) {
                                console.log("item storage id is: " + response[i]['item_storage_id']);
                                $("#some_container").append(
                                        '<tr>' +
                                        '<th scope="row">' + response[i]['item_storage_id'] + '</th>' +
                                        '<td style ="word-break:break-all;">' + response[i]['itemstorage_name'] + '</td>' +
                                        '<td style ="word-break:break-all;">' + 'category' + '</td>' +
                                        '<td style ="word-break:break-all;">' + response[i]['itemstorage_price_currency'] + '</td>' +
                                        '<td style ="word-break:break-all;">' + response[i]['itemstorage_price_amount'] + '</td>' +
                                        '<td style ="word-break:break-all;">' + response[i]['itemstorage_brand'] + '</td>' +
                                        '<td style ="word-break:break-all;">' + response[i]['itemstorage_color'] + '</td>' +
                                        '<td style ="word-break:break-all;">' + response[i]['itemstorage_condition'] + '</td>' +
                                        '<td style ="word-break:break-all;">' + response[i]['merchant_name'] + '</td>' +
                                        "<td style ='word-break:break-all;'><a target='_blank' href='" + response[i]['itemstorage_more_info_url'] + "'>" + response[i]['itemstorage_more_info_url'] + "</td>" +
                                        "<td style ='word-break:break-all;' id='preceding" + response[i]['item_storage_id'] + "'></td>" +
                                        "<td style ='word-break:break-all;'><a href='#' data-toggle='modal' data-target='#exampleModalCenter' onclick='populateFormViaUpdateBtn(" + response[i]['item_storage_id'] + ")'>Edit</a><br/><a href='#' onclick='deleteItem(" + response[i]['item_storage_id'] + ")'>Delete</a></td>" +
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
                                            $('#preceding' + response2[i]['item_storage_id']).append("<td><a target='_blank' href='" + image_url + "'><img src='" + image_url + "'></td>");
                                        }
                                    },
                                    error: function (obj, textStatus, errorThrown) {
                                        console.log("Error " + textStatus + ": " + errorThrown);
                                    }
                                });
                            }
                        }

                    },
                    error: function (obj, textStatus, errorThrown) {
                        console.log("nth in prod inv/Error " + textStatus + ": " + errorThrown);
                        $("#some_container").html("Sorry, No products here");
                    }
                });

                $('#btn_upload_hide').click(function () {
                    $('#form_product_upload').toggle("fast");
                });

                $('#btn_inventory_hide').click(function () {
                    $('#table_product_inv').toggle("fast");
                });
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
                            $('#brand_container2').append('<option value="' + response[i]['brand'] + '">' + response[i]['brand'] + '</option>');
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
                            $('#color_container2').append('<option value="' + response[i]['color'] + '">' + response[i]['color'] + '</option>');
                        }
                    },
                    error: function (obj, textStatus, errorThrown) {
                        console.log("Error " + textStatus + ": " + errorThrown);
                    }
                });
            }

            function populateFormViaUpdateBtn(item_storage_id) {

                $.ajax({
                    type: "GET",
                    url: "Webservices/getItemFromProductId.php",
                    data: {item_id: item_storage_id},
                    cache: false,
                    dataType: "JSON",
                    success: function (response) {
                        product_name = response['itemstorage_name'];
                        $('#product_id2').val(response['item_storage_id']);
                        $('#productname2').val(response['itemstorage_name']);
                        $('#price2').val(response['itemstorage_price_amount']);
                        $('#brand_container2').val(response['itemstorage_brand']);
                        $('#color_container2').val(response['itemstorage_color']);
                        $('#condition2').val(response['itemstorage_condition']);
                        $('#url2').val((response['itemstorage_more_info_url'] + "").substring(7));
                    },
                    error: function (obj, textStatus, errorThrown) {
                        console.log("Error " + textStatus + ": " + errorThrown);
                    }
                });
            }

            function deleteItem(item_storage_id) {
                if (confirm("Are you sure?")) {
                    $.ajax({
                        type: "GET",
                        url: "Webservices/deleteProductById.php",
                        data: {item_storage_id: item_storage_id},
                        cache: false,
//                        dataType: "JSON",
                        success: function (response) {
                            console.log("result for deletion: " + response);
                            location.reload();
                        },
                        error: function (obj, textStatus, errorThrown) {
                            console.log("Error " + textStatus + ": " + errorThrown);
                        }
                    });
                }
            }

            function checkProductName(product_name) {
                $.ajax({
                    type: "GET",
                    url: "Webservices/getProductNameByName.php",
                    data: {product_name: product_name},
                    cache: false,
//                    dataType: "JSON",
                    success: function (response) {
                        if (response == "product name found") {
                            $('#productname').attr('class', 'form-control is-invalid');
//                            $('#productname2').attr('class', 'form-control is-invalid');
                            $('#productname_output').attr('class', 'invalid-feedback');
//                            $('#productname_output2').attr('class', 'invalid-feedback');
                            $('#productname_output').text(product_name + " has been assigned to another product. Please choose another.");
//                            $('#productname_output2').text(product_name + " has been assigned to another product. Please choose another.");
                            $(':input[type="submit"]').prop('disabled', true);
                        } else {
                            $('#productname').attr('class', 'form-control is-valid');
                            $('#productname2').attr('class', 'form-control is-valid');
                            $('#productname_output').attr('class', 'valid-feedback');
//                            $('#productname_output2').attr('class', 'valid-feedback');
                            $('#productname_output').text(product_name + " is available.");
//                            $('#productname_output2').text(product_name + " is available.");
                            $(':input[type="submit"]').prop('disabled', false);
                        }
                    },
                    error: function (obj, textStatus, errorThrown) {
                        console.log("Error " + textStatus + ": " + errorThrown);
                        $("#some_container").html("Sorry, No products here");
                    }
                });
            }
        </script>
    </head>
    <body>
        <div class="">
            <br/>
            <div class="container-fluid" id="some_container0">
                <div class="alert alert-dark" role="alert">
                    <button id="btn_inventory_hide" type="button" class="btn btn-primary btn-sm">Hide/View Product Inventory</button>
                    <h1 align="center">PRODUCT INVENTORY</h1>
                    <table class="table" id="table_product_inv">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Product name</th>
                                <th scope="col">Category</th>
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
                </div></div>
        </div>

        <div class="container-fluid">
            <div class="alert alert-dark" role="alert">
                <button id="btn_upload_hide" type="button" class="btn btn-primary btn-sm">Hide/View Product Upload</button>

                <h1 align="center">PRODUCT UPLOAD</h1>
                <form id="form_product_upload" method="post" action="do_merchant_product_upload.php" enctype="multipart/form-data">
                    <!--merchant name-->
                    <div class="form-group">
                        <label for="merchant">MERCHANT NAME</label>
                        <input readonly type="text" class="form-control" name="merchant_name" id="merchant_name" required placeholder="">
                    </div>

                    <!--merchant id-->
                    <div class="form-group">
                        <label hidden for="merchant">MERCHANT ID</label>
                        <input hidden readonly type="text" class="form-control" name="merchant_id" id="merchant_id" required placeholder="">
                    </div>

                    <!--product name-->
                    <div class="form-group">
                        <label for="productname">PRODUCT NAME</label>
                        <input type="text" class="form-control" name="productname" id="productname" aria-describedby="productnameHelp" required placeholder="">
                        <small id="productnameHelp" class="form-text text-muted">Product Model - It cannot be changed later on. Alphanumeric only.</small>
                        <small id="productname_output" class=""></small>
                    </div>

                    <div class="form-group">
                        <label for="productcategory">PRODUCT CATEGORY</label>
                        <input type="text" class="form-control" name="productcategory" id="productcategory" aria-describedby="productcategoryHelp" required placeholder="">
                        <small id="productcategoryHelp" class="form-text text-muted"></small>
                        <small id="productcategory_output" class=""></small>
                    </div>

                    <!--price-->
                    <div class="form-group">
                        <label for="price">PRICE</label>
                        <div class="input-group mb-2">
                            <div class="input-group-prepend">
                                <div class="input-group-text">$</div>
                            </div>
                            <input type="number" step="0.01" class="form-control" name="price" id="price" aria-describedby="priceHelp" required placeholder="">
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
                        <select class="form-control" id="condition" name="condition">
                            <option value="BRAND NEW">BRAND NEW</option>
                            <option value="PRE LOVED">PRE LOVED</option>
                        </select>
                    </div>

                    <!--URL-->
                    <div class="form-group">
                        <label for="url">Product URL (Merchant's website):</label>
                        <div class="input-group mb-2">
                            <!--                            <div class="input-group-prepend">
                                                            <div class="input-group-text">http://</div>
                                                        </div>-->
                            <input type="text" class="form-control" name="url" id="url" required placeholder="">
                        </div>
                        <small id="urlHelp" class="form-text text-muted"></small>
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

            <!-- Modal -->
            <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <form action="Webservices/updateMerchantItems.php" method="post">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalCenterTitle">Edit Item</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">

                                <!--merchant name-->
                                <!--                            <div class="form-group">
                                                                <label for="merchant">MERCHANT NAME</label>
                                                                <input readonly type="text" class="form-control" name="merchant_name2" id="merchant_name2" required placeholder="">
                                                            </div>-->

                                <!--merchant id-->
                                <!--                            <div class="form-group">
                                                                <label for="merchant">MERCHANT ID</label>
                                                                <input readonly type="text" class="form-control" name="merchant_id2" id="merchant_id2" required placeholder="">
                                                            </div>-->

                                <!--product id-->
                                <div class="form-group">
                                    <label for="product_id">PRODUCT ID</label>
                                    <input readonly type="text" class="form-control" name="product_id2" id="product_id2" required placeholder="">
                                </div>

                                <!--product name-->
                                <div class="form-group">
                                    <label for="productname">PRODUCT NAME</label>
                                    <input type="text" class="form-control" name="productname2" readonly id="productname2" aria-describedby="productnameHelp" required placeholder="">
                                    <small id="productnameHelp" class="form-text text-muted">Product Model</small>
                                    <small id="productname_output2" class=""></small>
                                </div>

                                <div class="form-group">
                                    <label for="productcategory2">PRODUCT CATEGORY</label>
                                    <input type="text" class="form-control" name="productcategory2" id="productcategory2" aria-describedby="productcategory2Help" required placeholder="">
                                    <small id="productcategory2Help" class="form-text text-muted"></small>
                                    <small id="productcategory2_output" class=""></small>
                                </div>

                                <!--price-->
                                <div class="form-group">
                                    <label for="price">PRICE</label>
                                    <div class="input-group mb-2">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">$</div>
                                        </div>
                                        <input type="number" step="0.01" class="form-control" name="price2" id="price2" aria-describedby="priceHelp" required placeholder="">
                                    </div>
                                    <small id="priceHelp" class="form-text text-muted">Price in SGD e.g $399.00</small>
                                    <small id="username_output" class=""></small>
                                </div>
                                <!--brand-->
                                <div class="form-group">
                                    <label for="brand">BRAND</label>
                                    <!--<input type="text" class="form-control" name="brand" id="brand" required placeholder="">-->
                                    <select id="brand_container2" name="brand2" class="form-control">
                                    </select>
                                </div>

                                <!--color-->
                                <div class="form-group">
                                    <label for="color">COLOR</label>
                                    <!--<input type="text" class="form-control" name="color" id="color" required placeholder="">-->
                                    <select id="color_container2" name="color2" class="form-control">
                                    </select>
                                </div>

                                <!--condition-->
                                <div class="form-group">
                                    <label for="condition">CONDITION</label>
                                    <!--<input type="text" class="form-control" name="condition" id="condition" required placeholder="">-->
                                    <select class="form-control" id="condition2" name="condition2">
                                        <option value="BRAND NEW">BRAND NEW</option>
                                        <option value="PRE LOVED">PRE LOVED</option>
                                    </select>
                                </div>

                                <!--URL-->
                                <div class="form-group">
                                    <label for="url">Product URL (Merchant's website):</label>
                                    <div class="input-group mb-2">
                                        <!--                                        <div class="input-group-prepend">
                                                                                    <div class="input-group-text">http://</div>
                                                                                </div>-->
                                        <input type="text" class="form-control" name="url2" id="url2" required placeholder="">
                                    </div>
                                    <small id="urlHelp" class="form-text text-muted"></small>
                                </div>

                                <!--image_upload-->
                                <!--                            <div class="form-group">
                                                                <label for="image">IMAGE</label>
                                                                <input type="file" accept="image/*" class="form-control" name="fileToUpload" id="fileToUpload" required placeholder="">
                                                            </div>-->

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Save changes</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>


        </div>
    </body>
</html>
