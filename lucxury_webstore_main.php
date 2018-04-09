<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title></title>
        <?php include 'scripts/bootstrap_scripts/bootstrap_scripts.php'; ?>
        <script>
            function modifyItem() {
                $("#exampleModalLongTitle").text("Modify Item");
                $("#submit1").text("Modify Item");
            }
            function addItem() {
                $("#exampleModalLongTitle").text("Add Item");
                $("#submit1").text("Add Item");
            }
            function removeItem() {
                var r = confirm("Are you sure?");
                if (r) {
                    alert("Ok, deleted");
                }
            }
        </script>
        <style>
            img.in_modal {
                max-height: 100px;
                max-width: 100px;
            }

            img.thumbnails_in_item {
                max-height: 100px;
                max-width: 100px;
            }
        </style>
    </head>
    <style>
    </style>
    <body>
        <br/>
        <div class="container">
            <div class="alert alert-secondary" role="alert">
                <p>Welcome, merchant</p>
                <div>You have 0 items on display</div>
            </div>
            <div class="form-group">
                <div class="container">
                    <button type="button" onclick="addItem()" data-toggle="modal" data-target="#add_modify_new_item" class="btn btn-block btn-success">Add new item</button>
                </div>
            </div>
            <div class="alert alert-success" role="alert">
                <div>List of items</div>
                <br/>
                <ul class='list-group' id='list_of_companies_with_vacancies_big_placeholder'>
                    <li class='list-group-item flex-column align-items-start'>
                        <div class='d-flex w-100 justify-content-between'>
                            <h5 class='mb-1'>Item Name: </h5>
                            <small>SGD 1200</small>
                        </div>
                        <small>Brand:</small><br/>
                        <small>Color:</small><br/>
                        <small>Condition:</small><br/>
                        <small>Category:</small><br/>
                        <a href='' data-toggle="modal" data-target="#add_modify_new_item" onclick="modifyItem()"><span class='badge badge-warning'>Modify Item</span></a>
                        <a href='' onclick="removeItem()"><span class='badge badge-danger'>Remove Item</span></a>
                        <br/><br/>
                        <h6>Image Links:</h6>
                        <img class="thumbnails_in_item" src="https://demo.cloudimg.io/crop/200x200/s/sample.li/boat.jpg">
                        <img class="thumbnails_in_item" src="https://demo.cloudimg.io/crop/200x200/s/sample.li/boat.jpg">
                        <img class="thumbnails_in_item" src="https://demo.cloudimg.io/crop/200x200/s/sample.li/boat.jpg">
                        <img class="thumbnails_in_item" src="https://demo.cloudimg.io/crop/200x200/s/sample.li/boat.jpg">
                    </li>
                </ul>
            </div>
        </div>

        <!--Modal to add/modify item-->
        <div class="modal fade" id="add_modify_new_item" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <form method="post" action="">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">xxx</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="form-group">
                            <div class="modal-body">

                                <!--Item Name-->
                                <label for="text1">Item Name:</label>
                                <input type="text" class="form-control" id="text1" aria-describedby="textHelp" placeholder="">
                                <small id="textHelp" class="form-text text-muted"></small>

                                <!--Currency-->
                                <label for="currency2">Currency & Price:</label>
                                <div class='form-group'> 
                                    <div class='input-group'> 
                                        <div class='input-group-prepend'> 
                                            <span class='input-group-text' id=''>Curr.& Price:</span> 
                                        </div> 
                                        <input type='text' id='currency2' name="currency" class='form-control' placeholder='eg. SGD/MYR'> 
                                        <input type='number' id='amount2' name="price" class='form-control' placeholder='eg. 45, 1200'> 
                                    </div> 
                                </div>

                                <!--Brand-->
                                <label for="brand">Brand:</label>
                                <input type="text" class="form-control" id="brand" aria-describedby="textHelp" placeholder="">
                                <small id="textHelp" class="form-text text-muted"></small>

                                <!--Color-->
                                <label for="color">Color:</label>
                                <input type="text" class="form-control" id="color" aria-describedby="textHelp" placeholder="">
                                <small id="textHelp" class="form-text text-muted"></small>

                                <!--Condition-->
                                <label for="condition">Condition:</label>
                                <input type="text" class="form-control" id="condition" aria-describedby="textHelp" placeholder="">
                                <small id="textHelp" class="form-text text-muted"></small>

                                <!--Category-->
                                <label for="category">Category:</label>

                                <input type="text" class="form-control" id="category" aria-describedby="textHelp" placeholder="">
                                <small id="textHelp" class="form-text text-muted"></small>

                                <!--Image URL-->
                                <label for="inputGroupFile02">Item Name:</label>
                                <br/>
                                <a href=""><small>remove image</small></a>
                                <br/>
                                <img class="thumbnails_in_item in_modal" src="https://demo.cloudimg.io/crop/200x200/s/sample.li/boat.jpg">
                                <input type="file" id="inputGroupFile02" name="pic" accept="image/*">
                                <hr/>
                                <a href=""><small>remove image</small></a>
                                <br/>
                                <img class="thumbnails_in_item in_modal" src="https://demo.cloudimg.io/crop/200x200/s/sample.li/boat.jpg">
                                <input type="file" id="inputGroupFile02" name="pic" accept="image/*">
                                <hr/>
                                <a href=""><small>remove image</small></a>
                                <br/>
                                <img class="thumbnails_in_item in_modal" src="https://demo.cloudimg.io/crop/200x200/s/sample.li/boat.jpg">
                                <input type="file" id="inputGroupFile02" name="pic" accept="image/*">
                                <hr/>
                                <a href=""><small>remove image</small></a>
                                <br/>
                                <img class="thumbnails_in_item in_modal" src="https://demo.cloudimg.io/crop/200x200/s/sample.li/boat.jpg">
                                <input type="file" id="inputGroupFile02" name="pic" accept="image/*">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" id="submit1" class="btn btn-primary">xxx</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </body>
</html>
