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
            <label for="exampleInputEmail1">{{property.propertyName}}</label>
            <input class="form-control" id="exampleInputEmail1" ng-if="property.urlPresentation != 'shoe_size'" ng-model="property.propertyValue" placeholder="Enter {{property.propertyName.toLowerCase()}}">

            <select class="form-control" ng-if="property.urlPresentation == 'shoe_size'" ng-model="property.propertyValue">
                <?php $sizes = DatabaseHandler::getShoeSizes();
                foreach ($sizes as $size) {?>
                    <option><?php echo $size; ?></option>
                <?php } ?>
            </select>
        </div>

        <label for="exampleInputEmail1">Ware images</label>
        <div class="form-group" ng-repeat="image in images">
            <input class="form-control" id="exampleInputEmail1" ng-model="image.path" placeholder="New image">
        </div>

        <div class="form-group">
            <button id="addNewImageButton" class="btn btn-primary">Добавить новое изображение</button>
        </div>

        <button id="addNewItemSubmitButton" type="submit" class="btn btn-primary">Сохранить</button>
    </form>

</div>