/* Click function for log-in form and close out line */
$(function(){
    $("#logIn").click(function(){
      $(".test").modal('show');
    });
    $(".test").modal({
      closable: true
    });
  });
/*   Function for login looking in userHandler for matching */
  $(document).ready(function(){
    $("#buttonLog").click(function(){
        var name = $("#email").val();
        var password = $("#password").val();
        console.log(password,name);
        $.ajax({   
            type: "POST",
            url: "api/handlers/userHandler.php",
            data:{requestType: "logInUser", email: name, password: password},
            success: function(result){ 
                console.log(result);
            }
        });

    });
       
});