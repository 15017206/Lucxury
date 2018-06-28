<!DOCTYPE html>
<?php
include 'scripts/bootstrap_scripts/bootstrap_scripts.php';
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <script>
            $(document).ready(function () {
                $('#logout').click(function () {
                    if (confirm("Are you sure to logout?")) {
<?php session_destroy(); ?>
                        location.reload();
                    }
                });
            });

        </script>
    </head>
    <body>
        <nav class="navbar navbar-expand-sm navbar-light bg-light">
            <a class="navbar-brand" href="#" id="">Welcome, <?php echo $_SESSION['merchant_name'] ?></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="#" id="logout">Logout</a>
                    </li>
                </ul>
            </div>
        </nav>
    </body>
</html>
