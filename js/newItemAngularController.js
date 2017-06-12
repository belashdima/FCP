angular.module("newItemAngularApp", [])
    .controller("newItemAngularController", function($scope, $http) {
        //$scope.properties = [{'property_id':'name1','property_name':'value1'}, {'property_id':'name2','property_name':'value2'}];

        $scope.getPropertiesForWareType = function getPropertiesForWareType(wareType) {
            var url = "http://localhost/Footballcity_Project/admin/new/properties_json?ware_type_name=" + wareType;

            $http.get(url).then(function(response) {
                $scope.properties = response.data;
            });
        }
    });