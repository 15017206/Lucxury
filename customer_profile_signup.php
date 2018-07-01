<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->

<html>
    <head>
        <meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1">
        <title></title>
        <?php include 'scripts/bootstrap_scripts/bootstrap_scripts.php'; ?>
        <script>


            $(document).ready(function () {
                postalCode_blur();
                checkExistingUsername();
                populateCountries();
            });
            function postalCode_blur() {
                var address1 = "";
                $("#postal_code").blur(function () {
                    if ($("#postal_code").val() != "") {
                        address1 = $("#postal_code").val();
                        getAddressAndCountry(address1)
                    } else {
                        $("#country").val("");
                        $("#home_address").val("");
                    }
                });
            }

            function checkExistingUsername() {
                $("#username").blur(function () {

                    if ($("#username").val() != "") {
                        var username = $("#username").val();
                        $.ajax({
                            type: "GET",
                            url: "Webservices/checkExistingUsername.php",
                            data: {username: username},
                            cache: false,
//                        dataType: "JSON",
                            success: function (response) {
                                if (response == "no username found") {
                                    $('#username').attr('class', 'form-control is-valid');
                                    $('#username_output').attr('class', 'valid-feedback');
                                    $('#username_output').text(username + " is available.");
                                    $(':input[type="submit"]').prop('disabled', false);
                                } else {
                                    $('#username').attr('class', 'form-control is-invalid');
                                    $('#username_output').attr('class', 'invalid-feedback');
                                    $('#username_output').text(username + " has been taken. Please choose another.");
                                    $(':input[type="submit"]').prop('disabled', true);
                                }

                            },
                            error: function (obj, textStatus, errorThrown) {
                                console.log("Error " + textStatus + ": " + errorThrown);
                            }
                        });
                    }


                });


            }

            function getAddressAndCountry(postalCode) {
                $.ajax({
                    url: 'https://developers.onemap.sg/commonapi/search?searchVal=' + postalCode + '&returnGeom=Y&getAddrDetails=Y',
                    success: function (result) {
                        //Set result to a variable for writing
//                        var TrueResult = JSON.stringify(result);

                        try {
                            var address2 = result['results'][0]['ADDRESS'];
                            $("#home_address").val(address2);
//                            document.write(TrueResult);
                            $("#country").val("Singapore");
                        } catch (e) {
                            $("#country").val("");
                            $("#home_address").val("");
                        }


                    },
                    error: function (obj, textStatus, errorThrown) {
                        console.log("Error " + textStatus + ": " + errorThrown);

                    }
                });
            }

            function populateCountries() {
                $('#country_container').empty();
                $.ajax({
                    type: "GET",
                    url: "Webservices/getAllCountries.php",
                    cache: false,
                    dataType: "JSON",
                    success: function (response) {
                        console.log(response.length);
                        for (var i = 0; i < response.length; i++) {
                            $('#country_container').append('<option value="' + response[i]['country'] + '">' + response[i]['country'] + '</option>');
                        }
                    },
                    error: function (obj, textStatus, errorThrown) {
                        console.log("Error " + textStatus + ": " + errorThrown);
                    }
                });
            }
        </script>
    </head>
    <body>
        <div class="container">
            <form method="post" action="do_customer_profile_signup.php">

                <!--email-->
                <div class="form-group">
                    <label for="email">EMAIL ADDRESS</label>
                    <input type="email" class="form-control" name="email" id="email" aria-describedby="emailHelp" placeholder="" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$">
                    <small id="emailHelp" class="form-text text-muted">Please use a real email address</small>
                </div>

                <!--username-->
                <div class="form-group">
                    <label for="username">USERNAME</label>
                    <input type="text" class="form-control" name="username" id="username" aria-describedby="usernameHelp" required placeholder="">
                    <small id="usernameHelp" class="form-text text-muted">Choose your username carefully. It cannot be changed once created.</small>
                    <small id="username_output" class=""></small>
                </div>

                <!--password-->
                <div class="form-group">
                    <label for="password">PASSWORD</label>
                    <input type="password" class="form-control" name="password" id="password" required placeholder="">
                </div>


                <!--first name-->
                <div class="form-group">
                    <label for="first_name">FIRST NAME</label>
                    <input type="text" class="form-control" name="first_name" id="first_name" required aria-describedby="first_nameHelp" placeholder="">
                    <small id="first_nameHelp" class="form-text text-muted">e.g. Tan</small>
                </div>

                <!--last name-->
                <div class="form-group">
                    <label for="last_name">LAST NAME</label>
                    <input type="text" class="form-control" name="last_name" id="last_name" required aria-describedby="last_nameHelp" placeholder="">
                    <small id="last_nameHelp" class="form-text text-muted">e.g. Yong Sheng</small>
                </div>

                <!--nric-->
                <!--                <div class="form-group">
                                    <label for="nric">NRIC</label>
                                    <input type="text" class="form-control" name="nric" id="nric" required aria-describedby="nricHelp" placeholder="">
                                    <small id="nricHelp" class="form-text text-muted">e.g. T6349559I</small>
                                </div>-->

                <!--dob-->
                <!--                <div class="form-group">
                                    <label for="dob">DATE OF BIRTH</label>
                                    <input type="date" class="form-control" name="dob" id="dob" required aria-describedby="dobHelp" placeholder="">
                                    <small id="dobHelp" class="form-text text-muted"></small>
                                </div>-->

                <!--gender-->
                <div class="form-group">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="gender" required id="exampleRadios1" value="male">
                        <label class="form-check-label" for="exampleRadios1">
                            I AM A MALE
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="gender" id="exampleRadios2" value="female">
                        <label class="form-check-label" for="exampleRadios2">
                            I AM A FEMALE
                        </label>
                    </div>
                </div>

                <!--postal code-->
                <!--                <div class="form-group">
                                    <label for="postal_code">POSTAL CODE</label>
                                    <input type="number" class="form-control" name="postal_code" required id="postal_code" aria-describedby="postal_codeHelp" placeholder="">
                                    <small id="postal_codeHelp" class="form-text text-muted">Your Postal Code will be kept confidential</small>
                                </div>-->

                <!--home address-->
                <!--                <div class="form-group">
                                    <label for="home_address">HOME ADDRESS</label>
                                    <input type="text" class="form-control" name="home_address" required id="home_address" aria-describedby="home_addressHelp" placeholder="">
                                    <small id="home_addressHelp" class="form-text text-muted">Your Home Address will be kept confidential</small>
                                </div>-->

                <!--country-->
                <div class="form-group">
                    <label for="country">COUNTRY</label>
                    <!--<input type="text" class="form-control" name="country" required id="country" aria-describedby="countryHelp" placeholder="">-->
                    <select id="country_container" name="country" class="form-control">
                    </select>
                    <small id="countryHelp" class="form-text text-muted">e.g. SG for Singapore</small>
                </div>

                <button type="submit" class="btn btn-primary" style="width:20%">SIGN UP</button>

                <!--<button type="submit" class="btn btn-primary" style="width:20%">SAVE</button>-->
                <br/>
            </form>
        </div>
    </body>
</html>
