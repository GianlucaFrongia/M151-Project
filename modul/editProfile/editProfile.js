$("#changePic").click(function(){
    
    $("#picUploader").fadeIn("slow");
    
});

$(".change").each(function(){
	if($(this).attr("id") == "Ffirstname"){
		console.log("fName triggerd");
		$(this).keyup(function(){
			$("#usersName").html($(this).val());
		});
	}
	$(this).keydown(function(){
		$("#saveChangesButton").slideDown("slow");
	});
});

$("#deletePic").click(function(){
	$.ajax({
        method: "POST",
        url: "./modul/editProfile/editEntry.php",
        data: {toDo:"deletePic"},
        success: function(data){
            if(data){
               console.log(data);
			   $("#errorCatch").html(data);
			   $("#errorCatch").slideDown("slow").delay("3000").slideUp("slow");
            } else {
                $("#profPic").slideUp("slow", function(){
					window.location.replace("dashboard.php?tab=editProfile");
				});
            }
        }
    });
});

$("#saveChangesButton").click(function(){
    
    var firstname = $("#Ffirstname").val();
	var lastname = $("#Flastname").val();
	var email = $("#Femail").val();
    
    $.ajax({
        method: "POST",
        url: "./modul/editProfile/editEntry.php",
        data: {toDo:"saveChanges", firstname:firstname, lastname:lastname, email:email},
        success: function(data){
            if(data){
               console.log(data);
			   $("#errorCatch").html(data);
			   $("#errorCatch").slideDown("slow").delay("3000").slideUp("slow");
            } else {
                $("#saveChangesButton").html("Änderungen gespeichert!");
				$("#saveChangesButton").delay(1000).slideUp("slow", function(){
					$("#saveChangesButton").html("Änderungen speichern");
				});
            }
        }
    });
    
});