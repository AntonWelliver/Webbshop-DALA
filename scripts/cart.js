$(document).ready(function() {
    $(document).on("click", ".buyBtn", function(){
        
        var itemID = $(this).attr("id");
        var amount = $("#" + itemID).val();
        $.ajax({
            type: "POST",
            url: "api/handlers/orderHandler.php",
            data: {action: "addToCart", itemID: itemID, amount: amount},
            success: function(data){
                $("#numberCart").html(data);
            }
        })
    });
    

    $(".shipping-container").ready(function() {
       // shows cart
        $.ajax({
            type: "GET",
            url: "api/handlers/orderHandler.php",
            data: {action: "getCart"},
            success: function(data){
                var formattedData = JSON.parse(data);
                for (var i = 0; i < formattedData.length; i++) {
                    $("#tableCart table tbody").append(formattedData[i]);
                }
                
            }
        });
        // shows price
        $("#tableCart table").ready(function() {
            $.ajax({
                type: "GET",
                url:"api/handlers/orderHandler.php",
                data:{action: "getTotalPrice"},
                success: function(data){
                    var totalPrice = data;
                    $("#totalPrice").text(totalPrice);   
                             
                }
            });
        });
    });  

        
    $("#purchase").click(function(){
        var totalPrice = $("#totalPrice").html(); // totalPrice
        var shippingAlternative = $("input:checked").val(); 
        var firstname = $("#firstname").val();
        var lastname = $("#lastname").val();
        var adress = $("#billing").val();
        var city = $("#city").val();
        var phoneNr  = $("#phoneNr").val();
        var email = $("#emailAd").val();
        console.log(email);
        if (firstname == "" || lastname == "" || adress == "" || phoneNr == "" || email == "" || city == "") {
            alert('Du måste fylla i hela formuläret innan du kan göra en order!');
        }
        if (shippingAlternative == undefined) {
            alert('Du måste välja ett fraktalternativ!');
        } else {
            $.ajax({
                type: "POST",
                url: "api/handlers/orderHandler.php",
                data:{action: "purchase", totalPrice: totalPrice, shippingAlternative: shippingAlternative, firstname: firstname, lastname: lastname, adress: adress, city: city, phoneNr: phoneNr, email: email},
                success: function(data){
                    console.log(data);
                    alert('You sucessfully placed an order!');
                    window.location.href = "cart.php";
                }, error: function() {
                    console.log("error");
                }
            });
        }
    });

    getShippingOptions();
    handleEmail();

});

function getShippingOptions() {
    $.ajax({
        type: "GET",
        url:"api/handlers/orderHandler.php",
        data:{action: "getShippingOptions"},
        success: function(data){
            for (var i = 0; i < data.length; i++) {
                var outerDiv = document.createElement("div");
                outerDiv.classList.add("ui", "radio", "checkbox");
                var input = document.createElement("input");
                input.setAttribute("type", "radio");
                input.setAttribute("value", data[i]["Company"]);
                label = document.createElement("label");
                label.innerHTML = data[i]["Company"];
                outerDiv.appendChild(input);
                outerDiv.appendChild(label);
                $("#shippingOptions").append(outerDiv);
            }
        }
    });
}

// fucntion to fill in the email 
function handleEmail() { 
    $.ajax({
        type: "GET",
        url:"api/handlers/userHandler.php",
        data:{action: "getLoggedIn"},
        success: function(data){
            if (data != false) {
                $('#emailAd').val(data);
                $('#emailAd').attr('disabled','disabled');
            }
        }
    });
}