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
    </head>
    <body>
        <?php
        header("location: home_page.php");
        ?>
    </body>
</html>
