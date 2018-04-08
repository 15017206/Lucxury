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
                <!--                <li data-target="#demo" data-slide-to="1"></li>
                                <li data-target="#demo" data-slide-to="2"></li>-->
            </ul>

            <!-- The Banner 1 IMAGE-->
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <a href=""><img id="banner1" src="images/news_images/banner.jpeg" alt=""/></a>
                    <div class="carousel-caption">
                        <h6></h6>
                    </div>
                </div>
            </div>
            <!-- The Banner 1 TEXT -->
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <a href=""><img id="banner1" src="images/news_images/text1.jpg" alt=""/></a>
                    <div class="carousel-caption">
                        <h6></h6>
                    </div>
                </div>
            </div>

            <!-- The Banner 1 IMAGE-->
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <a href=""><img id="banner1" src="images/news_images/banner.jpeg" alt=""/></a>
                    <div class="carousel-caption">
                        <h6></h6>
                    </div>
                </div>
            </div>
            <!-- The Banner 1 TEXT -->
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <a href=""><img id="banner1" src="images/news_images/text1.jpg" alt=""/></a>
                    <div class="carousel-caption">
                        <h6></h6>
                    </div>
                </div>
            </div>
            <?php include 'templateBar_bottom.php'; ?>
    </body>
</html>
