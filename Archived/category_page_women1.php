<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->

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
            function w3_topbar_toggle() {
                if (document.getElementById("mySidebar").style.display === "block") {
                    w3_close();
                } else {
                    w3_open();
                }
            }

            function w3_open() {
                document.getElementById("mySidebar").style.display = "block";
            }
            function w3_close() {
                document.getElementById("mySidebar").style.display = "none";
            }


            

        </script>

        <!--style-->
        <style>
            a {
                color: black;
            }
            #topbarlogo {
                max-width: 100%;
            }

            img {
                max-width: 100%;
                height: auto;


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

            <!--Highest navbar-->
            <nav class="navbar navbar-expand">
                <div class="container-fluid ">
                    <ul class="nav navbar-nav">
                        <li id="notifications2"><button class="w3-button w3-large" onclick="w3_topbar_toggle()">☰</button></li>

                    </ul>

                    <ul class="nav navbar-nav">
                        <li id="notifications2"><a href="#"><img id="topbarlogo" src="images/lucxurylogo.PNG" alt="" style="max-width:100%; max-height: 50px;"/></a></li>

                    </ul>
                    <ul class="nav navbar-nav">
                        <li id="notifications3"><a href="#"><i class="material-icons">notifications</i></a></li>
                    </ul>
                </div>
            </nav>

            <!-- Sidebar -->
            <div class="w3-sidebar w3-bar-block w3-border-right w3-animate-left"style="display:none" id="mySidebar">
                <button onclick="w3_close()" class="w3-bar-item w3-large">ADELINE LUI</button>

                <a href="#" class="w3-bar-item w3-button w3-small w3-border-bottom w3-hover-black">HOME</a>
                <a href="#" class="w3-bar-item w3-button w3-small w3-border-bottom w3-hover-black">PROFILE</a>
                <a href="#" class="w3-bar-item w3-button w3-small w3-border-bottom w3-hover-black">PROMOTION</a>
                <a href="#" class="w3-bar-item w3-button w3-small w3-border-bottom w3-hover-black">NEWS</a>
                <a href="#" class="w3-bar-item w3-button w3-small w3-border-bottom w3-hover-black">HOW TO USE</a>
                <a href="#" class="w3-bar-item w3-button w3-small w3-border-bottom w3-hover-black">SETTINGS</a>
                <a href="#" class="w3-bar-item w3-button w3-small w3-border-bottom w3-hover-black">FAQ</a>
                <a href="#" class="w3-bar-item w3-button w3-small w3-border-bottom w3-hover-black">LOGOUT</a>
            </div>

            <!--Apparels-->
            <div class="w3-display-container">
                <a href=""><img style="filter: brightness(70%);" src="images/category_page_women_images/apparels.png" alt=""/></a>
                <div class="w3-display-middle w3-large"><p style="">APPARELS</p></div>
            </div>

            <!--Accessories-->
            <div class="w3-display-container">
                <a href=""><img style="filter: brightness(70%);" src="images/category_page_women_images/bags.png" alt=""/></a>
                <div class="w3-display-middle w3-large"><p style="">ACCESSORIES</p></div>
            </div>

            <!--Bags-->
            <div class="w3-display-container">
                <a href=""><img style="filter: brightness(70%);"src="images/category_page_women_images/accessories.png" alt=""/></a>
                <div class="w3-display-middle w3-large"><p style="">BAGS</p></div>
            </div>

            <!--Shoes-->
            <div class="w3-display-container">
                <a href=""><img style="filter: brightness(70%);" src="images/category_page_women_images/shoes.png" alt=""/></a>
                <div class="w3-display-middle w3-large"><p style="">SHOES</p></div>
            </div>
        </body>
    </html>