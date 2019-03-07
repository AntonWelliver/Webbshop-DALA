
/* Function for check in newsHandler for matching */
$(document).ready(function(){
    $("#newsReg").click(function(){
        var name = $("#emailNews").val();
        console.log(name);
        $.ajax({   
            type: "POST",
            url: "api/handlers/newsHandler.php",
            data:{action: "registera", email: name},
            success: function(data){ 
                if(data == 'error'){
                    alert("Error!");
                }else {
                    alert(data);
                }
            }
        });

    });
       
});