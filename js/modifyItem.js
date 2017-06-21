$(document).ready(function () {
    /*$('.wareTypeNames').click(function() {
        angular.element($('#newItemDiv')).scope().wareTypeName = $(this).text().trim();

        angular.element($('#newItemDiv')).scope().getPropertiesForWareType();
    });*/

    //alert(getUrlParameter("id"));

    angular.element($('#modifyItemDiv')).scope().getPropertiesForWare();

    $('#modifyItemSubmitButton').click(function () {
        //angular.element($('#newItemDiv')).scope().alertValues();
        angular.element($('#modifyItemDiv')).scope().modifyItem();
    });
});
