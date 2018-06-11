<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->

<html>
    <head>
        <meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1">
        <title></title>
        <?php include 'scripts/bootstrap_scripts/bootstrap_scripts.php'; ?>
        <script>
        </script>
    </head>
    <body>
        <div class="container">
            <form method="post" action="do_merchant_product_upload.php">
                <h1 align="center">Product Upload</h1>

                <!--product name-->
                <div class="form-group">
                    <label for="username">PRODUCT NAME</label>
                    <input type="text" class="form-control" name="productname" id="productname" aria-describedby="productnameHelp" required placeholder="">
                    <small id="productnameHelp" class="form-text text-muted">Describe your product</small>
                    <small id="username_output" class=""></small>
                </div>

                <!--price-->
                <div class="form-group">
                    <label for="username">PRICE</label>
                    <input type="text" class="form-control" name="price" id="price" aria-describedby="priceHelp" required placeholder="">
                    <small id="priceHelp" class="form-text text-muted">Price in SGD e.g $399.00</small>
                    <small id="username_output" class=""></small>
                </div>

                <!--brand-->
                <div class="form-group">
                    <label for="password">BRAND</label>
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


                <!--merchant-->
             <div class="form-group">
                    <label for="condition">MERCHANT</label>
                    <input type="text" class="form-control" name="merchant" id="merchant" required placeholder="">
                </div>

                <!--URL-->
             <div class="form-group">
                    <label for="condition">URL</label>
                    <input type="text" class="form-control" name="url" id="url" required placeholder="">
                </div>

                  <!--image_upload-->
             <div class="form-group">
                    <label for="condition">IMAGE</label>
                    <input type="text" class="form-control" name="image" id="image" required placeholder="">
                </div>

                <button type="submit" class="btn btn-primary" style="width:20%">UPLOAD</button>

               <br/>
            </form>
        </div>
    </body>
</html>
