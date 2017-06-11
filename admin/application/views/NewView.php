<?php

$wareTypes = DatabaseHandler::getAllWareTypes();

//echo $data;
?>

<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.4/angular.min.js"></script>

<div ng-app="new_item_angular_app" ng-controller="new_item_angular_controller">

    <script>
        angular.module("new_item_angular_app", [])
            .controller("new_item_angular_controller", function($scope, $http) {
                //$scope.properties = [{'property_id':'name1','property_name':'value1'}, {'property_id':'name2','property_name':'value2'}];

                var url = "http://localhost/Footballcity_Project/admin/new/properties_json?ware_type_name=Shoes";

                $http.get(url).then(function(response) {
                    //alert(response);
                    $scope.properties = response.data;
                    //alert($scope.properties.length)
                    //alert(response);*/
                });

                //$scope.properties =
            });
    </script>

    <h4>Ware type</h4>

    <div id="wareTypeSelector" class="btn-group">
        <button type="button" class="btn btn-default dropdown-toggle brand" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            None
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

    <div id="propertiesContainer">
        <?php /*echo require 'TextPropertyView.php'; */?>

        <div class="input-group" ng-repeat="property in properties">
            <hr>
            <h4>{{property.property_name}}</h4>
            <input id="nameInput" type="text" class="form-control" ng-model="" aria-describedby="basic-addon1">
        </div>
    </div>

</div>