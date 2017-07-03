$(document).ready(function () {
    $('.wareTypeNames').click(function() {
        angular.element($('#newItemDiv')).scope().wareTypeName = $(this).text().trim();

        angular.element($('#newItemDiv')).scope().getPropertiesForWareType();
    });

    $('#addNewItemSubmitButton').click(function () {
        angular.element($('#newItemDiv')).scope().saveNewItem();
    });

    $('#addNewImageButton').click(function() {
        angular.element($('#newItemDiv')).scope().addNewImage();
    });
});

