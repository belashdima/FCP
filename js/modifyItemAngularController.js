
angular.module("modifyItemAngularApp", []).controller("modifyItemAngularController", function($scope, $http) {

    $scope.wareId = getUrlParameter("id");

    $scope.images = [];

    $scope.getPropertiesForWare = function getPropertiesForWare() {
        var url = "http://localhost/Footballcity_Project/admin/wares/ware_json?ware_id=" + $scope.wareId;

        $http.get(url).then(function(response) {
            $scope.ware = response.data;
            $scope.images = toObjectsArray($scope.ware.images);
        });
    };

    $scope.modifyItem = function (button) {
        var url = "http://localhost/Footballcity_Project/admin/wares/modify";

        $scope.ware.images = toArray($scope.images);

        var ware = JSON.stringify($scope.ware);

        var originalText = button.text();

        $http.post(url, ware).then(function () {
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

    $scope.addNewImage = function () {
        $scope.images.push({path: ''});
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

function toArray(images) {
    imagesArr = [];

    images.forEach(function(item, i, images) {
        if (item.path.indexOf('http') !== -1) {
            imagesArr.push(item.path);
        }
    });

    return imagesArr;
}

function toObjectsArray(images) {
    imagesArr = [];

    images.forEach(function(item, i, images) {
        imagesArr.push({path: item});
    });

    return imagesArr;
}
