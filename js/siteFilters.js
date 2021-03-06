jQuery.extend({

    getQueryParameters : function() {
        var _get = {};
        var re = /[?&]([^=&]+)(=?)([^&]*)/g;
        while (m = re.exec(location.search))
            _get[decodeURIComponent(m[1])] = (m[2] == '=' ? decodeURIComponent(m[3]) : true);
        return _get;
        //return (str || document.location.search).replace(/(^\?)/,'').split("&").map(function(n){return n = n.split("="),this[n[0]] = n[1],this}.bind({}))[0];
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

    $("#lowerPriceLimit").keydown(function (e) {
        // Allow: backspace, delete, tab, escape, enter and .
        if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) !== -1 ||
            // Allow: Ctrl/cmd+A
            (e.keyCode == 65 && (e.ctrlKey === true || e.metaKey === true)) ||
            // Allow: Ctrl/cmd+C
            (e.keyCode == 67 && (e.ctrlKey === true || e.metaKey === true)) ||
            // Allow: Ctrl/cmd+X
            (e.keyCode == 88 && (e.ctrlKey === true || e.metaKey === true)) ||
            // Allow: home, end, left, right
            (e.keyCode >= 35 && e.keyCode <= 39)) {
            // let it happen, don't do anything
            return;
        }
        // Ensure that it is a number and stop the keypress
        if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
            e.preventDefault();
        }
    });

    $("#upperPriceLimit").keydown(function (e) {
        // Allow: backspace, delete, tab, escape, enter and .
        if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) !== -1 ||
            // Allow: Ctrl/cmd+A
            (e.keyCode == 65 && (e.ctrlKey === true || e.metaKey === true)) ||
            // Allow: Ctrl/cmd+C
            (e.keyCode == 67 && (e.ctrlKey === true || e.metaKey === true)) ||
            // Allow: Ctrl/cmd+X
            (e.keyCode == 88 && (e.ctrlKey === true || e.metaKey === true)) ||
            // Allow: home, end, left, right
            (e.keyCode >= 35 && e.keyCode <= 39)) {
            // let it happen, don't do anything
            return;
        }
        // Ensure that it is a number and stop the keypress
        if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
            e.preventDefault();
        }
    });

    $("#lowerPriceLimit").change(function(){
        updatePrice();
    });
    $("#upperPriceLimit").change(function(){
        updatePrice();
    });

    function updatePrice () {
        var lowerPriceLimitString = $("#lowerPriceLimit").val();
        var upperPriceLimitString = $("#upperPriceLimit").val();

        var lowerPriceLimit = parseInt(lowerPriceLimitString);
        var upperPriceLimit = parseInt(upperPriceLimitString);

        if (!isNaN(lowerPriceLimit) && !isNaN(upperPriceLimit)) {
            // two limits
            params.price = lowerPriceLimit + '-' + upperPriceLimit;
            refresh();
        } else {
            if (isNaN(lowerPriceLimit) && !isNaN(upperPriceLimit)) {
                // limited upper
                params.price = 'nolimit-' + upperPriceLimit;
                refresh();
            }

            if (!isNaN(lowerPriceLimit) && isNaN(upperPriceLimit)) {
                // limited lower
                params.price = lowerPriceLimit + '-nolimit';
                refresh();
            }

            if (isNaN(lowerPriceLimit) && isNaN(upperPriceLimit)) {
                // no limits
                delete params.price;
            }
        }


        /*if (lowerPriceLimit.length == 0 && upperPriceLimit.length == 0) {
            delete params.price;
        } else {
            refresh();
        }*/
    }

    function refresh () {
        var query = $.param(params);
        var currentAction = (window.location.href).split('?');
        var link = currentAction[0];
        if (!$.isEmptyObject(params)) {
            link = link + '?' + query;
        }
        window.location.href = link;
    }
});