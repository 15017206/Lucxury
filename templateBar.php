<!DOCTYPE html>
<?php
session_start();
$ipaddress = '';

// Function to get the client ip address
function get_client_ip_env() {

    if (getenv('HTTP_CLIENT_IP'))
        $ipaddress = getenv('HTTP_CLIENT_IP');
    else if (getenv('HTTP_X_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
    else if (getenv('HTTP_X_FORWARDED'))
        $ipaddress = getenv('HTTP_X_FORWARDED');
    else if (getenv('HTTP_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_FORWARDED_FOR');
    else if (getenv('HTTP_FORWARDED'))
        $ipaddress = getenv('HTTP_FORWARDED');
    else if (getenv('REMOTE_ADDR'))
        $ipaddress = getenv('REMOTE_ADDR');
    else
        $ipaddress = 'UNKNOWN';

    return $ipaddress;
}

if (!isset($_SESSION['username'])) {
    header("Location: login_page.php");
    die();
}
?>
<html lang="en">
    <!--head-->
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css">

        <!--jQuery library--> 
        <script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>

        <!--Popper JS--> 
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.6/umd/popper.min.js"></script>



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

            $(document).ready(function () {
                var ip_address = '<?php echo get_client_ip_env(); ?>';
                var user_id = '<?php echo $_SESSION["user_id"]; ?>';
                var username = '<?php echo $_SESSION["username"]; ?>';
                var user_type = '<?php echo $_SESSION["user_type"]; ?>';
                console.log("ip address: " + ip_address);
                console.log("user id: " + user_id);
                console.log("username: " + username);
                console.log("user type: " + user_type);
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

        <script>
            window.fbAsyncInit = function () {
                FB.init({
                    appId: '1447427822029147',
                    cookie: true,
                    xfbml: true,
                    version: 'v3.0'
                });

                FB.AppEvents.logPageView();
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

            function logout() {
                FB.getLoginStatus(function (response) {
                    console.log(response)
                    if (response.status === 'connected') {
                        window.location.href = "login_page.php";
                        $.ajax({
                            type: "GET",
                            url: "./do_customer_profile_logout.php",
                            cache: false,
//                                      dataType: "JSON",
                            success: function (response) {
//                                console.log(response);
//                                location.reload();
                            },
                            error: function (obj, textStatus, errorThrown) {
                                console.log("Error " + textStatus + ": " + errorThrown);
                            }
                        });
                    } else if (response.status === 'unknown') {
                        window.location.href = "login_page.php";
                    }

                });

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
            #customer_logined_button {
                font-weight: bold;
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
            <?php
            if (!isset($_SESSION['user_id'])) {
                echo "<div id='customer_logined_button' class='w3-bar-item w3-button w3-small w3-border-bottom w3-hover-black'>Hello, " . $_SESSION['username'] . "</div>";
            } else {
                if (isset($_SESSION["username"])) {
                    echo "<div id='customer_logined_button' class='w3-bar-item w3-button w3-small w3-border-bottom w3-hover-black'>Hello, " . $_SESSION['username'] . "</div>";
                }
            }
            ?>
            <a href="home_page.php" class="w3-bar-item w3-button w3-small w3-border-bottom w3-hover-black">HOME</a>
            <!--<a href="profile.php" class="w3-bar-item w3-button w3-small w3-border-bottom w3-hover-black">PROFILE</a>-->
            <!--<a href="#" class="w3-bar-item w3-button w3-small w3-border-bottom w3-hover-black">PROMOTION</a>-->
            <a href="https://lucxury.com/wp/" class="w3-bar-item w3-button w3-small w3-border-bottom w3-hover-black">NEWS/MEDIA</a>
            <a href="#" class="w3-bar-item w3-button w3-small w3-border-bottom w3-hover-black">PROMOTION</a>
            <a href="#" class="w3-bar-item w3-button w3-small w3-border-bottom w3-hover-black">HOW TO USE</a>
            <a href="#" class="w3-bar-item w3-button w3-small w3-border-bottom w3-hover-black">FAQ</a>
            <?php
            if ($_SESSION["user_type"] == "merchant") {
                echo '<a href="#" class="w3-bar-item w3-button w3-small w3-border-bottom w3-hover-black">MERCHANT DASHBOARD</a>';
            }
            ?>

            <br/>
            <?php
            if ($_SESSION["user_type"] == "admin") {
                echo "<a href='admin_dashboard.php' id='logout' class='w3-bar-item w3-button w3-small w3-border-bottom w3-hover-black'>ADMIN DASHBOARD</a>";
            } else if ($_SESSION["user_type"] == "merchant") {
                echo "<a href='lucxury_webstore_main.php' id='logout' class='w3-bar-item w3-button w3-small w3-border-bottom w3-hover-black'>UPLOAD PRODUCTS</a>";
            }

            if (strcmp($_SESSION['user_type'], "Facebook user") == 0) {
                echo "<br/>";
//                echo '<div class="fb-login-button" data-max-rows="1" data-size="medium" data-button-type="login_with" data-show-faces="false" data-auto-logout-link="true" data-use-continue-as="false"></div>';
                echo "<a onclick='logout()' href='do_customer_profile_logout.php' id='logout' class='w3-bar-item w3-button w3-small w3-border-bottom w3-hover-black'>Logout</a>";
            } else {
                if (isset($_SESSION["username"])) {
                    echo "<br/>";
                    echo "<a href='customer_profile_update.php' id='customer_update_button' class='w3-bar-item w3-button w3-small w3-border-bottom w3-hover-black'>CUSTOMER EDIT PROFILE</a>";
                    echo "<a href='do_customer_profile_logout.php' id='logout' class='w3-bar-item w3-button w3-small w3-border-bottom w3-hover-black'>LOGOUT</a>";
                } else {
                    echo "<a href='login_page.php' id='customer_login_button' class='w3-bar-item w3-button w3-small w3-border-bottom w3-hover-black'>Customer login page</a>";
                }
            }
            ?>
        </div>
    </body>
</html>
