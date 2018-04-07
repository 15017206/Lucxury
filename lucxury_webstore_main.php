<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <?php include 'scripts/bootstrap_scripts/bootstrap_scripts.php'; ?>
    </head>
    <style>
    </style>
    <body>
        <br/>
        <div class="container">
            <div class="alert alert-secondary" role="alert">
                <p>Welcome, merchant</p>
                <div>You have 0 products on display</div>

            </div>

            <div class="alert alert-success" role="alert">
                <div>List of products</div>
                <br/>
                <ul class="list-group">
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <div>Item 1</div>
                        <span class="badge badge-primary badge-pill" data-toggle="tooltip" data-html="true" title="<img src='images/lucxurylogo.PNG'  class='img-fluid img-thumbnail' alt=''/>">14</span>

                        <button type="button" class="btn btn-secondary" data-toggle="tooltip" data-html="true" data-placement="left" title="<img src='images/lucxurylogo.PNG' class='img-fluid img-thumbnail' alt=''/>">
                            Tooltip on left
                        </button>
                    </li>
                </ul>

            </div>
        </div>
    </body>
</html>
