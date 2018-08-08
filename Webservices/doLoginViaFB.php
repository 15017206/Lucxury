<?php
session_start();
$username = $_POST['username'];
$fb_id = $_POST['user_id'];
$email = $_POST['email'];

$_SESSION['username'] = $username;
$_SESSION['user_id'] = $fb_id;
$_SESSION['email'] = $email;
$_SESSION['user_type'] = "Facebook user";

echo $_SESSION['user_type'];
