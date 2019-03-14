$(document).ready(function() {
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
    

    $(".shipping-container").ready(function() {
       // show cart
        $.ajax({
            type: "POST",
            url: "api/handlers/orderHandler.php",
            data: {action: "getCart"},
            success: function(data){
                var formattedData = JSON.parse(data);
                console.log(formattedData.length);
                for (var i = 0; i < formattedData.length; i++) {
                    $("#tableCart table tbody").append(formattedData[i]);
                }
                
            }
        });
        // show price
        $("#tableCart table").ready(function() {
            $.ajax({
                type: "POST",
                url:"api/handlers/orderHandler.php",
                data:{action: "getTotalPrice"},
                success: function(data){
                    var totalPrice = "Total summa" + " " + data + ":-";
                    $("#totalPrice").append(totalPrice);            
                }
            });
        });
        
        // skicka till ajax för att få session

        // session data
        // ska kanske göra hela carten i php

    function cartProduct(){
        var title = document.createElement("tr");
        title.innerHTML = name;
        card.appendChild(title);
        var priceSpan = document.createElement("span");
        priceSpan.innerHTML = price + " kr";
        card.appendChild(priceSpan);

        // tbody
    }
    });
});

$(document).ready(function() {
    $("#purchase").click(function(){
        $.ajax({
            type: "POST",
            url: "api/handlers/orderHandler.php",
            data:{action: "purchase"},
            success: function(data){
                console.log("lerglelgl");
                alert(data);
            }
        });
    });
});

/* <table class="ui single line table">
    <thead>
        <tr>
            <th>Name</th>
            <th>Antal</th>
            <th>Pris</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <th>Name</th>
            <th>Antal</th>
            <th>Pris</th>
        </tr>
        Table med namn, antal och pris

    </tbody>
</table> */