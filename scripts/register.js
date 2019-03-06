function registerUser(event, fields) {
    $.ajax({   
        async : false,
        type: "POST",
        url: "api/handlers/userHandler.php",
        data:{action: "registerUser", email: fields.email, password: fields.password},
        success: function(data){ 
            if(data.status == 'error'){
                alert(data.message);
            }else {
                alert("Du har skapat konto");
            }
        }
     });
}


