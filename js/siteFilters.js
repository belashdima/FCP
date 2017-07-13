jQuery.extend({

    getQueryParameters : function(str) {
        return (str || document.location.search).replace(/(^\?)/,'').split("&").map(function(n){return n = n.split("="),this[n[0]] = n[1],this}.bind({}))[0];
    }

});

$(document).ready(function () {
    var params = {};

    params = $.getQueryParameters();


    $('.filter-variant-checkbox').change(function() {
        var uriRepresentation = $(this).parent().parent().parent().attr('id');
        params[uriRepresentation] = $(this).parent().parent().find('.filter-variant-name').text();

        if($(this).is(":checked")) {
            //'checked' event code
            params[uriRepresentation] = $(this).parent().parent().find('.filter-variant-name').text();
        } else {
            //'unchecked' event code
            delete params[uriRepresentation];
        }

        refresh();
    });

    $("#lowerPriceLimit").change(function(){
        updatePrice();
    });
    $("#upperPriceLimit").change(function(){
        updatePrice();
    });

    function updatePrice () {
        var lowerPriceLimit = $("#lowerPriceLimit").val();
        var upperPriceLimit = $("#upperPriceLimit").val();

        //refresh();
    }

    function refresh () {
        var query = $.param(params);
        var currentAction = (window.location.href).split('?');
        window.location.href = currentAction[0] + '?' + query;
    }
});