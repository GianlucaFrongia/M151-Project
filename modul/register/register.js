$("#error").fadeTo("slow", 0);

$("#gotoLogin").click(function () {
    goToLogin();
});

function goToLogin(){
    event.preventDefault();
    $("#pageContent").fadeOut("fast", function(){
        $('.loadScreen').fadeTo("fast", 1);
        $("#pageContent").load("modul/login.php", function(){
            $('.loadScreen').fadeTo("fast", 0, function(){
                $("#pageContent").fadeIn("fast");
            });
        });
    });
}

$("#register").click(function(){

    event.preventDefault();

    $("#error").fadeTo("fast", 0, function(){

        var error = "";

        var username = $("#fusername").val();
        var password = $("#fpassword").val();
        var password2 = $("#fpassword2").val();
        var firstname = $("#ffirstname").val();
        var lastname = $("#flastname").val();
        var email = $("#femail").val();

        //Benutzernamen prüfen
        if(username.length > 30){
            error = error + "Der Benutzername ist zu lang (Max. 30 Zeichen).<br/>";
        } else {
            if(username.length < 6){
                if(username.length == 0){
                    error = error + "Es wurde kein Benutzername angegeben.<br/>";
                } else {
                    error = error + "Der Benutzername ist zu kurz (Min. 6 Zeichen).<br/>";
                }
            }
        }
        //Benutzernamen prüfen ende

        //Passwörter püfen

        var upperCase= new RegExp('[A-Z]');
        var lowerCase= new RegExp('[a-z]');
        var numbers = new RegExp('[0-9]');
        var emailAt = new RegExp('[@]');
        var emailDot = new RegExp('[.]');

        if(password.length < 8){
            if(password.length == 0){
                error = error + "Es wurde kein Passwort angegeben.<br/>";
            } else {
                error = error + "Das Passwort muss mindestens 8 Zeichen enthalten.<br/>";
            }
        } else {
            if(password.match(upperCase) == null || password.match(lowerCase) == null || password.match(numbers) == null){
                error = error + "Das Passwort muss aus Gross- sowie Kleinbuchstaben, Zahlen und Sonderzeichen bestehen.<br/>";
            } else {
                if(password !== password2){
                    error = error + "Die beiden Passwörter stimmen nicht überein. </br>";
                }
            }
        }
        //Passwörter prüfen ende

        //Vor- und Nachname prüfen
        if(firstname.length > 30){
            error = error + "Der Vorname ist zu lang (Max. 30 Zeichen).<br/>";
        } else {
            if(firstname.length < 2){
                if(firstname.length == 0){
                    error = error + "Es wurde kein Vorname angegeben.<br/>";
                } else {
                    error = error + "Der Vorname ist zu kurz (Min. 2 Zeichen).<br/>";
                }
            }
        }
        if(lastname.length > 30){
            error = error + "Der Nachname ist zu lang (Max. 30 Zeichen).<br/>";
        } else {
            if(lastname.length < 2){
                if(lastname.length == 0){
                    error = error + "Es wurde kein Nachname angegeben.<br/>";
                } else {
                    error = error + "Der Nachname ist zu kurz (Min. 2 Zeichen).<br/>";
                }
            }
        }
        //Vor- und Nachname prüfen ende

        //E-Mail überprüfen
        if(email.length > 50){
            error = error + "Die E-Mail Adresse ist zu lang (Max. 50 Zeichen).<br/>";
        } else {
            if(email.length == 0){
                error = error + "Es wurde keine E-Mail Adresse angegeben.<br/>";
            } else {
                if(email.match(emailAt) == null || email.match(emailDot) == null){
                    error = error + "Die angegebene E-Mail Adresse ist ungültig.<br/>";
                }
            }
        }

        //E-Mail überprüfen ende


        //Anfrage an Server schicken
        if(error){
            $("#error").html(error).fadeTo("slow", 1);
        } else {
            $.ajax({
                method: "POST",
                url: "./modul/register/registerUser.php",
                data: {username:username, password:password, password2:password2, firstname:firstname, lastname:lastname, email:email},
                success: function(data){
                    if(data){
                        $("#error").html(data).fadeTo("slow", 1);
                    } else {
                        $("#pageContent").fadeOut("slow", function(){
                            $("#pageContent").html('<div class="alert alert-success"><strong>Registriert!</strong> Sie können sich nun mit dem Benutzernamen "' + username + '" <a id="gotoLogin" style="cursor: pointer;" onclick="goToLogin()" class="alert-link">einloggen</a></div>');
                            $("#pageContent").fadeIn("slow");
                        });
                    }
                }
            });
        }

    });

});
