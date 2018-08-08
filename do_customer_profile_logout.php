<?php
//echo $_SESSION['username'];
session_start();
session_destroy();
echo $_SESSION['user_id'];
header("Location: home_page.php");
?>