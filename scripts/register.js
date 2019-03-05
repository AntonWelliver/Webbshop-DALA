$(document).ready(function(){
    $("#Button").click(function(){
        var name = $("#email").val();
        var password = $("#password").val();
        console.log(password,name);
        $.ajax({   
            type: "POST",
            url: "api/handlers/userHandler.php",
            data:{action: "registerUser", email: name, password: password},
            success: function(result){ 
                $("body").append("Användare har skapats")
                console.log(result);
            }
        });

    });
       
});


