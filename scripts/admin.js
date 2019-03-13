$(document).ready(function(){

    $('#addProduct').click(function(){
        console.log('Hello world');
        var productName = $("#productName").val();
        var productPrice = $("#productPrice").val();
        var addImage = $("#addImage").val();
        var productCategory = $("#productCategory").val();

        $.ajax({
            type: "POST",
            url:"api/handlers/productHandler.php",
            data:{action: "addProduct", name: productName, price: productPrice, image: addImage, category: productCategory},
            success: function(data){
                alert('Du har lagt till en produkt!');
            }
        });
    });

    $.ajax({
        async: false,
        type: "POST",
        url:"api/handlers/productHandler.php",
        data:{action: "getProductsWithCategory", category: 'Frukt'},
        success: function(data){
            console.log(data);
            // ex för att få första produktens namn: data[0]['Name']
        }
    });

    $("#seeOrders").click(function(){
        $.ajax({
            type: "POST",
            url: "api/handlers/orderHandler.php",
            data: {action: "shippingHistory"},
            success: function(data){
                $(".resultsDiv").empty();
                $(".resultsDiv").append("Det finns " +  data.length + " order: <br>");
                var table = document.createElement("table");
                table.classList.add("ui", "celled", "table");
                var emailTh = document.createElement("th");
                emailTh.innerHTML = "Email";
                var orderIDTh = document.createElement("th");
                orderIDTh.innerHTML = "OrderID";
                table.appendChild(emailTh);
                table.appendChild(orderIDTh);
                for (var i = 0; i < data.length; i++) {
                    var tr = document.createElement("tr");
                    var emailTD = document.createElement("td");
                    emailTD.innerHTML = data[i]["Email"];
                    tr.appendChild(emailTD);
                    var orderIDTD = document.createElement("td");
                    orderIDTD.innerHTML = data[i]["OrderID"];
                    tr.appendChild(orderIDTD);
                    table.appendChild(tr);
                }
                $(".resultsDiv").append(table);
            }
        })
    })
    

    
        $.ajax({
            type: "POST",
            url:"api/handlers/orderHandler.php",
            data:{action: "getShippingOptions"},
            success: function(data){
                console.log(data[0]["Company"]); // ger första alternativet
                console.log(data[1]["Company"]); // ger andra alternativet
                // work with shipping options, display them on the order form
                $("#text1").append(data[0]["Company"]); //Första Radiobutton
                $("#text2").append(data[1]["Company"]); //Andra Radiobutton               
            }
        });

        $('#removeProduct').click(function(){
            console.log('123');
            var productID = $("#productID").val();
              
            $.ajax({
                type: "POST",
                url:"api/handlers/productHandler.php",
                data:{action: "removeProduct", productID: productID},
                success: function(data){
                    console.log(data);
                    alert(data);
                    /* alert('Du har tagit bort en produkt!') */;
                }
            });
        });
})