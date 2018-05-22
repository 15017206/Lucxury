<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
session_start();
if (isset($_SESSION['username'])) {
    header('Location: home_page.php');
    die();
}
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
            // This is called with the results from from FB.getLoginStatus().
            function statusChangeCallback(response) {
                console.log('statusChangeCallback');
                // The response object is returned with a status field that lets the
                // app know the current login status of the person.
                // Full docs on the response object can be found in the documentation
                // for FB.getLoginStatus().
                if (response.status === 'connected') {
                    // Logged into your app and Facebook.
                    console.log(response);
                    FB.api(
                            '/me',
                            'GET',
                            {"fields": "id,name,about,address,age_range,birthday,email"},
                            function (response3) {
                                // Insert your code here
                                var x = response3.name + "";
                                addToDatabaseFromFBLogin(response3.id, response3.email, response3.name);

                            }
                    );
                } else {
                    // The person is not logged into your app or we are unable to tell.
                    console.log("Please login");
                }
            }

            function addToDatabaseFromFBLogin(userID, userEmail, userName) {
                alert(userID + userEmail + userName);
                $.ajax({
                    type: "POST",
                    url: "Webservices/addIDEmailNameToDB.php",
                    data: {user_fb_id: userID, user_email: userEmail, username: userName},
                    cache: false,
                    dataType: "JSON",
                    success: function (response) {
                        alert(response.result);

                        $.ajax({
                            type: "GET",
                            url: "fbDoAddSession.php",
                            data: {username: userName},
                            cache: false,
//                                    dataType: "JSON",
                            success: function (response2) {
                                alert(response2);
                                location.reload();

                            },
                            error: function (obj, textStatus, errorThrown) {
                                console.log("Error " + textStatus + ": " + errorThrown);
                            }
                        });
                    },
                    error: function (obj, textStatus, errorThrown) {
                        console.log("Error " + textStatus + ":: " + errorThrown);
                    }
                });
            }

            // This function is called when someone finishes with the Login
            // Button.  See the onlogin handler attached to it in the sample
            // code below.
            function checkLoginState() {
                FB.getLoginStatus(function (response) {
                    statusChangeCallback(response);
                });
            }

            window.fbAsyncInit = function () {
                FB.init({
                    appId: '1447427822029147',
                    cookie: true,
                    xfbml: true,
                    version: 'v3.0'
                });

                // Now that we've initialized the JavaScript SDK, we call 
                // FB.getLoginStatus().  This function gets the state of the
                // person visiting this page and can return one of three states to
                // the callback you provide.  They can be:
                //
                // 1. Logged into your app ('connected')
                // 2. Logged into Facebook, but not your app ('not_authorized')
                // 3. Not logged into Facebook and can't tell if they are logged into
                //    your app or not.
                //
                // These three cases are handled in the callback function.

                FB.getLoginStatus(function (response) {
                    statusChangeCallback(response);
                });
            };

            // Load the SDK asynchronously
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
        </script>

        <style>
            img#banner1{
                max-width: 100%;
                width: 100vw;
            }
        </style>
    </head>
    <body>
        <img id="banner1" src="images/login_page_images/loginbanner.jpg" alt="" style=""/>
        <div class="w3-container w3-center ">
            <br/>
            <form method="post" action="do_customer_profile_login.php">
                <input required name="username" class="w3-input w3-text-black w3-small w3-center" type="text" placeholder="USERNAME" style="background: white">
                <br/>
                <input required name="password" class="w3-input w3-text-black w3-small w3-center" type="text" placeholder="PASSWORD" style="background: white">
                <!--<a onclick="document.getElementById('id01').style.display = 'block'" style="font-size: 80%; text-decoration:none">FORGOT PASSWORD?</a>-->

                <br/>
                <br/>
                <br/>
                <div class="w3-row">
                    <div class="w3-row">
                        <button type="submit" class="w3-bar w3-center w3-btn w3-blue w3-small" style="opacity: 0.8; width:60%">LOGIN</button>
                    </div>

                    <br/>
                    <div class="w3-row">
                        <a role="button" href="customer_profile_signup.php" class="w3-bar w3-center w3-btn w3-blue w3-small" style="opacity: 0.8; width:60%">SIGN UP</a>
                    </div>
                    </br>
                    <div class="w3-row">
                        <!--<a role="button" href="" class="w3-bar w3-center w3-btn w3-blue w3-small" style="opacity: 0.8; width:60%">LOGIN WITH FACEBOOK</a>-->
                        <!--<div class="fb-login-button" data-max-rows="1" data-size="medium" data-button-type="login_with" data-show-faces="false" data-auto-logout-link="true" data-use-continue-as="false"></div>-->

                        <fb:login-button scope="public_profile,email" onlogin="checkLoginState();">
                        </fb:login-button>

                    </div>
                    </br>
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
