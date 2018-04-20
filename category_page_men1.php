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
                font-size: 7vmin;
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

            <!--Apparels-->
            <div class="w3-display-container">
            <form action="subcategory_page_men1.php" method="post">
                <input type="hidden" name="search_item" value="shirts">
                <button class="w3-btn"><img id="banner1" src="images/category_page_men_images/apparels.jpg" alt=""/></button>
            </form>
            </div>

            <!--Accessories-->
            <div class="w3-display-container">
            <form action="subcategory_page_men2.php" method="post">
                <input type="hidden" name="search_item" value="accessories">
                <button class="w3-btn"><img id="banner1" src="images/category_page_men_images/accessories.jpg" alt=""/></button>
            </form>
            </div>

            <!--Bags-->
            <div class="w3-display-container">
            <form action="subcategory_page_men3.php" method="post">
                <input type="hidden" name="search_item" value="bags">
                <button class="w3-btn"><img id="banner1" src="images/category_page_men_images/bags.jpg" alt=""/></button>
            </form>
            </div>

            <!--Shoes-->
            <div class="w3-display-container">
            <form action="subcategory_page_men4.php" method="post">
                <input type="hidden" name="search_item" value="shoes">
                <button class="w3-btn"><img id="banner1" src="images/category_page_men_images/shoes.jpg" alt=""/></button>
            </form>
            </div>
            </br>
        <?php include 'templateBar_bottom.php'; ?>
        <?php include 'templateBar_bottombottom.php'; ?>
        </body>
    </html>
