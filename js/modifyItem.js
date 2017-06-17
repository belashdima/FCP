$(document).ready(function () {
    /*$('.wareTypeNames').click(function() {
        angular.element($('#newItemDiv')).scope().wareTypeName = $(this).text().trim();

        angular.element($('#newItemDiv')).scope().getPropertiesForWareType();
    });*/

    //alert(getUrlParameter("id"));

    angular.element($('#modifyItemDiv')).scope().getPropertiesForWare(getUrlParameter("id"));

    $('#modifyItemSubmitButton').click(function () {
        //angular.element($('#newItemDiv')).scope().alertValues();
        angular.element($('#modifyItemDiv')).scope().modifyItem();
    });
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
