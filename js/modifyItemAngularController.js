
angular.module("modifyItemAngularApp", []).controller("modifyItemAngularController", function($scope, $http) {
    //$scope.properties = [{'property_id':'name1','property_name':'value1'}, {'property_id':'name2','property_name':'value2'}];

    //$scope.wareTypeName = "None";

    $scope.getPropertiesForWare = function getPropertiesForWare(wareId) {
        var url = "http://localhost/Footballcity_Project/admin/wares/ware_json?ware_id=" + wareId;

        $http.get(url).then(function(response) {
            $scope.ware = response.data;
        });
    };

    /*$scope.alertValues = function () {
        //alert($scope.properties.length);
        var url = "http://localhost/Footballcity_Project/admin/new/add_new?ware_type_name=" + $scope.wareTypeName + "&"
            + createGetParamsFromProperties();
        alert(url);
        window.location.href=url;
        //$http.get(url);

        //window.location.href="http://localhost/Footballcity_Project/admin/wares";
    };*/

    /*function createGetParamsFromProperties() {
        var result = "";
        $scope.properties.forEach(function(item, i, arr) {
            result = result + item.property_name.toLowerCase() + "=" + item.property_value + "&";
        });
        result = result.slice(0, -1);// removes last '&' sign
        return result;
    }*/

    /*$scope.modifyItem = function () {
        var url = "http://localhost/Footballcity_Project/admin/wares/modify?ware_type_name=" + $scope.wareTypeName;
        var properties = JSON.stringify($scope.properties);
        $http.post(url, properties).then(function () {
            // success
            //window.location.href="http://localhost/Footballcity_Project/admin/wares";
        }, function () {
            // error
            alert('Something went wrong');
        });
    };*/
});
