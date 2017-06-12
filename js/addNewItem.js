$('.wareTypeNames').click(function() {
    var wareTypeName = $(this).text().trim();

    //alert(wareTypeName);
    angular.element($('#newItemDiv')).scope().getPropertiesForWareType(wareTypeName);
});

$('#addNewItemSubmitButton').click(function () {
    window.location.href="http://localhost/Footballcity_Project/admin/boots";
});