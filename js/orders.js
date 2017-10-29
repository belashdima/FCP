$(document).ready(function () {
    var orderToDeleteId = -1;

    $('.delete-order-button').click(function () {
        orderToDeleteId = $(this).data("order-id");
    });

    $('#delete-order-submit-button').click(function () {
        var url = rootDirectory + "/admin/order_delete?order_id=" + orderToDeleteId;

        $.get(url, function(data, status) {
            //window.location.href = rootDirectory + '/balls';
            if (data.localeCompare("deleted") == 0) {
                $('#deleteOrderModal').hide();
                location.reload();
            }
        });
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