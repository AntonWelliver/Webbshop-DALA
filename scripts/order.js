$(document).ready(function(){
    $.ajax({
        type: "POST",
        url:"api/handlers/orderHandler.php",
        data:{action: "getShippingOptions"},
        success: function(data){
            console.log(data[0]["Company"]); // ger första alternativet
            console.log(data[1]["Company"]); // ger andra alternativet
            // work with shipping options, display them on the order form
        }
    });
});