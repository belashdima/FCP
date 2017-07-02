
angular.module("modifyItemAngularApp", []).controller("modifyItemAngularController", function($scope, $http) {
    //$scope.properties = [{'property_id':'name1','property_name':'value1'}, {'property_id':'name2','property_name':'value2'}];

    //$scope.wareTypeName = "None";
    $scope.wareId = getUrlParameter("id");

    $scope.getPropertiesForWare = function getPropertiesForWare() {
        var url = "http://localhost/Footballcity_Project/admin/wares/ware_json?ware_id=" + $scope.wareId;

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

    $scope.modifyItem = function (button) {
        var url = "http://localhost/Footballcity_Project/admin/wares/modify";
        var ware = JSON.stringify($scope.ware);

        var originalText = button.text();

        $http.post(url, ware).then(function () {
            // success

            // set btn to green to indicate success
            button.toggleClass('btn-primary');
            button.toggleClass('btn-success');
            button.text('Изменения успешно сохранены');

            // set blue back
            setTimeout(function(){
                button.toggleClass('btn-primary');
                button.toggleClass('btn-success');
                button.text(originalText);
            }, 500);
            //window.location.href="http://localhost/Footballcity_Project/admin/wares";
        }, function () {
            // error

            button.toggleClass('btn-primary');
            button.toggleClass('btn-danger');

            // set blue back
            setTimeout(function(){
                button.toggleClass('btn-primary');
                button.toggleClass('btn-danger');
                button.text(originalText);
            }, 500);
            alert('Something went wrong');
        });
    };

    $scope.deleteItem = function () {
        //alert('deleted');
        var wareId = $scope.ware.wareId;
        var url = "http://localhost/Footballcity_Project/admin/wares/delete?ware_id=" + wareId;

        $http.get(url).then(function(response) {
            if (response.data === 'deleted') {
                window.history.back();
            }

            //$scope.ware = response.data;
        });
        /*var url = "http://localhost/Footballcity_Project/admin/wares/delete";
        var ware = JSON.stringify($scope.ware);

        var originalText = button.text();

        $http.post(url, ware).then(function () {
            // success

            // set btn to green to indicate success
            button.toggleClass('btn-primary');
            button.toggleClass('btn-success');
            button.text('Изменения успешно сохранены');

            // set blue back
            setTimeout(function(){
                button.toggleClass('btn-primary');
                button.toggleClass('btn-success');
                button.text(originalText);
            }, 500);
            //window.location.href="http://localhost/Footballcity_Project/admin/wares";
        }, function () {
            // error

            button.toggleClass('btn-primary');
            button.toggleClass('btn-danger');

            // set blue back
            setTimeout(function(){
                button.toggleClass('btn-primary');
                button.toggleClass('btn-danger');
                button.text(originalText);
            }, 500);
            alert('Something went wrong');
        });*/
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
