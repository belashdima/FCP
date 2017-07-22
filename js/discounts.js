$(document).ready(function () {

    $('.discountPercentHolder').change(function() {
        var brand = $(this).parent().parent().find('.brandHolder').text();
        var model = $(this).parent().parent().find('.modelHolder').text();
        var discountPercent = $(this).val();

        var url = "http://localhost/Footballcity_Project/admin/discount/set?" + "brand=" + brand + "&model=" + model + "&discountPercent=" + discountPercent;

            $.get(url, function(data, status) {
            //alert("Data: " + data + "\nStatus: " + status);
        });
    });

    $('.deleteDiscountButton').click(function () {
        var brand = $(this).parent().parent().find('.brandHolder').text();
        var model = $(this).parent().parent().find('.modelHolder').text();
        var discountPercent = $(this).val();

        var url = "http://localhost/Footballcity_Project/admin/discount/delete?" + "brand=" + brand + "&model=" + model;

        $.get(url, function(data, status) {
            location.reload();
        });
    });
});
