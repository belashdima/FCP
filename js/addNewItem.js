$(document).ready(function () {
    $('.wareTypeNames').click(function() {
        angular.element($('#newItemDiv')).scope().wareTypeName = $(this).text().trim();

        angular.element($('#newItemDiv')).scope().getPropertiesForWareType();
    });

    $('#addNewItemSubmitButton').click(function () {
        //angular.element($('#newItemDiv')).scope().alertValues();
        angular.element($('#newItemDiv')).scope().saveNewItem();
    });

    $('#addNewImageButton').click(function() {
        angular.element($('#newItemDiv')).scope().addNewImage();
        //$('#imagesContainer').append( "<div class='form-group'><input class='form-control' id='exampleInput' placeholder='Enter '></div>" );
    });
});

