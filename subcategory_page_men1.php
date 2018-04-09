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
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css">

        <!--jQuery library--> 
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

        <!--Popper JS--> 
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.6/umd/popper.min.js"></script>

        <!--Latest compiled JavaScript--> 
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js"></script>

        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

        <!--CSS -->
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

        <!--style-->
        <style>
            a {
                color: black;
            }
            #topbarlogo {
                max-width: 100%;
            }

            #banner1 {
                height: auto;
                width: 100vw;
            }
            p {
                font-size: 6vmin;
                font-family: "Times New Roman";
                text-align: center;
            }

            .w3-display-middle {
                color: white;
                max-width: 100%;
            }

            #cell1 {
                max-width: 100%;
                min-width: 100%;
                min-height: 100%;
                max-height: 100%;

            }

        </style>

        <title></title>
    </head>

    <body>

        <div class="w3-half">
            <form action="product_page.php" method="post">
                <input type="hidden" name="search_item" value="shirts">
                <button class="w3-btn"><img id="cell1" src="images/subcategory_page_men1_images/Shirts.jpg" alt=""/></button>
            </form>
        </div>

        <div class="w3-half">
            <form action="product_page.php" method="post">
                <input type="hidden" name="search_item" value="suits">
                <button class="w3-btn"><img id="cell1" src="images/subcategory_page_men1_images/Suits.jpg" alt=""/></button>
            </form>
        </div>


        <div class="w3-half">
            <form action="product_page.php" method="post">
                <input type="hidden" name="search_item" value="jackets">
                <button class="w3-btn"><img id="cell1" src="images/subcategory_page_men1_images/Jacket.jpg" alt=""/></button>
            </form>
        </div>
        <div class="w3-half">
            <form action="product_page.php" method="post">
                <input type="hidden" name="search_item" value="sweaters">
                <button class="w3-btn"><img id="cell1" src="images/subcategory_page_men1_images/Sweater.jpg" alt=""/></button>
            </form>
        </div>



        <div class="w3-half">
            <form action="product_page.php" method="post">
                <input type="hidden" name="search_item" value="tshirts">
                <button class="w3-btn"><img id="cell1" src="images/subcategory_page_men1_images/TShirts.jpg" alt=""/></button>
            </form>
        </div>
        <div class="w3-half">
            <form action="product_page.php" method="post">
                <input type="hidden" name="search_item" value="sweatshirts">
                <button class="w3-btn"><img id="cell1" src="images/subcategory_page_men1_images/Sweatshirts.jpg" alt=""/></a></button>
            </form>
        </div>

        <div class="w3-half">
            <form action="product_page.php" method="post">
                <input type="hidden" name="search_item" value="pants">
                <button class="w3-btn"><img id="cell1" src="images/subcategory_page_men1_images/Pants.jpg" alt=""/></button>
            </form>
        </div>
        <div class="w3-half">
            <form action="product_page.php" method="post">
                <input type="hidden" name="search_item" value="denim">
                <button class="w3-btn"><img id="cell1" src="images/subcategory_page_men1_images/Denim.jpg" alt=""/></button>
            </form>
        </div>
    <?php include 'templateBar_bottom.php'; ?>
    <?php include 'templateBar_bottombottom.php'; ?>
    </body>
</html>
