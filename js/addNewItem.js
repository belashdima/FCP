$(document).ready(function () {
    $('.wareTypeNames').click(function() {
        angular.element($('#newItemDiv')).scope().wareTypeName = $(this).text().trim();

        angular.element($('#newItemDiv')).scope().getPropertiesForWareType();
    });

    $('#addNewItemSubmitButton').click(function () {
        //angular.element($('#newItemDiv')).scope().alertValues();
        angular.element($('#newItemDiv')).scope().saveNewItem();
    });
});

