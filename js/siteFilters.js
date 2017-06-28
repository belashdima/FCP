// With JQuery
$("#priceSlider").slider({});


// With JQuery
$("#priceSlider").on("slide", function(slideEvt) {
    var arr = (this.value).split(',');
    $("#lowerPriceLimit").text(arr[0]+'$');
    $("#upperPriceLimit").text(arr[1]+'$');
});
