$(document).ready(function () {
    var params = {};
    var filters = [];

// With JQuery
    $("#priceSlider").slider({});


// With JQuery
    $("#priceSlider").on("slide", function(slideEvt) {
        var values = (this.value).split(',');
        $("#lowerPriceLimit").text(values[0]+'$');
        $("#upperPriceLimit").text(values[1]+'$');

        var filter = {};
        //filter.name = 'Price';
        filter.values = values;

        //filtersModel.push(filter);
        //filters.price = values;
        filters.size = 5;

        var json = JSON.stringify(filters);

        var f;

        /*$.post("demo_test.asp", function ((JSON.stringify(filters)), status) {

         });*/
    });

    $('.filterVariant').click(function () {
        $(this).toggleClass("list-group-item-success");
        $(this).toggleClass("list-group-item-action");
        var uriRepresentation = $(this).parent().prev().attr('id');
        params[uriRepresentation] = $(this).text();
        var query = $.param(params);

        //alert("http://localhost/Footballcity_Project/balls?" + query);
        //$.get("http://localhost/Footballcity_Project/balls?" + query);
        window.location.href = "http://localhost/Footballcity_Project/balls?" + query;
    });
});