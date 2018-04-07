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
        </script>

        <style>
            body{
                width: 100%;
                background-image: url("images/login_page_images/Untitled.png");
                background-attachment: fixed;
                background-repeat: no-repeat;
                background-size: cover;
            }

            #logininfo {
                position: absolute;
                top: 50%;
                left: 50%;
                transform: translate(-50%, -50%);
                color: white;
            }

/*            ::placeholder {  Chrome, Firefox, Opera, Safari 10.1+ 
                color: white;
                opacity: 1;  Firefox 
            }

            :-ms-input-placeholder {  Internet Explorer 10-11 
                color: white;
            }*/
        </style>
    </head>
    <body>
        <div id="logininfo">
            <h1 style="word-wrap: normal; font-size: 6vw;">WELCOME TO</h1>
            <!--<h1 style="font-size: 8vw;">L U C ⚔ U R Y</h1>-->
            <img src="images/login_page_images/Lucxury Website (Logo) 1.png" alt="" style="max-width: 110%;"/>
            <br/>
            <br/>
            <br/>
            <form>
                <input class="w3-input w3-text-white w3-large" type="text" placeholder="USERNAME" style="background: transparent">
                <br/>
                <input class="w3-input w3-text-white w3-large" type="text" placeholder="PASSWORD" style="background: transparent">
                <a href="" style="font-size: 80%; text-decoration:none">FORGOT PASSWORD?</a>
                <br/>
                <br/>
                <br/>
                <div class="w3-row">
                    <div class="w3-half w3-container">
                        <a role="button" href="home_page.php" class="w3-block w3-btn w3-white" style="opacity: 0.8;">LOGIN</a>
                    </div>
                    <div class="w3-half w3-container">
                        <button class="w3-block w3-btn w3-white" style="opacity: 0.8;">SIGN UP</button>
                    </div>
                </div>

                <div class="w3-row">
                    <br/>
                    <div class="w3-half w3-container ">
                        <button class="w3-block w3-btn w3-blue" style="opacity: 0.8;">LOGIN WITH FACEBOOK</button>
                    </div>
                    <div class="w3-half w3-container ">

                        <a id="subscribe1" href="login_page_subscribe.php" onclick="showMailing()"  class="w3-block w3-btn w3-blue" style="opacity: 0.8;">SUBSCRIBE NOW!</a>
                    </div>
                </div>

        </div>
    </form>
</div>
</body>
</html>
