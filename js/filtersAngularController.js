
angular.module("filtersAngularApp", []).controller("filtersAngularController", function($scope, $http) {
    //$scope.properties = [{'property_id':'name1','property_name':'value1'}, {'property_id':'name2','property_name':'value2'}];

    //$scope.wareTypeName = "None";
    $scope.wareId = getUrlParameter("id");

    $scope.getPropertiesForWare = function getPropertiesForWare() {
        var url = rootDirectory + "/admin/wares/ware_json?ware_id=" + $scope.wareId;

        $http.get(url).then(function(response) {
            $scope.ware = response.data;
        });
    };

    $scope.modifyItem = function () {
        var url = rootDirectory + "/admin/wares/modify";
        var ware = JSON.stringify($scope.ware);
        $http.post(url, ware).then(function () {
            // success
            //window.location.href = rootDirectory + "/admin/wares";
        }, function () {
            // error
            alert('Something went wrong');
        });
    };
});

var getUrlParameter = function getUrlParameter(sParam) {
    var sPageURL = decodeURIComponent(window.location.search.substring(1)),
        sURLVariables = sPageURL.split('&'),
        sParameterName,
        i;

    for (i = 0; i < sURLVariables.length; i++) {
        sParameterName = sURLVariables[i].split('=');

        if (sParameterName[0] === sParam) {
            return sParameterName[1] === undefined ? true : sParameterName[1];
        }
    }
};
