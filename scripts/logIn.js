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
        data:{action: "loginUser", email: fields.email, password: fields.password},
        success: function(data){ 
          console.log(data);
          if(data.status == 'pass is valid'){
            alert(data.status);
        }else {
            alert(data.status);
            event.preventDefault();
        }
        }
      });

};
       
