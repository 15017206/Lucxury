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

            document.addEventListener('DOMContentLoaded', function () {
                if (!Notification) {
                    alert('Desktop notifications not available in your browser. Try Chromium.');
                    return;
                }

                if (Notification.permission !== "granted")
                    Notification.requestPermission();
            });

            function notifyMe() {
                if (Notification.permission !== "granted")
                    Notification.requestPermission();
                else {
                    var notification = new Notification('Notification title', {
                        icon: 'http://cdn.sstatic.net/stackexchange/img/logos/so/so-icon.png',
                        body: "Hey there! You've been notified!",
                    });

                    notification.onclick = function () {
                        window.open("http://localhost/Lucxury_000webhost/notification_page.php");
                    };

                }

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
            
            #hidepls {
                visibility: hidden;
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
                    <li id="notifications2"><a href="home_page.php"><img id="topbarlogo" src="images/lucxurylogo.PNG" alt="" style="max-width:100%; max-height: 50px;"/></a></li>

                </ul>
                <ul id="hidepls" class="nav navbar-nav">
                    <li id="notifications3"><a href="notification_page.php" onclick="notifyMe()"><i class="material-icons">notifications</i></a><span class="badge badge-light">1</span></li>
                </ul>
            </div>
        </nav>

        <!-- Sidebar -->
        <div class="w3-sidebar w3-bar-block w3-border-right w3-animate-left"style="display:none" id="mySidebar">
            <button onclick="w3_close()" class="w3-bar-item w3-large"></button>

            <a href="home_page.php" class="w3-bar-item w3-button w3-small w3-border-bottom w3-hover-black">HOME</a>
            <!--<a href="profile.php" class="w3-bar-item w3-button w3-small w3-border-bottom w3-hover-black">PROFILE</a>-->
            <!--<a href="#" class="w3-bar-item w3-button w3-small w3-border-bottom w3-hover-black">PROMOTION</a>-->
            <a href="news.php" class="w3-bar-item w3-button w3-small w3-border-bottom w3-hover-black">NEWS</a>
            <a href="#" class="w3-bar-item w3-button w3-small w3-border-bottom w3-hover-black">HOW TO USE</a>
            <!--<a href="#" class="w3-bar-item w3-button w3-small w3-border-bottom w3-hover-black">SETTINGS</a>-->
            <a href="#" class="w3-bar-item w3-button w3-small w3-border-bottom w3-hover-black">FAQ</a>
            <!--<a href="index.php" class="w3-bar-item w3-button w3-small w3-border-bottom w3-hover-black">LOGOUT</a>-->
            <a href="lucxury_webstore_login.php" class="w3-bar-item w3-button w3-small w3-border-bottom w3-hover-black">MERCHANT LOGIN PORTAL</a>
            
            <a href="login_page.php" class="w3-bar-item w3-button w3-small w3-border-bottom w3-hover-black">Customer login page</a>
            <!--<a href="lucxury_webstore_login.php" class="w3-bar-item w3-button w3-small w3-border-bottom w3-hover-black">MERCHANT LOGIN PORTAL</a>-->
        </div>

    </body>
</html>
