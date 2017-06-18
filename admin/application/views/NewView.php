<?php

$wareTypes = DatabaseHandler::getAllWareTypes();

//echo $data;
?>

<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.4/angular.min.js"></script>
<script src="http://localhost/Footballcity_Project/js/newItemAngularController.js"></script>
<script src="http://localhost/Footballcity_Project/js/addNewItem.js"></script>

<div id="newItemDiv" ng-app="newItemAngularApp" ng-controller="newItemAngularController">

    <h4>Ware type</h4>

    <div id="wareTypeSelector" class="btn-group">
        <button type="button" class="btn btn-default dropdown-toggle brand" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            {{wareTypeName}}
            <span class="caret">
            </span>
        </button>
        <ul class="dropdown-menu">
            <?php foreach ($wareTypes as $wareType) {?>
                <li class="wareTypeNames">
                    <a href="">
                        <?php echo $wareType->getName(); ?>
                    </a>
                </li>
            <?php } ?>
        </ul>
    </div>

    <hr>

    <form>
        <div class="form-group" ng-repeat="property in properties">
            <label for="exampleInputEmail1">{{property.property_name}}</label>
            <input class="form-control" id="exampleInputEmail1" ng-model="property.property_value" placeholder="Enter {{property.property_name.toLowerCase()}}">
        </div>

        <button id="addNewItemSubmitButton" type="submit" class="btn btn-primary">Submit</button>
    </form>

    <form action="upload.php" method="post" enctype="multipart/form-data">
        Select image to upload:
        <input type="file" name="fileToUpload" id="fileToUpload">
        <input type="submit" value="Upload Image" name="submit">
    </form>

</div>