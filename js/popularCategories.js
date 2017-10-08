$(document).ready(function () {

    $('.categoryNameHolder, .categoryUrlHolder, .categoryImageHolder').change(function() {
        var categoryId = $(this).parent().parent().find('.categoryIdHolder').val();

        var categoryName = $(this).parent().parent().find('.categoryNameHolder').val();
        var categoryUrl = $(this).parent().parent().find('.categoryUrlHolder').val();
        var categoryImage = $(this).parent().parent().find('.categoryImageHolder').val();

        var url = rootDirectory + "/admin/popular_category/set";

        $.post(url, {
            id: categoryId,
            name: categoryName,
            url: categoryUrl,
            image: categoryImage
        }, function(data, status) {
            //location.reload();
        });
    });

    $('.deleteCategoryButton').click(function () {
        var categoryName = $(this).parent().parent().find('.categoryNameHolder').val();
        var categoryUrl = $(this).parent().parent().find('.categoryUrlHolder').val();
        var categoryImage = $(this).parent().parent().find('.categoryImageHolder').val();

        var url = rootDirectory + "/admin/popular_category/delete";

        $.post(url, {
            name: categoryName,
            url: categoryUrl,
            image: categoryImage
        }, function(data, status) {
            location.reload();
        });
    });

    $('#addNewCategoryButton').click(function () {
        var categoryName = $(this).parent().parent().find('.nameModalHolder').val();
        var categoryUrl = $(this).parent().parent().find('.urlModalHolder').val();
        var categoryImage = $(this).parent().parent().find('.imageModalHolder').val();

        var url = rootDirectory + "/admin/popular_category/add";

        $.post(url, {
                name: categoryName,
                url: categoryUrl,
                image: categoryImage
            }, function(data, status) {
                location.reload();
        });
    });
});
