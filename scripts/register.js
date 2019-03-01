$(document).ready(function(){
    $("#Button").click(function(){
        var name = $("#email").val();
        var password = $("#password").val();
        console.log(password,name);
        $.ajax({   
            type: "POST",
            url: "api/handlers/userHandler.php",
            data:{requestType: "registerUser", email: name, password: password},
            success: function(data){ 
                if(data.status == 'error'){
                    alert("Error!");
                }else {
                    alert("Du har skapat konto");
                }
            }

        });

    });
       
});


