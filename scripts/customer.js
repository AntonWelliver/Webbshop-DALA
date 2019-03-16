$(document).ready(function() {
    // All inputs when registering
    $("#shipping").click(function(){
        var firstname = $("#firstname").val();
        var lastname = $("#lastname").val();
        var adress = $("#billing").val();
        var city = $("#city").val();
        var phoneNr  = $("#phoneNr").val();
        var email = $("#emailAd").val();

        $.ajax({
            type: "POST",
            url: "api/handlers/customerHandler.php",
            data:{action: "shipping", firstname: firstname, lastname: lastname, adress: adress, city: city, phoneNr: phoneNr, email: email},
            success: function(){
                
            }, error: function(){
                console.log("error");
            }
        })
    })
})