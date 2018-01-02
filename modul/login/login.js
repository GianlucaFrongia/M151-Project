$("#gotoRegister").click(function () {
    event.preventDefault();
    $("#pageContent").fadeOut("fast", function(){
        $('.loadScreen').fadeTo("fast", 1);
        $("#pageContent").load("modul/register.php", function(){
            $('.loadScreen').fadeTo("fast", 0, function(){
                $("#pageContent").fadeIn("fast");  
            });
        });
    });
});