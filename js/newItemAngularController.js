
angular.module("newItemAngularApp", []).controller("newItemAngularController", function($scope, $http) {
    //$scope.properties = [{'property_id':'name1','property_name':'value1'}, {'property_id':'name2','property_name':'value2'}];

    $scope.wareTypeName = "None";

    $scope.images = [];

    $scope.getPropertiesForWareType = function getPropertiesForWareType() {
        var url = "http://localhost/Footballcity_Project/admin/new/properties_json?ware_type_name=" + $scope.wareTypeName;

        $http.get(url).then(function(response) {
            $scope.properties = response.data;
        });
    };

    $scope.alertValues = function () {
        //alert($scope.properties.length);
        var url = "http://localhost/Footballcity_Project/admin/new/add_new?ware_type_name=" + $scope.wareTypeName + "&"
            + createGetParamsFromProperties();
        alert(url);
        window.location.href=url;
        //$http.get(url);

        //window.location.href="http://localhost/Footballcity_Project/admin/wares";
    };

    function createGetParamsFromProperties() {
        var result = "";
        $scope.properties.forEach(function(item, i, arr) {
            result = result + item.property_name.toLowerCase() + "=" + item.propertyValue + "&";
        });
        result = result.slice(0, -1);// removes last '&' sign
        return result;
    }

    $scope.saveNewItem = function (button) {
        var url = "http://localhost/Footballcity_Project/admin/new/add_new?ware_type_name=" + $scope.wareTypeName;

        function toArray(images) {
            imagesArr = [];

            images.forEach(function(item, i, images) {
                if (item.path.indexOf('http') !== -1) {
                    imagesArr.push(item.path);
                }
            });

            return imagesArr;
        }

        var imagesArray = toArray($scope.images);

        var wareData = {properties: $scope.properties, images: imagesArray};

        var properties = JSON.stringify(wareData);

        var originalText = button.text();

        $http.post(url, properties).then(function () {
            // success
            // set btn to green to indicate success
            button.toggleClass('btn-primary');
            button.toggleClass('btn-success');
            button.text('Изменения успешно сохранены');
            button.prop('disabled', true);

            // set blue back
            setTimeout(function(){
                button.toggleClass('btn-primary');
                button.toggleClass('btn-success');
                button.text(originalText);
                button.prop('disabled', false);
            }, 1000);
            //window.location.href="http://localhost/Footballcity_Project/admin/wares";
        }, function () {
            // error
            button.toggleClass('btn-primary');
            button.toggleClass('btn-danger');
            button.prop('disabled', true);

            // set blue back
            setTimeout(function(){
                button.toggleClass('btn-primary');
                button.toggleClass('btn-danger');
                button.text(originalText);
                button.prop('disabled', false);
            }, 1000);
            alert('Ошибка');
        });
    };

    $scope.addNewImage = function () {
        $scope.images.push({path: ''});
    };
});
