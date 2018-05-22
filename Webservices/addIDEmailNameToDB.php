<?php

include 'dbconn.php';

if (isset($_POST)) { 
    $user_fb_id = $_POST['user_fb_id'];
    $email = $_POST['user_email'];
    $username = $_POST['username'];
    
    $query = "INSERT INTO `user` (`user_fb_id`, `username`, `email`) VALUES ('$user_fb_id', '$username', '$email ')";
    
    $result = mysqli_query($link, $query);
    
    if($result){
        $response['result'] = "Inserted successfully";
    } else {
        $response['result'] = "Fail to insert new data";
    }
     
    

    mysqli_close($link);

    echo json_encode($response);
 

}

?>