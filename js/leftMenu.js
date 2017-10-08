
$(document).ready(function() {
    // do stuff when DOM is ready

    $('.sub-menu-item').click(function () {
        //$('#mainContent').load('views/FootballBoots.php?value='+encodeURI($(this).attr('id')));

        var type = encodeURI($(this).attr('id'));
        //$('#mainContent').load('controllers/MainController.php?type='+type);
        //$('.body').load('application/boots');
    });


    $('.brandVariant').click(function() {
        var modelId = $('#model_id_holder').text().trim();
        var brand = $(this).text().trim();
        $.get(rootDirectory + "/admin/boots/setBrandToModel.php?boots_model_id="+modelId+"&boots_model_brand_name="+brand)
            .done(function(data) {
                $('.brand').text(data);

                $('#alertSuccessfullySaved').css('display', 'block');
                $('#alertSuccessfullySaved').delay(2000).fadeOut('slow');
            });
    });

    $('#nameInput').change(function () {
        //alert('nljnk');
        var modelId = $('#model_id_holder').text().trim();
        var name = $(this).val().trim();
        $.get(rootDirectory + "/admin/boots/setNameToModel.php?boots_model_id="+modelId+"&boots_model_name="+name)
            .done(function(data) {
                $(this).val(data);

                $('#alertSuccessfullySaved').css('display', 'block');
                $('#alertSuccessfullySaved').delay(2000).fadeOut('slow');
            });
    });

    $('#priceInput').change(function () {
        //alert('nljnk');
        var modelId = $('#model_id_holder').text().trim();
        var price = $(this).val().trim();
        $.get(rootDirectory + "/admin/boots/setPriceToModel.php?boots_model_id="+modelId+"&boots_model_price="+price)
            .done(function(data) {
                $(this).val(data);

                $('#alertSuccessfullySaved').css('display', 'block');
                $('#alertSuccessfullySaved').delay(2000).fadeOut('slow');
            });
    });



    $('.useModelPrice').change(function() {
        if(this.checked) {
            var modelPrice = $('#priceInput').val().trim();
            $(this).closest('[data-sizeId]').find('.sizePriceInput').val(modelPrice);
            $(this).closest('[data-sizeId]').find('.sizePriceInput').prop('disabled', true);
        } else {
            $(this).closest('[data-sizeId]').find('.sizePriceInput').prop('disabled', false);
        };
    });

    $('.sizeQuantity[value=0]').closest('[data-sizeId]').addClass('danger');

    $('#football_balls').click(function() {
        //window.location.href = rootDirectory + "/admin/wares/wares_json?ware_type_id=7";
    });

});


