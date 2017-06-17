<?php
$ware = $data;?>

<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.4/angular.min.js"></script>
<script src="http://localhost/Footballcity_Project/js/modifyItemAngularController.js"></script>
<script src="http://localhost/Footballcity_Project/js/modifyItem.js"></script>

<div id="modifyItemDiv" ng-app="modifyItemAngularApp" ng-controller="modifyItemAngularController">
    <form>
        <div class="form-group" ng-repeat="prop in ware.properties">
            <label for="exampleInputEmail1">{{prop.property.propertyName}}</label>
            <input class="form-control" id="exampleInputEmail1" ng-model="prop.value.value" placeholder="Enter {{prop.value.value}}.toLowerCase()">
        </div>

        <button id="modifyItemSubmitButton" type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
