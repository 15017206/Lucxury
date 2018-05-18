<!DOCTYPE html>
<?php
session_start();
session_unset();
session_destroy();
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <script>
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

//                FB.getLoginStatus(function (response) {
//                    statusChangeCallback(response);
//                });

                FB.logout(function (response) {
                    // user is now logged out
                    alert(response);
                });

            };


        </script>
    </head>
    <body>
        <?php
//        header("location: home_page.php");
        ?>
    </body>
</html>
