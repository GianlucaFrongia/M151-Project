$(document).ready(function(){
    
	//Seite nach vollständgiem Laden anzeigen
    $("body").fadeIn("fast");
    
	//Inhalt der Seite anzeigen und Ladegrafik verschwinden lassen
    $("#pageContent").load("modul/login.php", function(){
        $('.loadScreen').fadeTo("fast", 0, function(){
            $("#pageContent").fadeIn("fast");  
        });
    });
    
	
});