$(document).ready(function(){
    $("#Button").click(function(){
        var name = $("#email").val();
        var password = $("#password").val();
        console.log(password,name);
        $.ajax({   
            type: "POST",
            url: "includes/requestHandler.php",
            data:{requestType: "registerUser", email: name, password: password},
            success: function(result){ 
                $("body").append("Användare har skapats")
                console.log(result);
            }
        });

    });
       
});


