
$(document).ready(function() {
    // do stuff when DOM is ready

    $('.sub-menu-item').click(function () {
        //$('#mainContent').load('views/FootballBoots.php?value='+encodeURI($(this).attr('id')));

        var type = encodeURI($(this).attr('id'));
        //$('#mainContent').load('controllers/MainController.php?type='+type);
        //$('.body').load('application/boots');
    });
});