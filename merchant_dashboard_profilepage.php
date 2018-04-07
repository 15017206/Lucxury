<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php include 'templateBar.php'; ?>
<html>
    
    <head>
        <meta charset="UTF-8">
        <title></title>
        <?php include 'scripts/bootstrap_scripts/bootstrap_scripts.php'; ?>


    </head>
    <body>
        <div class="container">
            <form>

                <!--email-->
                <div class="form-group">
                    <label for="exampleInputEmail1"><b>COMPANY EMAIL ADDRESS</b></label>
                    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="">
                    <small id="emailHelp" class="form-text text-muted"></small>
                </div>

                <!--username-->
                <div class="form-group">
                    <label for="exampleInputEmail1"><b>USERNAME</b></label>
                    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="">
                    <small id="emailHelp" class="form-text text-muted"></small>
                </div>

                <!--password-->
                <div class="form-group">
                    <label for="exampleInputPassword1"><b>PASSWORD</b></label>
                    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                </div>


                <!--first name-->
                <div class="form-group">
                    <label for="exampleInputEmail1"><b>COMPANY ADDRESS</b></label>
                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="">
                    <small id="emailHelp" class="form-text text-muted"></small>
                </div>

                <!--last name-->
                <div class="form-group">
                    <label for="exampleInputEmail1"><b>COMPANY CONTACT NUMBER</b></label>
                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="">
                    <small id="emailHelp" class="form-text text-muted"></small>
                </div>

                <button type="submit" class="btn btn-primary" style="width:20%">SAVE</button>
                <br/>
            </form>
        </div>
    </body>
</html>
