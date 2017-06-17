var app = angular.module('adminPanelApp', []);

app.controller("adminPanelAngularController", function($scope, $http) {

    $http.get('http://localhost/Footballcity_Project/admin/wares/wares_json').then(function(response) {
        $scope.wares = response.data;
    });

    $http.get('http://localhost/Footballcity_Project/admin/wares/wares_json?ware_type_id=7').then(function(response) {
        $scope.footballBalls = response.data;
    });

});
