
angular.module("modifyItemAngularApp", []).controller("modifyItemAngularController", function($scope, $http) {

    $scope.itemId = getUrlParameter("id");

    //$scope.finalPrice = "";

    $scope.newImage = '';

    $scope.getPropertiesForItem = function getPropertiesForItem() {
        let url = rootDirectory + "/admin/items/item_json?item_id=" + $scope.itemId;

        $http.get(url).then(function(response) {
            $scope.item = response.data;
        });
    };

    $scope.createItemOfCategory = function createItemOfCategory(categoryId) {
        let url = rootDirectory + "/admin/items/create_new?category_id=" + categoryId;

        $http.get(url).then(function(response) {
            return response.data;
        });
    };

    $scope.modifyItem = function (button) {
        let originalText = button.text();

        if ($scope.item.images.length < 1) {
            fireError(button, originalText, "Нет картинок");
        } else if (!validateItem($scope.item)) {
            fireError(button, originalText, "Неверные данные")
        } else {
            var url = rootDirectory + "/admin/items/modify";

            var item = JSON.stringify($scope.item);


            $http.post(url, item).then(function (response) {
                // success
                fireSuccess(button, originalText, response);
            }, function () {
                // error
                fireError(button, originalText, "Ошибка")
            });
        }
    };

    $scope.deleteItem = function () {
        let itemId = $scope.item.id;
        let url = rootDirectory + "/admin/items/delete?item_id=" + itemId;

        $http.get(url).then(function(response) {
            if (response.data === 'deleted') {
                window.history.back();
            }
        });
    };

    $scope.addNewItemImage = function addNewItemImage() {
        var $scope = angular.element($('#modifyItemDiv')).scope();
        newImage = angular.element($('#modifyItemDiv')).scope().newImage;
        if ($scope.item.images.indexOf(newImage) === -1) {
            $scope.item.images.push(newImage);
        }
    };

    $scope.deleteItemImage = function deleteItemImage(imagePath) {
        //alert(imagePath);
        var $scope = angular.element($('#modifyItemDiv')).scope();
        var i = $scope.item.images.indexOf(imagePath);
        if(i != -1) {
            $scope.item.images.splice(i, 1);
        }
    };

    /*$scope.setFinalPrice = function setFinalPrice(data) {
        var $scope = angular.element($('#modifyItemDiv')).scope();
        var price = data.properties[0].value.value;
        var discountPercent = data.discountPercent;
        $scope.finalPrice = price - price * discountPercent / 100;
    };*/

    $scope.updateFinalPrice = function updateFinalPrice() {
        let price = $('#PriceId').val();
        $scope.item.finalPrice = price - price * ($scope.item.discountPercent) / 100;
    };
});

let getUrlParameter = function getUrlParameter(sParam) {
    let sPageURL = decodeURIComponent(window.location.search.substring(1)),
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

let fireSuccess = function (button, originalText, response) {
    if (response.data.localeCompare("1") == 0) {
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
        //window.location.href = rootDirectory + "/admin/items";
    }
};

let fireError = function fireError(button, originalText, errorMessage) {
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
    alert('Ошибка ' + errorMessage);
};

let validateItem = function validateItem(item) {
    for (let i = 0; i < item.properties.length; i++) {
        let propertyValue = item.properties[i];

        if (propertyValue.property.propertyName.toLowerCase().indexOf('size') === -1) {
            if (propertyValue.value == null || propertyValue.value.value == null || propertyValue.value.value.length == 0) {
                return false
            }
        }
    }

    return true;
};
