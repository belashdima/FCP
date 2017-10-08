$(document).ready(function () {
    /*$('.itemTypeNames').click(function() {
        angular.element($('#newItemDiv')).scope().itemTypeName = $(this).text().trim();

        angular.element($('#newItemDiv')).scope().getPropertiesForItemType();
    });*/

    //alert(getUrlParameter("id"));

    angular.element($('#modifyItemDiv')).scope().getPropertiesForItem();

    $('#modifyItemSubmitButton').click(function () {
        // pass button as argument to set result color and text
        angular.element($('#modifyItemDiv')).scope().modifyItem($(this));
    });

    $('#deleteSubmitButton').click(function () {
        //angular.element($('#newItemDiv')).scope().alertValues();
        // pass button as argument to set result color and text
        angular.element($('#modifyItemDiv')).scope().deleteItem();
    });

    /*$('#addImageSubmitButton').click(function() {
        var imagePath = $('#new-image-path').val();
        angular.element($('#modifyItemDiv')).scope().addNewImage(imagePath);


        $("#addImageModal").modal('hide');
        //$('#imagesContainer').append( "<div class='form-group'><input class='form-control' id='exampleInput' placeholder='Enter '></div>" );
    });*/

    function clearAddImageModal() {
        $('#new-image-path').val('');
    }
});
