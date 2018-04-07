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
        </style>

        <title></title>
    </head>

    <body>

        <!--Apparels-->
        <div class="w3-display-container">
            <a href="subcategory_page_women1.php"><img id="banner1" style="filter: brightness(70%);" src="images/category_page_women_images/apparels.png" alt=""/></a>
            <div class="w3-display-middle w3-large"><p style="">APPARELS</p></div>
        </div>

        <!--Accessories-->
        <div class="w3-display-container">
            <a href="subcategory_page_women2.php"><img id="banner1" style="filter: brightness(70%);" src="images/category_page_women_images/bags.png" alt=""/></a>
            <div class="w3-display-middle w3-large"><p style="">ACCESSORIES</p></div>
        </div>

        <!--Bags-->
        <div class="w3-display-container">
            <a href="subcategory_page_women3.php"><img id="banner1" style="filter: brightness(70%);"src="images/category_page_women_images/accessories.png" alt=""/></a>
            <div class="w3-display-middle w3-large"><p style="">BAGS</p></div>
        </div>

        <!--Shoes-->
        <div class="w3-display-container">
            <a href="subcategory_page_women4.php"><img id="banner1" style="filter: brightness(70%);" src="images/category_page_women_images/shoes.png" alt=""/></a>
            <div class="w3-display-middle w3-large"><p style="">SHOES</p></div>
        </div>
    </body>
</html>