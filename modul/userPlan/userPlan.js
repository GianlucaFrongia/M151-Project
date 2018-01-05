$(document).ready(function(){
    
    $("#exercise").slideDown("slow");
    
    $(".addExerciseForm").click(function(){
    
        $('.allExercise').children().last().clone().slideUp("fast", function(){
            $(this).appendTo(".allExercise").slideDown("slow", function(){

                var newID = parseInt($(this).attr("exerciseListID"));
                newID = newID + 1;
                $(this).attr("exerciseListID", newID);
                
                $(".sets", this).val("");
                $(".reps", this).val("");
                        
            });
            
        });

    });
    
    $(".deleteExerciseForm").click(function(){
        
        if($(".allExercise").children().last().attr("exerciseListID") != "1"){
            $(".allExercise").children().last().slideUp("slow", function(){
                $(this).remove();
            });
        }
        
    });
    
    $("#addNewPlan").click(function(){
        
        var planName = $("#fplanName").val();
        var planDescription= $("#fplanDescription").val();
        var listExercise, listSets, listReps;
        var exercises = new Array();
        var error = "";
        var i = 1;
    
        var countExercises = parseInt($('.allExercise').children().last().attr("exerciseListID"));
        
        do {
            
            $(".exercise").each(function(){
                
                if(parseInt($(this).attr("exerciseListID")) == i){
                    listExercise = $(".exerciseSelect", this).val();
                    listSets = $(".sets", this).val();
                    listReps = $(".reps", this).val();
                    
                    if(!listSets){
                        listSets = "1";
                    }
                    
                    var all =  [listExercise, listReps, listSets];
                    
                    if(listSets > 0 && listExercise){
                        exercises.push(all);
                    }

                }
            
            });
            
            i = i + 1;
        
        } while (countExercises >= i);
        
        console.log(exercises);
        console.log(planName);
        console.log(planDescription);
        
        if(exercises.length < 1){
            error = error + "Es muss mindestens eine Übung hinzugefügt werden. <br/>";
        } 
        
        if(!planName){
            error = error + "Es wurde kein Name angegeben. <br/>";
        }
        
        if(!planDescription){
            error = error + "Es wurde keine Beschreibung angegeben. <br/>";
        }
        
        if(error){
            $("#error").html(error).slideDown("slow");
        } else {
            $("#error").html(error).slideUp("slow");
            $.ajax({
                method: "POST",
                url: "./modul/userPlan/modifyPlan.php",
                data: {toDo: "addPlan",planName:planName, planDescription:planDescription, exercises:exercises},
                success: function(data){
                    if(data){
                        $("#error").html(data).fadeTo("slow", 1);
                    } else {
                        $("#fplanName").val("");
                        $("#fplanDescription").val("");
                        $('.allExercise').children().each(function(){
                            
                            $(".exerciseSelect", this).val("");
                            $(".sets", this).val("");
                            $(".reps", this).val("");
                            
                            if(parseInt($(this).attr("exerciseListID")) != 1){
                                $(this).slideUp("slow", function(){
                                    $(this).remove();
                                });
                            }

                        });
                    }
                }
            });
        }
    
    });
    
    $(".headInfo").each(function(){
        
        $(this).click(function(){
            
            var id = $(this).attr("planID");
            
            $(".detailed").each(function(){
                if($(this).attr("planID") == id){
                    $(this).toggle("slow");  
                }    
            });
        
        });
    
    });
    
    $(".fListdescription").each(function(){

        $(this).on("keyup", function(){
            
            var planID = $(this).attr("planID");
            
            $(".saveChangesButton").each(function(){
            
                if($(this).attr("planID") == planID){
                    $(this).slideDown("slow");
                }    
            
            });
            
        });
        
    });

    $(".saveChangesButton").each(function(){
        
        $(this).click(function(){
            
            var planID = $(this).attr("planID");
            var newDescription = "";
            var countExercises = 0;
            
            $(".planDescription").each(function(){
                
                if($(this).attr("planID") == planID){
                    newDescription = $(this).val();
                }
            
            });
            
            var listExercise, listSets, listReps;
            var newExercises = new Array();
            var error = "";
            var i = 1;
            
            $('.plansExercises').each(function(){
                if($(this).attr("planID") == planID){
                    countExercises = parseInt($(".listExercise", this).last().attr("listId"));
                }
            });
               
                
            do {
                
                $(".listExercise").each(function(){

                    if(parseInt($(this).attr("listId")) == i && $(this).attr("planID") == planID){
                        
                        console.log("triggered");
                        
                        planhasexID = $(this).attr("planhasexID");
                        listSets = $(".listSets", this).val();
                        listReps = $(".listReps", this).val();
                        
                        if(!listSets){
                            listSets = "1";
                        }
                        
                        var all =  [planhasexID, listReps, listSets];
                        
                        if(listSets > 0 && listReps > 0 && planhasexID){
                            newExercises.push(all);
                        }
    
                    }
                
                });
                
                i = i + 1;
            
            } while (countExercises >= i);
            
            console.log(newExercises);
            console.log(newDescription);
            
            
            
            if(newDescription != ""){
                $.ajax({
                    method: "POST",
                    url: "./modul/userPlan/modifyPlan.php",
                    data: {toDo: "changePlan",planID:planID, newDescription:newDescription, newExercises:newExercises},
                    success: function(data){
                        if(data){
                            $("#error").html(data).fadeTo("slow", 1);
                        } else {
                        }
                    }
                });
            }

            $(this).html("Änderungen gespeichert!").delay(1000).slideUp("slow");
            
        });
        
    });

    $(".deletePlanButton").each(function(){
        
        $(this).click(function(){
            
            var planID = $(this).attr("planID");
            
            $(this).html("Dies kann nicht rückgängig gemacht werden. Fortfahren?");
            $(this).css("background-color", "red");
            
            $(this).click(function(){
                
                $.ajax({
                    method: "POST",
                    url: "./modul/userPlan/modifyPlan.php",
                    data: {toDo: "deletePlan", planID:planID},
                    success: function(data){
                        if(data){
                            $("#error").html(data).fadeTo("slow", 1);
                        } else {
                            $(".userPlan").each(function(){
                                
                                if($(this).attr("planID") == planID){
                                    $(this).slideUp("slow");
                                }
                            
                            });
                        }
                    }
                });
            
            }); 
        
        });
    
    });

    $(".favStar").each(function(){
        
        $(this).click(function(){
            
            var planID = $(this).attr("planID");
            
            $.ajax({
                method: "POST",
                url: "./modul/publicPlan/editFav.php",
                data: {toDo: "deleteFav", planID:planID},
                success: function(data){
                    if(data){
                        $("#error").html(data).fadeTo("slow", 1);
                    } else {

                    }
                }
            });
            
            $(this).attr("isfav", "false");    
            $(this).removeClass("fa-star").addClass("fa-star-o");
            $(".FavPlanListEntry").each(function(){
                if($(this).attr("planID") == planID){
                    $(this).slideUp("slow");
                }    
            });
        });    
    });

    

});
