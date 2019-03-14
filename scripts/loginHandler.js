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
function loginUser() {
  
      var username = $("#username").val();
      var password = $("#password").val();
  
      $.ajax({   
        type: "POST",
        url: "api/handlers/userHandler.php",
        data:{action: "loginUser", username: username, password: password},
        success: function(data){
          $('.error-message').html(data); 
          if (data == "Du är nu inloggad") {
            window.location.href="index.php"
          }
        }
      });
};

$(document).ready(function() {
  $("#logOut").click(function() {
        $.ajax({
            type: "POST",
            url: "api/handlers/userHandler.php",
            data: {action: "logout" },
            success: function(data){
                if (data = "success") {
                    window.location.href = "index.php";
                }
            }
        });
  }); 

});

       
