/**
 * Created by belashdima on 09.04.17.
 */

$(document).ready(function() {
    // do stuff when DOM is ready

    $('.sub-menu-item').click(function () {
        //$('#page-wrapper').load("contentPane/res.php?value="+encodeURI($(this).attr('id')));
        $('.container-fluid').load("contentPane/res.php?value="+encodeURI($(this).attr('id')));
    });
});