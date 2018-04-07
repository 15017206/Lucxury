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

</br>
    </head>
    <body>
        <div class="container">
            <form>

                <!--email-->
                <div class="form-group">
                    <label for="exampleInputEmail1">EMAIL ADDRESS</label>
                    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="">
                    <small id="emailHelp" class="form-text text-muted">Please use a real email address</small>
                </div>

                <!--username-->
                <div class="form-group">
                    <label for="exampleInputEmail1">USERNAME</label>
                    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="">
                    <small id="emailHelp" class="form-text text-muted">Your username will be kept confidential</small>
                </div>

                <!--password-->
                <div class="form-group">
                    <label for="exampleInputPassword1">PASSWORD</label>
                    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                </div>


                <!--first name-->
                <div class="form-group">
                    <label for="exampleInputEmail1">FIRST NAME</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="">
                    <small id="emailHelp" class="form-text text-muted">e.g. Tan</small>
                </div>

                <!--last name-->
                <div class="form-group">
                    <label for="exampleInputEmail1">LAST NAME</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="">
                    <small id="emailHelp" class="form-text text-muted">e.g. Yong Sheng</small>
                </div>

                <!--nric-->
                <div class="form-group">
                    <label for="exampleInputEmail1">NRIC</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="">
                    <small id="emailHelp" class="form-text text-muted">e.g. T6349559I</small>
                </div>

                <!--country-->
                <div class="form-group">
                    <label for="exampleInputEmail1">COUNTRY</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="">
                    <small id="emailHelp" class="form-text text-muted">e.g. Singapore</small>
                </div>

                <!--town-->
                <div class="form-group">
                    <label for="exampleInputEmail1">TOWN</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="">
                    <small id="emailHelp" class="form-text text-muted">e.g. Ang Mo Kio</small>
                </div>

                <!--dob-->
                <div class="form-group">
                    <label for="exampleInputEmail1">DATE OF BIRTH</label>
                    <input type="date" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="">
                    <small id="emailHelp" class="form-text text-muted"></small>
                </div>

                <!--gender-->
                <div class="form-group">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1" checked>
                        <label class="form-check-label" for="exampleRadios1">
                            I AM A MALE
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2" value="option2">
                        <label class="form-check-label" for="exampleRadios2">
                            I AM A FEMALE
                        </label>
                    </div>
                </div>
                <!--home address-->
                <div class="form-group">
                    <label for="exampleInputEmail1">HOME ADDRESS</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="">
                    <small id="emailHelp" class="form-text text-muted">Your Home Address will be kept confidential</small>
                </div>

                <!--postal code-->
                <div class="form-group">
                    <label for="exampleInputEmail1">POSTAL CODE</label>
                    <input type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="">
                    <small id="emailHelp" class="form-text text-muted">Your Postal Code will be kept confidential</small>
                </div>

                <button type="submit" class="btn btn-primary" style="width:20%">EDIT</button>
              
                <button type="submit" class="btn btn-primary" style="width:20%">SAVE</button>
                <br/>
            </form>
        </div>
    </body>
</html>
