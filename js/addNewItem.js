$('.wareTypeNames').click(function() {
    angular.element($('#newItemDiv')).scope().wareTypeName = $(this).text().trim();

    angular.element($('#newItemDiv')).scope().getPropertiesForWareType();
});

$('#addNewItemSubmitButton').click(function () {

    //var wareTypeName = $('#bbb').text().trim();
    //alert(wareTypeName);
    angular.element($('#newItemDiv')).scope().alertValues();
});