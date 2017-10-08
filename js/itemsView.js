$(document).ready(function () {

    $('#addNewItemButton').click(function() {
        var categoryId = $(this).attr('data-categoryId');

        var url = rootDirectory + "/admin/items/create_new?category_id=" + categoryId;

        $.get(url, function(data, status){
            window.location.href = rootDirectory + '/admin/items/item?id=' + data;
        });
    });
});