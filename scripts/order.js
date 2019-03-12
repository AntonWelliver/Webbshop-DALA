$(document).ready(function(){
            $.ajax({
                type: "POST",
                url: "api/handlers/orderHandler.php",
                data: {action: "shippingHistory"},
                success: function(data){
                    // printa ut orderhistorik som är kopplat till användaren här
                    console.log(data)
                }
            })
})


