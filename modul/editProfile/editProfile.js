$("#changePic").click(function(){
    
    $("#picUploader").fadeIn("slow");
    
});

$("#sendPic").click(function(){
    
    var file = "test";
    
    $.ajax({
        method: "POST",
        url: "./modul/editProfile/editEntry.php",
        data: {toDo:"sendpic", file:file},
        success: function(data){
            if(data){
               console.log(data);
            } else {
                
            }
        }
    });
    
});