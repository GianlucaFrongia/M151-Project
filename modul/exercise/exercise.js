$(document).ready(function(){
	
    $(".toggleInput").on("keyup", function(){
        if($(".toggleInput").val().length >= 1){
            
            $("#exerciseFormContent").slideDown("slow");
        }
    });
    
	$("#addExerciseButton").click(function(){
		
        var muscles = new Array();
        var description = $("#fdescription").val();
        var name = $("#fname").val();
        var error = "";
        
		$(".muscles").each(function(){
            
            var value = $(this).attr("value");
            
            
            if($(this).is(':checked')){
                muscles.push(value);
            }
        
        });
        
        if(muscles.length < 1){
            error = error + "Es wurden keine Muskelgruppen gewählt.<br/>";
        }
        
        if(description == ""){
            error = error + "Es wurde keine Beschreibung angegeben.<br/>";
        }
        
        if(name == ""){
            error = error + "Es wurde kein Name angegeben.<br/>";
        }
        
        if(error){
            $("#error").html(error).fadeTo("slow", 1);
        } else {
            $.ajax({
                method: "POST",
                url: "./modul/exercise/modifyExercise.php",
                data: {toDo: "addExercise",muscles:muscles, description:description, name:name},
                success: function(data){
                    if(data){
                        $("#error").html(data).fadeTo("slow", 1);
                    } else {
                        $("#fdescription").val("");
                        $("#fname").val("");
                        $(".muscles").each(function(){
                            $(this).prop( "checked", false );
                        });
                        $("#exerciseFormContent").slideUp("slow");
                    }
                }
            });
            
            
        }
	
	});

    $(".headInfo").each(function(){
        
        $(this).click(function(){
            
            var id = $(this).attr("exerciseID");
            
            $(".detailed").each(function(){
                if($(this).attr("exerciseID") == id){
                    $(this).toggle("slow");  
                }    
            });
        
        });
    
    });

    function redoButton(){
        
        $(".deleteButton").each(function(){
        
            $(this).click(function(){
                
                var exercise = $(this).attr("exerciseID");
                var muscleID = $(this).attr("muscleID");
                console.log(exercise);
                console.log(muscleID);
                
                $(".muscleGroup").each(function(){
                    if($(this).attr("exerciseID") == exercise && $(this).attr("muscleID") == muscleID){
                        $(this).slideUp("slow");
                        $.ajax({
                            method: "POST",
                            url: "./modul/exercise/modifyExercise.php",
                            data: {toDo: "deleteMuscle",exercise:exercise, muscleID: muscleID},
                            success: function(data){
                                if(data){
                                    $("#error").html(data).fadeTo("slow", 1);
                                } else {
                                    
                                }
                            } 
                        }); 
                    }    
                });
            
            });
        
        });
    }
    
    redoButton();
    
    $(".addButton").each(function(){ 
    
        $(this).click(function(){
            
            var exercise = $(this).attr("exerciseID");
             
            
            $(".muscleSelect").each(function(){
                
                if($(this).attr("exerciseID") == exercise){
                    
                    
                    var muscleID = $('option:selected', this).attr("value");
                    var muscleName = $('option:selected', this).html();
                    
                    $(this).val("");
                    
                    $(".musclesListed").each(function(){
                        
                        
                        if($(this).attr("exerciseID") == exercise && muscleID){
                        
                            $(this).append('<div style="display: none;" exerciseID="' + exercise + '" muscleID="'+ muscleID +'" class="muscleGroup newTrue"><i style="cursor: pointer;" exerciseID="' + exercise + '" muscleID="'+ muscleID +'" class="fa fa-times-circle deleteButton" aria-hidden="true"></i> '+ muscleName +' <br/></div>');
                            $(".newTrue").each(function(){
                                $(this).slideDown("slow");
                            });
                            
                            redoButton();
                            
                            $.ajax({
                                method: "POST",
                                url: "./modul/exercise/modifyExercise.php",
                                data: {toDo: "addMuscle",exercise:exercise, muscleID: muscleID},
                                success: function(data){
                                    if(data){
                                        $("#error").html(data).fadeTo("slow", 1);
                                    } else {
                                        
                                    }
                                }
                            
                            }); 
                            
                        }    
                    
                    });
                    
                }
            
            });
        
        });
        
    });

    $(".deleteExerciseButton").each(function(){
        
        $(this).click(function(){
            
            var exercise = $(this).attr("exerciseID");
            
            $(this).html("Die Übung wird aus allen Plänen gelöscht. Fortfahren?");
            $(this).css("background-color", "red");
            
            $(this).click(function(){
                
                $.ajax({
                    method: "POST",
                    url: "./modul/exercise/modifyExercise.php",
                    data: {toDo: "deleteExercise",exercise:exercise},
                    success: function(data){
                        if(data){
                            $("#error").html(data).fadeTo("slow", 1);
                        } else {
                            $(".userExercise").each(function(){
                                
                                if($(this).attr("exerciseID") == exercise){
                                    $(this).slideUp("slow");
                                }
                            
                            });
                        }
                    }
                });
            
            }); 
        
        });
    
    });

    $(".fListdescription").each(function(){
        
        var done = false;
        
        $(this).on("keyup", function(){
            
            var exerciseID = $(this).attr("exerciseID");
            
            $(".savebutton").each(function(){
            
                if($(this).attr("exerciseID") == exerciseID){
                    $(this).slideDown("slow");
                    if(!done){
                        $(".fListdescription").each(function(){
                
                            if($(this).attr("exerciseID") == exerciseID){
                                $(this).animate({height:"50%"},200);
                            }
                        
                        });
                        
                        done = true;
                    } 
                }    
            
            });
            
        });
        
    });

    $(".savebutton").each(function(){
        
        $(this).click(function(){
            
            
        
            var exerciseID = $(this).attr("exerciseID");
            var newDescription = "";
            
            $(".fListdescription").each(function(){
                
                if($(this).attr("exerciseID") == exerciseID){
                    newDescription = $(this).val();
                }
            
            });
            
            if(newDescription != ""){
                console.log("triggered");
                $.ajax({
                    method: "POST",
                    url: "./modul/exercise/modifyExercise.php",
                    data: {toDo: "changeDescription",exerciseID:exerciseID, newDescription:newDescription},
                    success: function(data){
                        if(data){
                            $("#error").html(data).fadeTo("slow", 1);
                        } else {
                            console.log("triggered2");
                        }
                    }
                });
            }

            $("a", this).html("Änderungen gespeichert!").delay(1000).slideUp("slow", function(){
                
                $(".fListdescription").each(function(){
                
                    if($(this).attr("exerciseID") == exerciseID){
                        $(this).animate({height:"70%"},200);
                    }
                
                });
                          
            });
            
        });
        
    });
    
});