<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title></title>

        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

        <!--CSS -->
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

        <script type="text/javascript" src="//downloads.mailchimp.com/js/signup-forms/popup/embed.js" data-dojo-config="usePlainJson: true, isDebug: false"></script>

        <script>
            function showMailing() {

                require(["mojo/signup-forms/Loader"], function (L) {
                    L.start({"baseUrl": "mc.us12.list-manage.com", "uuid": "5e744d54c978e566fa533d954", "lid": "ceb70c82f3"})

                })
                document.cookie = "MCEvilPopupClosed=; expires=Thu, 01 Jan 1970 00:00:00 UTC";
            }

//            $(document).ready(function(){
//               $("#subscribe1").onclick(function(){
//                  alert("456");
//                                  require(["mojo/signup-forms/Loader"], function (L) {
//                    L.start({"baseUrl": "mc.us12.list-manage.com", "uuid": "5e744d54c978e566fa533d954", "lid": "ceb70c82f3"})
//
//                })
//                document.cookie = "MCEvilPopupClosed=; expires=Thu, 01 Jan 1970 00:00:00 UTC";
//                  alert("123");
//               });


//            });

            //Do not touch
            window.fbAsyncInit = function () {
                FB.init({
                    appId: '{your-app-id}',
                    cookie: true,
                    xfbml: true,
                    version: '{latest-api-version}'
                });

                FB.AppEvents.logPageView();

            };
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


            FB.getLoginStatus(function (response) {
                statusChangeCallback(response);
            });

            {
                status: 'connected',
                        authResponse: {
                            accessToken: '...',
                            expiresIn: '...',
                            signedRequest: '...',
                            userID: '...'
                        }
            }
            // end of do not touch
        </script>

        <style>
            img#banner1{
                max-width: 100%;
                width: 100vw;
            }
        </style>
    </head>
    <body>
        <!--Do not touch 2-->
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
        <!--End of do not touch 2-->

        <img id="banner1" src="images/login_page_images/loginbanner.jpg" alt="" style=""/>
        <div class="w3-container w3-center ">
            <br/>
            <form method="post" action="do_customer_profile_login.php">
                <input required name="username" class="w3-input w3-text-black w3-small w3-center" type="text" placeholder="USERNAME" style="background: white">
                <br/>
                <input required name="password" class="w3-input w3-text-black w3-small w3-center" type="text" placeholder="PASSWORD" style="background: white">
                <a onclick="document.getElementById('id01').style.display = 'block'" style="font-size: 80%; text-decoration:none">FORGOT PASSWORD?</a>
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
                        <div class="fb-login-button" data-max-rows="1" data-size="medium" data-button-type="login_with" data-show-faces="false" data-auto-logout-link="true" data-use-continue-as="false"></div>
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
