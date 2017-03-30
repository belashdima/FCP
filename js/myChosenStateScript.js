/**
 * Created by belashdima on 27.03.17.
 */

/*$('.col-lg-4').hover(function () {
    $(this).css('borderWidth', '7px').css('borderColor', '#000000');
}, function () {
    $(this).css('borderWidth', '1px');
})*/

$('.card').hover(
    function() {
        //$(this).css('borderWidth', '3px');
        $(this).css('borderWidth', '2px');
        //$(this).css('width', parseFloat($(this).css('width')) - 5 + 'px');
        //$(this).css('height', parseFloat($(this).css('height')) - 5 + 'px');
    },
    function() {
        //$(this).css('borderWidth', '0px');
        $(this).css('borderWidth', '0px');
        //$(this).css('width', parseFloat($(this).css('width')) + 5 + 'px');
        //$(this).css('height', parseFloat($(this).css('height')) + 5 + 'px');
    });