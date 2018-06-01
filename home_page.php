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
        <!--<script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>-->

        <!--Popper JS--> 
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.6/umd/popper.min.js"></script>

        <!--Latest compiled JavaScript--> 
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js"></script>

        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

        <!--CSS -->
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

        <!--script-->
        <script>
        </script>

        <!--style-->
        <style>
            a {
                color: black;
            }

            .dropdown-menu {
                position: absolute;
            }
            img#banner1 {
                max-width: 100%;
                width: 100vw;
                /*max-height: 100%;*/
            }
        </style>

        <title></title>
    </head>

    <body>
        <!--carousel-->
        <div id="demo" class="carousel slide" data-ride="carousel" style="width:100%">

            <!-- Indicators -->
            <ul class="carousel-indicators">
                <li data-target="#demo" data-slide-to="0" class="active"></li>
                <li data-target="#demo" data-slide-to="1" class="active"></li>
                <li data-target="#demo" data-slide-to="2" class="active"></li>
            </ul>

            <!-- The slideshow -->
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <a href=""><img id="banner1" src="images/home_page_images/es.jpg" alt=""/></a>
                    <div class="carousel-caption">
                        <h3></h3>
                    </div>
                </div>
                <div class="carousel-item">
                    <a href=""><img id="banner1" src="images/home_page_images/es.jpg" alt=""/></a>
                    <div class="carousel-caption">
                        <h3></h3>
                    </div>
                </div>
                <div class="carousel-item">
                    <a href=""><img id="banner1" src="images/home_page_images/es.jpg" alt=""/></a>
                    <div class="carousel-caption">
                        <h3></h3>
                    </div>
                </div>
            </div>

            <!-- Left and right controls -->
            <a class="carousel-control-prev" href="#demo" data-slide="prev">
                <span class="carousel-control-prev-icon"></span>
            </a>
            <a class="carousel-control-next" href="#demo" data-slide="next">
                <span class="carousel-control-next-icon"></span>
            </a>
        </div>

        <div class="w3-row w3-mobile">
            <form action="product_page.php" method="post">
                <div class="w3-col" style="width:100%">
                    <input name="search_item" class="w3-input w3-border w3-leftbar w3-margin-top w3-margin-bottom" placeholder="SEARCH ITEM HERE" type="text">
                </div>
                <div class="w3-row w3-half w3-mobile " style="width:100%">
                    <button type="submit" class="w3-button w3-block w3-tiny w3-white w3-hover-white"><i class="material-icons">search</i></button>
                </div>
            </form>
        </div>



        <!--featured carousel-->
        <div id="demo" class="carousel slide" data-ride="carousel" style="width:100%">

            <!-- Indicators -->
            <ul class="carousel-indicators">
                <li data-target="#demo" data-slide-to="0" class="active"></li>
                <!--                <li data-target="#demo" data-slide-to="1"></li>
                                <li data-target="#demo" data-slide-to="2"></li>-->
            </ul>

<!--<img id="banner1" src="images/home_page_images/fm.jpg" alt="" style=""/>-->

            <!-- The featured -->

            <div class="w3">
                <div class=" w3-third">
                    <button class="w3-btn"><img id="banner1" src="images/home_page_images/secondlevel_picture_resized1.jpg" alt="" style=""/></btn>
                        <div class="w3-display-middle w3-large" style="color: white"></div>
                </div>
                <div class="w3-third">
                    <button class="w3-btn"><img id="banner1" src="images/home_page_images/secondlevel_picture_resized2.jpg" alt="" style=""/></btn>
                        <div class="w3-display-middle w3-large" style="color: white"></div>
                </div>
                <div class="w3-third">
                    <button class="w3-btn"><img id="banner1" src="images/home_page_images/secondlevel_picture_resized3.jpg" alt="" style=""/></btn>
                        <div class="w3-display-middle w3-large" style="color: white"></div>
                </div>
            </div>
            </br>
            <!-- Left and right controls -->
            <a class="carousel-control-prev" href="#demo" data-slide="prev">
                <span class="carousel-control-prev-icon"></span>
            </a>
            <a class="carousel-control-next" href="#demo" data-slide="next">
                <span class="carousel-control-next-icon"></span>
            </a>

        </div>

            <!--<img id="banner1" src="images/home_page_images/category.jpg" alt="" style=""/>-->
        <!--men & women carousel-->
        <div class="w3">
            <div class=" w3-half w3-btn w3-display-container">
                <a href="category_page_men1.php"><img id="banner1" src="images/home_page_images/thirdlevel_picture_men_resized.jpg" alt="" style=""/></a>
                <div class="w3-display-middle w3-xlarge" style="color: white"><b></b></div>
            </div>    

            <div class="w3-half w3-btn w3-display-container">
                <a href="category_page_women1.php"><img id="banner1" src="images/home_page_images/thirdlevel_picture_women_resized.jpg" alt="" style=""/></a>
                <div class="w3-display-middle w3-xlarge" style="color: white"><b></b></div>
            </div>
        </div>
        <?php include 'templateBar_bottom.php'; ?>
        <?php include 'templateBar_bottombottom.php'; ?>
    </body>
</html>
