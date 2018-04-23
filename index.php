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
            img#banner1{
                max-width: 100%;
                width: 100vw;
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
    
    <img id="banner1" src="images/login_page_images/loginbanner.jpg" alt="" style=""/>
    
    <body>
        
        <div class="w3-container w3-center ">
            <br/>
            <form>
                <input class="w3-input w3-text-black w3-small w3-center" type="text" placeholder="USERNAME" style="background: white">
                <br/>
                <input class="w3-input w3-text-black w3-small w3-center" type="text" placeholder="PASSWORD" style="background: white">
                <a href="" style="font-size: 80%; text-decoration:none">FORGOT PASSWORD?</a>
                <br/>
                <br/>
                <br/>
                <div class="w3-row">
                    <div class="w3-container">
                        <a role="button" href="home_page.php" class="w3-bar w3-center w3-btn w3-blue w3-small" style="opacity: 0.8; width:60%">LOGIN</a>
                    </div>
                  </br>
                    <div class="w3-container">
                        <button class="w3-bar w3-center w3-btn w3-blue w3-small" style="opacity: 0.8; width:60%">SIGN UP</button>
                    </div>
                </div>

                <div class="w3-row">
                    <br/>
                    <div class="w3-container ">
                        <button class="w3-bar w3-center w3-btn w3-blue w3-small" style="opacity: 0.8; width:60%">LOGIN WITH FACEBOOK</button>
                    </div>
                   </br>
                    <div class="w3-container ">

                        <a id="subscribe1" href="login_page_subscribe.php" onclick="showMailing()"  class="w3-bar w3-center w3-btn w3-blue w3-small" style="opacity: 0.8; width:60%">SUBSCRIBE NOW!</a>
                    </div>
                </div>
</br>
                </br>
                    <div class="w3-display-container w3-border-top w3-border-bottom w3-border-white">
                        
                        <a href="https://www.facebook.com/lucxuryglobal/?ref=your_pages"><img id="" style="" src="images/templatebar_bottom_images/facebook.jpg" alt=""/></a>
                        
                        <a href="https://twitter.com/lucxuryglobal"><img id="" style="" src="images/templatebar_bottom_images/twitter.jpg" alt=""/></a>
                     
                        <a href="https://www.pinterest.com/lucxury/"><img id="" style="" src="images/templatebar_bottom_images/pinterest.jpg" alt=""/></a>
                     
                        <a href="https://www.youtube.com/channel/UCeGiwGkYZ9p8kxj8YwN4fIw?view_as=subscriber"><img id="" style="" src="images/templatebar_bottom_images/youtube.jpg" alt=""/></a>
                      
                        <a href="https://www.instagram.com/lucxuryglobal/"><img id="" style="" src="images/templatebar_bottom_images/instagram.jpg" alt=""/></a>

                    </div>

        </div>
    </form>
</div>
</body>
</html>
