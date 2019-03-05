function registerUser(event, fields) {
    console.log("heeeej", fields.email, fields.password);
    $.ajax({   
        type: "POST",
        url: "api/handlers/userHandler.php",
        data:{requestType: "registerUser", email: fields.email, password: fields.password},
        success: function(data){ 
            if(data.status == 'error'){
                alert("Error!");
            }else {
                alert("Du har skapat konto");
            }
        }
    });
}


