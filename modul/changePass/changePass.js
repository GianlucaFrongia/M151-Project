$(document).ready(function(){
	
	if($("#changePassContent").attr("step") == "changePassword"){
		
		var token = $("#changePassContent").attr("token");
		var code = $("#changePassContent").attr("code");
		
		var url = "./modul/changePass/enterNewPass.php?token=" + token + "&code=" + code;
		
		$("#changePassContent").load(url,function(){
			
			
		
		});
		
	} else {
	
		$("#changePassContent").load("./modul/changePass/enterUser.php",function(){
		
			$("#gotoLogin").click(function(){
				
				//Normales Buttonevent verhindern, Seite ausblenden
				event.preventDefault();
				$("#pageContent").fadeOut("fast", function() {
					
					//Ladegrafik einblenden, Seite laden
					$(".loadScreen").fadeTo("fast", 1);
					$("#pageContent").load("modul/login.php", function() {
						
						//Ladegrafik ausblenden, Seite anzeigen
						$(".loadScreen").fadeTo("fast", 0, function() {
							$("#pageContent").fadeIn("fast");
						});
						
					});
					
				});
				
			});
			
			$("#changePassUser").click(function(){
				
				var username = $("#changePassUsername").val();
				var error = "";
				
				if (username.length > 30) {
					error = error + "Der Benutzername ist zu lang (Max. 30 Zeichen).<br/>";
				} else {
					if (username.length < 6) {
						if (username.length == 0) {
							error = error + "Es wurde kein Benutzername angegeben.<br/>";
						} else {
							error = error + "Der Benutzername ist zu kurz (Min. 6 Zeichen).<br/>";
						}
					}
				}
				
				if(error){
					$("#error").html(error).fadeTo("slow", 1);
				} else {
					
					$.ajax({
						method: "POST",
						url: "./modul/changePass/modifyPass.php",
						data: {toDo: "sendMail", username:username},
						success: function(data) {
							if (data) {
								$("#error").html(data).fadeTo("slow", 1);
							} else {
								$("#error").fadeTo("slow", 0);
								$("#changePassContent").fadeOut("slow", function(){
									
									$(".loadScreen").fadeTo("fast", 1);
									$("#changePassContent").load("./modul/changePass/enterCode.php", function() {
												
										//Ladegrafik ausblenden, Seite anzeigen
										$(".loadScreen").fadeTo("fast", 0, function() {
											$("#changePassContent").fadeIn("fast");
										});
										
										$("#changePassCodeButton").click(function(){
											
											var code = $("#changePassCode").val();
											var error = "";
				
											if (code.length != 6) {
												error = error + "Der Code ist ungültig.";
											}
											
											if(error){
												//Falls Daten zurückgegeben werden, Meldung ausgeben
												$("#error").html(data).fadeTo("slow", 1);
											} else {
												
												$.ajax({
													method: "POST",
													url: "./modul/changePass/modifyPass.php",
													data: {toDo: "checkCode", code:code},
													success: function(data) {
														if (data != "error") {
															
															$("#error").fadeTo("slow", 0);
															$("#changePassContent").fadeOut("slow", function(){
																
																$(".loadScreen").fadeTo("fast", 1);
																var url = "./modul/changePass/enterNewPass.php?token=" + data + "&code=" + code;
																$("#changePassContent").load(url, function() {
																			
																	//Ladegrafik ausblenden, Seite anzeigen
																	$(".loadScreen").fadeTo("fast", 0, function() {
																		$("#changePassContent").fadeIn("fast");
																	});
																	
																	$("#changePassPassButton").click(function(){
																		
																		var password = $("#changePassPass").val();
																		var password2 = $("#changePassPass2").val();
																		var token = $(this).attr("token");
																		var code = $(this).attr("code");
																		var error = "";
																		
																		//Variabeln zur Überprüfung definieren
																		var upperCase = new RegExp("[A-Z]");
																		var lowerCase = new RegExp("[a-z]");
																		var numbers = new RegExp("[0-9]");
																		
																		//Passwörter püfen (auf Länge, Inhalt und Gleichheit), oder Errormeldung zurückgeben
																		if (password.length < 8) {
																			if (password.length == 0) {
																				error = error + "Es wurde kein Passwort angegeben.<br/>";
																			} else {
																				error = error + "Das Passwort muss mindestens 8 Zeichen enthalten.<br/>";
																			}
																		} else {
																			if (password.match(upperCase) == null || password.match(lowerCase) == null || password.match(numbers) == null) {
																				error = error + "Das Passwort muss aus Gross- sowie Kleinbuchstaben, Zahlen und Sonderzeichen bestehen.<br/>";
																			} else {
																				if (password !== password2) {
																					error = error + "Die beiden Passwörter stimmen nicht überein. </br>";
																				}
																			}
																		}
																		//Passwörter prüfen ende
																		
																		if(token == "" || code == ""){
																			error = error + "Das Tokensystem scheint einen Fehler zu enthalten. </br>";
																		}
																		
																		if(error){
																			$("#error").html(error).fadeTo("slow", 1);
																		} else {
																			
																			$.ajax({
																				method: "POST",
																				url: "./modul/changePass/modifyPass.php",
																				data: {toDo: "resetPass", code:code, token:token, password:password, password2:password2},
																				success: function(data) {
																					if (data) {
																						//Falls Daten zurückgegeben werden, Meldung ausgeben
																						$("#error").html(data).fadeTo("slow", 1);
																					} else {
																						$("#changePassContent").fadeOut("slow",function(){
																							
																							$(this).html('<div class="alert alert-success" role="alert">Das Passwort wurde geändert. Sie können sich nun mit dem neuen Passwort einloggen.</div>').fadeIn("slow", function(){
																								$("#changePassContent").delay(1500).fadeOut("slow",function(){
																									$("#pageContent").fadeOut("fast", function(){
																										
																										$(".loadScreen").fadeTo("fast", 1);
																										$("#pageContent").load("modul/login.php", function() {
																											
																											//Ladegrafik ausblenden, Seite anzeigen, Benutzername-Feld füllen
																											$(".loadScreen").fadeTo("fast", 0, function() {
																												$("#fusername").val(username);
																												$("#pageContent").fadeIn("fast");
																											});
																											
																										});
																										
																									});
																									
																								});
																							});
																							
																						});
																					}
																				}
																			});
																			
																		}
																	
																	});
																			
																});
															
															});
															
														} else {
															$("#error").html("Code ungültig").fadeTo("slow", 1);
														}
													}
												});
												
											}
										
										});
												
									});
								
								});
							}
						}
					});
					
				}
				
			});
			
		});
		
	}
	
});