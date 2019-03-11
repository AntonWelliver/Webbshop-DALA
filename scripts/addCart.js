     $(document).on("click", ".buyBtn", function(){
        
        var itemID = $(this).attr("id");
        var amount = $("#" + itemID).val();
        console.log(amount);
        $.ajax({
            type: "POST",
            url: "api/handlers/orderHandler.php",
            data: {action: "addToCart", itemID: itemID, amount: amount},
            success: function(data){
                /* console.log(data); */
            }
        })
    })
