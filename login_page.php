<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
session_start();
//if (isset($_SESSION['username'])) {
//    header('Location: home_page.php');
//    die();
//}
?>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title></title>
        <script
            src="https://code.jquery.com/jquery-3.3.1.js"
            integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
        crossorigin="anonymous"></script>

        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

        <!--CSS -->
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

        <script type="text/javascript" src="//downloads.mailchimp.com/js/signup-forms/popup/embed.js" data-dojo-config="usePlainJson: true, isDebug: false"></script>
        <script>
            window.fbAsyncInit = function () {
                FB.init({
                    appId: '1447427822029147',
                    cookie: true,
                    xfbml: true,
                    version: 'v3.0'
                });

                FB.AppEvents.logPageView();

                FB.getLoginStatus(function (response) {
                    console.log(response)
                    if (response.status === 'connected') {
                        FB.api(
                                '/me',
                                'GET',
                                {"fields": "id,name, email"},
                                function (response) {
                                    // Insert your code here

                                    $.ajax({
                                        type: "POST",
                                        url: "Webservices/doLoginViaFB.php",
                                        data: {username: response.name, user_id: response.id, email: response.email},
                                        cache: false,
//                                      dataType: "JSON",
                                        success: function (response) {
                                            console.log(response);
                                            
//                                            location.reload();
                                        },
                                        error: function (obj, textStatus, errorThrown) {
                                            console.log("Error " + textStatus + ": " + errorThrown);
                                        }
                                    });
                                }
                        );
                    }
                });
            };

            function checkLoginState() {
                FB.getLoginStatus(function (response) {
                    statusChangeCallback(response);
                    console.log(response);
                });
            }

            (function (d, s, id) {
                var js, fjs = d.getElementsByTagName(s)[0];
                if (d.getElementById(id)) {
                    return;
                }
                js = d.createElement(s);
                js.id = id;
                js.src = "https://connect.facebook.net/en_US/sdk.js";
                fjs.parentNode.insertBefore(js, fjs);
            }(document, 'script', 'facebook-jssdk'));

            function logined_already() {
//                window.location.href = "home_page.php";
            }
        </script>

        <style>
            img#banner1{
                max-width: 100%;
                width: 100vw;
            }
        </style>
    </head>
    <body>

        <div id="fb-root"></div>
        <script>(function (d, s, id) {
                var js, fjs = d.getElementsByTagName(s)[0];
                if (d.getElementById(id))
                    return;
                js = d.createElement(s);
                js.id = id;
                js.src = 'https://connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v3.0&appId=1447427822029147&autoLogAppEvents=1';
                fjs.parentNode.insertBefore(js, fjs);
            }(document, 'script', 'facebook-jssdk'));</script>

        <img id="banner1" src="images/login_page_images/loginbanner.jpg" alt="" style=""/>
        <div class="w3-container w3-center ">
            <br/>
            <form method="post" action="do_customer_profile_login.php">
                <input required name="username" class="w3-input w3-text-black w3-small w3-center" type="text" placeholder="USERNAME" style="background: white">
                <br/>
                <input required name="password" class="w3-input w3-text-black w3-small w3-center" type="password" placeholder="PASSWORD" style="background: white">
                <a onclick="document.getElementById('id01').style.display = 'block'" style="font-size: 80%; text-decoration:none">FORGOT PASSWORD?</a>
                <br/>
                <small><a href="merchant_dashboard_login.php">Merchant login</a></small>
                <br/>
                <br/>
                <br/>
                <div class="w3-row">
                    <div class="w3-row">
                        <button type="submit" class="w3-bar w3-center w3-btn w3-blue w3-small" style="opacity: 0.8; width:60%">LOGIN</button>
                    </div>
                    <br/>

                    <div onlogin="logined_already()" class="fb-login-button" data-max-rows="1" data-size="medium" data-button-type="login_with" data-show-faces="false" data-auto-logout-link="true" data-use-continue-as="false"></div>

                    <br/>
                    <br/>
                    <div class="w3-row">
                        <a role="button" href="customer_profile_signup.php" class="w3-bar w3-center w3-btn w3-blue w3-small" style="opacity: 0.8; width:60%">SIGN UP</a>
                    </div>

                    <div class="w3-row">
                        <!--<a role="button" href="" class="w3-bar w3-center w3-btn w3-blue w3-small" style="opacity: 0.8; width:60%">LOGIN WITH FACEBOOK</a>-->
                        <!--<div class="fb-login-button" data-max-rows="1" data-size="medium" data-button-type="login_with" data-show-faces="false" data-auto-logout-link="true" data-use-continue-as="false"></div>-->

                    </div>
                    <br/>
                    <div class="w3-row">
                        <a id="subscribe1" href="login_page_subscribe.php" onclick="showMailing()"  class="w3-bar w3-center w3-btn w3-blue w3-small" style="opacity: 0.8; width:60%">SUBSCRIBE NOW!</a>
                    </div>
                </div>
                </br>
                </br>
                <div class="w3-display-container w3-border-top w3-border-bottom w3-border-white">

                    <a href="https://www.facebook.com/lucxuryglobal/?ref=your_pages"><img id="" style="" src="images/templatebar_bottom_images/facebook.jpg" alt=""/></a>

                    <a href="https://www.instagram.com/lucxuryglobal/"><img id="" style="" src="images/templatebar_bottom_images/instagram.jpg" alt=""/></a>

   <!--<a href="https://www.pinterest.com/lucxury/"><img id="" style="" src="images/templatebar_bottom_images/pinterest.jpg" alt=""/></a>-->

                    <a href="https://www.youtube.com/channel/UCeGiwGkYZ9p8kxj8YwN4fIw?view_as=subscriber"><img id="" style="" src="images/templatebar_bottom_images/youtube.jpg" alt=""/></a>

                    <a href="https://twitter.com/lucxuryglobal"><img id="" style="" src="images/templatebar_bottom_images/twitter.jpg" alt=""/></a>
                </div>
            </form>

            <!--Modal-->
            <div id="id01" class="w3-modal">
                <div class="w3-modal-content">
                    <div class="w3-container">
                        <span onclick="document.getElementById('id01').style.display = 'none'" class="w3-button w3-display-topright">&times;</span>
                        <p>Please enter your email and username</p>
                        <form action="do_forget_password.php" method="post">
                            <input class="w3-input" name="email" type="text" placeholder="Email:">
                            <input class="w3-input" name="username" type="text" placeholder="Username:">

                            <br/>
                            <input type="submit" class="w3-button w3-border">
                            <br/><br/>
                        </form>
                    </div>
                </div>
            </div>
            <!--Modal End-->
        </div>
    </body>
</html>
