     $(document).on("click", ".buyBtn", function(){
        
        var itemID = $(this).attr("id");
        var amount = $("#" + itemID).val();
        console.log(amount);
        $.ajax({
            type: "POST",
            url: "api/handlers/orderHandler.php",
            data: {action: "addToCart", itemID: itemID, amount: amount},
            success: function(data){
                $("#numberCart").html(data);
            }
        })
    })

    function cartProduct(){
        var title = document.createElement("h1");
        title.innerHTML = name;
        card.appendChild(title);
        var priceSpan = document.createElement("span");
        priceSpan.innerHTML = price + " kr";
        card.appendChild(priceSpan);
    }
