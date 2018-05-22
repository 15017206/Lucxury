<!DOCTYPE html>
<?php
session_start();
echo $_SESSION['username'];
session_unset();
session_destroy();
echo $_SESSION['username'];
header("Location: login_page.php");
die();
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <script>
            // This is called with the results from from FB.getLoginStatus().
//            function statusChangeCallback(response) {
////                console.log('statusChangeCallback');
////                console.log(response);
//                // The response object is returned with a status field that lets the
//                // app know the current login status of the person.
//                // Full docs on the response object can be found in the documentation
//                // for FB.getLoginStatus().
//                alert(response.status);
//                if (response.status === 'connected') {
//                    // Logged into your app and Facebook.
//                    FB.logout(function (response) {
//                        // Person is now logged out
//                    });
//                }
//            }
//
//            function checkLoginState() {
//                FB.getLoginStatus(function (response) {
//                    statusChangeCallback(response);
//                });
//            }
//
//            window.fbAsyncInit = function () {
//                FB.init({
//                    appId: '1447427822029147',
//                    cookie: true,
//                    xfbml: true,
//                    version: 'v3.0'
//                });
//
//                FB.getLoginStatus(function (response) {
//                    statusChangeCallback(response);
//                });
//            };
//
//            // Load the SDK asynchronously
//            (function (d, s, id) {
//                var js, fjs = d.getElementsByTagName(s)[0];
//                if (d.getElementById(id)) {
//                    return;
//                }
//                js = d.createElement(s);
//                js.id = id;
//                js.src = "https://connect.facebook.net/en_US/sdk.js";
//                fjs.parentNode.insertBefore(js, fjs);
//            }
//            (document, 'script', 'facebook-jssdk'));

        </script>
    </head>
    <body>
        <?php
//        header("location: home_page.php");
        ?>
    </body>
</html>
