$("#error").fadeTo("slow", 0);

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

$("#gotoPassword").click(function () {
    event.preventDefault();
    $("#error").html("<strong>Fehler: </strong> Diese Funktion ist noch nicht implementiert!").fadeTo("slow", 1).delay(2000).fadeTo("slow", 0);
});

$("#login").click(function(){
    event.preventDefault();
    $("#error").fadeTo("fast", 0, function(){
        
        var error = "";
        var username = $("#fusername").val();
        var password = $("#fpassword").val();
    
        if(username.length < 6){
            if (username.length == 0){
                error = error + "Es wurde kein Benutzername angegeben.<br/>";
            } else {
                error = error + "Benutzername muss aus mindestens 6 Zeichen bestehen. <br/>";
            }
        }
        
        if(password.length < 8){
            if (password.length == 0){
                error = error + "Es wurde kein Passwort angegeben.<br/>";
            } else {
                error = error + "Passwort muss aus mindestens 8 Zeichen bestehen. <br/>";
            }
        }
        
        if(error){
            $("#error").html(error).fadeTo("slow", 1);
        } else {
            $.ajax({
                method: "POST",
                url: "./modul/login/checkUser.php",
                data: {username:username, password:password},
                success: function(data){
                    if(data){
                        $("#error").html(data).fadeTo("slow", 1);
                    } else {
                        $("#pageContent").fadeOut("slow", function(){
                            $("#pageContent").html('<div class="alert alert-success"><strong>Erfolgreich </strong>eingeloggt!</div>');
                            $("#pageContent").fadeIn("slow").delay(1000).fadeOut("slow", function(){
                                $("body").fadeOut("slow", function(){
                                    window.location.replace("dashboard.php");
                                });
                            });
                        });
                        
                    }
                }
            });
        }
        
    });
    
});