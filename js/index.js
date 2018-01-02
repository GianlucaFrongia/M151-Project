$(document).ready(function(){
    
    $("body").fadeIn("fast");
    
    $("#pageContent").load("modul/login.php", function(){
        $('.loadScreen').fadeTo("fast", 0, function(){
            $("#pageContent").fadeIn("fast");  
        });
    });
    
});