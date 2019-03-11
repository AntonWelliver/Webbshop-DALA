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
function loginUser(event, fields) {
      event.preventDefault();
      $.ajax({   
        type: "POST",
        url: "api/handlers/userHandler.php",
        data:{action: "loginUser", username: fields.username, password: fields.password},
        success: function(data){
          $('.error-message').html(data); 
          
          /* if (data = "success") {
            alert("Du har loggat in");
          } else {
            window.location.href = 'register.php';
          } */
        }
      });
};

 /* $("#logOut").click(function() {
    console.log("logga ut");
      $.ajax({
          type: "POST",
          url: "api/handlers/userHandler.php",
          data: { action = "logout" },
          success: function(data){
              if (data = "success") {
                window.location.href = "index.php";
              }
          }
      });
    }); */
 

       
