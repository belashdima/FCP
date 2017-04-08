/**
 * Created by belashdima on 08.04.17.
 */

$(document).ready(function() {
    // do stuff when DOM is ready
    $('.main-menu-item').click(function () {
        $(this).next().toggle('.sub-menu-item');
    });
});