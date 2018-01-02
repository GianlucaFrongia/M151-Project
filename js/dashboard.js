
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

$(window).resize(function(){
  scale();
});

$(document).ready(function(){
    
    
    
    $("#sideNav").animate({width:'toggle'},350, function(){
        $("#sideNavPic").fadeIn("slow", function(){
            $("#sideNavItem").slideDown("slow", function(){
                $("#pageContent").fadeIn("slow", function(){
                    scale();
                });
            });
        });
    });
    
    $("#pageContent").load("modul/start.php");
    
    $(".nav-link").each(function(){
        
        var href = ($(this).attr('href'));
        
        $(this).click(function(){
            event.preventDefault();
            $("#pageContent").fadeOut("fast", function(){
                $('.loadScreen').fadeTo("fast", 1);
                if (href){
                    $("#pageContent").load(href, function(responseTxt,statusTxt){

                        if(statusTxt == "error"){
							$('.loadScreen').fadeTo("fast", 0, function(){
								$("#pageContent").html("<br/><br/><div class='alert alert-danger'><strong>Fehler </strong> Seite enthält keinen gültigen Pfad. Bitte wenden Sie sich an einen <a href='mailto:mail@eliareutlinger.ch'>Administrator</a>.</div>");
								$("#pageContent").fadeIn("fast");
							});
                        } else {
                            $('.loadScreen').fadeTo("fast", 0, function(){
                                $("#pageContent").fadeIn("fast", function(){
                                    scale();
                                });
                            });
                        }
                    });
                } else {
                    $("#pageContent").html("<br/><br/><div class='alert alert-danger'><strong>Fehler </strong> Seite wurde noch nicht verlinkt. Bitte wenden Sie sich an einen <a href='mailto:elia.reutlinger@baloise.ch'>Administrator</a>.</div>");
                }
            });
        });
        
    });
    
});