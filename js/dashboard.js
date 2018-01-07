
//Sorgt für eine bessere Responsiveness der start.php Seite.
function scale(){
    var actWidth = $(window).width();
    console.log("Scale Triggered with width: " + actWidth);
    if(actWidth < 570){
        $(".mb-0").css("font-size", "5rem");
        $(".mb-0").css("line-height", "4.5rem");
        if(actWidth < 480){
            $(".mb-0").css("font-size", "4rem");
            $(".mb-0").css("line-height", "3.5rem");
            if(actWidth < 410){
                $(".mb-0").css("font-size", "1.5rem");
                $(".mb-0").css("line-height", "2rem");
            } else if (actWidth > 410) {
                $(".mb-0").css("font-size", "4rem");
                $(".mb-0").css("line-height", "3.5rem");
            }
        } else if (actWidth > 480) {
            $(".mb-0").css("font-size", "5rem");
            $(".mb-0").css("line-height", "4.5rem");
        }
    } else if (actWidth > 570){
        $(".mb-0").css("font-size", "6rem");
    }
}

//Bei jeder Änderung der Fenstergrösse wird die Funktion ausgeführt.
$(window).resize(function(){
  scale();
});

$(document).ready(function(){
    
    
    //Aufbau der Seite animieren
    $("#sideNav").animate({width:'toggle'},350, function(){
        $("#sideNavPic").fadeIn("slow", function(){
            $("#sideNavItem").slideDown("slow", function(){
                $("#pageContent").fadeIn("slow", function(){
                    scale();
                });
            });
        });
    });
	
	//Inhalt der Seite füllen. Falls $_GET['tab'] = editProfile anderen Inhalt laden.
    if($("#pageContent").attr("tab") == "editProfile"){
		$("#pageContent").load("modul/editProfile.php");
		$("#pageContent").attr("tab", "");
	} else {
		$("#pageContent").load("modul/start.php");
	}
    
    //Links in der Navigation triggern
    $(".nav-link").each(function(){
        
        var href = ($(this).attr('href'));
        
		//Bei einem Klick soll die Seite nicht neu geladen werden, sondern der Inhalt per Ajax abgerufen.
        $(this).click(function(event){
            event.preventDefault();
            $("#pageContent").fadeOut("fast", function(){
                $('.loadScreen').fadeTo("fast", 1);
                if (href){
                    $("#pageContent").load(href, function(responseTxt,statusTxt){

                        if(statusTxt == "error"){
							//Bei einem Fehler Error meldung ausgeben
							$('.loadScreen').fadeTo("fast", 0, function(){
								$("#pageContent").html("<br/><br/><div class='alert alert-danger'><strong>Fehler </strong> Seite enthält keinen gültigen Pfad. Bitte wenden Sie sich an einen <a href='mailto:mail@eliareutlinger.ch'>Administrator</a>.</div>");
								$("#pageContent").fadeIn("fast");
							});
                        } else {
							//Inhalt der Seite anzeigen und Ladegrafik verschwinden lassen
                            $('.loadScreen').fadeTo("fast", 0, function(){
                                $("#pageContent").fadeIn("fast", function(){
                                    scale();
                                });
                            });
                        }
                    });
                } else {
					//Bei einem Fehler Error meldung ausgeben
                    $("#pageContent").html("<br/><br/><div class='alert alert-danger'><strong>Fehler </strong> Seite wurde noch nicht verlinkt. Bitte wenden Sie sich an einen <a href='mailto:elia.reutlinger@baloise.ch'>Administrator</a>.</div>");
                }
            });
        });
        
    });
    
});