$(document).ready(function () {

    $('.add-to-basket-button').click(function () {
        //alert('gmklr');
        var url = rootDirectory + "/basket_add?item_id=" + getUrlParameter('id') + '&' + 'item_size=' + $('#size-select').val();
        $.get(url, function(data, status) {
            //location.reload();
            window.location.href = window.location.href + '&added=true'
        });
    });

    $('.delete-from-basket-button').click(function () {
        //alert('gmklr');
        if ($('#size-select').val() != undefined) {
            // came from item view
            var url = rootDirectory + "/basket_delete?item_id=" + getUrlParameter('id') + '&' + 'item_size=' + $('#size-select').val();
        } else {
            // came from basket view
            var url = rootDirectory + "/basket_delete?item_id=" + $(this).parent().parent().find('.id-container').text().trim() + '&' + 'item_size=' + $(this).parent().parent().find('.size-container').text().trim();
        }

        $.get(url, function(data, status) {
            //window.location.href = rootDirectory + '/balls';
            if (data == "deleted") {
                location.reload()
            }
        });
    });

    $('#confirm-order-button').click(function () {
        let fio = $('#fio-input').val();
        let email = $('#email-input').val();
        let phone = $('#phone-input').val();
        let additional = $('#additional-input').val();
        let url = rootDirectory + "/completeOrder?fio=" + fio + "&email=" + email + "&phone=" + phone + "&additional=" + additional;

        $.get(url, function(data, status) {
            if (data.localeCompare('success')) {
                fireSuccess($('#confirm-order-button'))
            }
            //location.reload();
            //let basketItems = data;
            //window.location.href = window.location.href;
        });

        /*var url = rootDirectory + "/getBasket_json";
        $.get(url, function(data, status) {
            //location.reload();
            let basketItems = data;
            //window.location.href = window.location.href;
        });*/
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

let fireSuccess = function (button) {
    button.text('Заказ успешно оформлен');
    button.prop('disabled', true);
};

let fireError = function fireError(button, originalText, errorMessage) {
    button.toggleClass('btn-primary');
    button.toggleClass('btn-danger');
    button.prop('disabled', true);

    // set blue back
    setTimeout(function(){
        button.toggleClass('btn-primary');
        button.toggleClass('btn-danger');
        button.text(originalText);
        button.prop('disabled', false);
    }, 1000);
    alert('Ошибка ' + errorMessage);
};