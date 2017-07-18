$(document).ready(function(){
    $("#submitButton").hover(function () {
        //$("#submitButton").hide();
        alert("You entered!");
    }, function () {
        //$("#submitButton").show();
        alert("You leaved!");
    });

    $("#submitButton").focus(function(){
        $(this).css("background-color", "#cccccc");
    });

    $("#submitButton").blur(function(){
        $(this).css("background-color", "#ffffff");
    });
});