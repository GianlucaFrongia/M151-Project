$(document).ready(function(){
    
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
    
    $(".favStar").each(function(){
        
        $(this).click(function(){

            var planID = $(this).attr("planID");
            
            if($(this).attr("isfav") == "false"){
                
                $.ajax({
                    method: "POST",
                    url: "./modul/publicPlan/editFav.php",
                    data: {toDo: "addFav", planID:planID},
                    success: function(data){
                        if(data){
                            $("#error").html(data).fadeTo("slow", 1);
                        } else {
                            
                        }
                    }
                });
                
                $(this).removeClass("fa-star-o").addClass("fa-star");
                $(this).attr("isfav", "true");
                
            } else {

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
                
                $(this).removeClass("fa-star").addClass("fa-star-o");
                $(this).attr("isfav", "false");
                
            }    

        });    
    
    });

});