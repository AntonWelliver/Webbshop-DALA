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

    $('#removeProduct').click(function(){
        var removeProductID = $("#removeProductID option:selected").val();
        console.log(removeProductID);
        $.ajax({
            type: "POST",
            url:"api/handlers/productHandler.php",
            data:{action: "removeProduct", removeProductID: removeProductID},
            success: function(data){
                alert('Du har tagit bort en produkt!');
                getProducts();
            }
        });
    });

    $('#sendOrder').click(function(){
        var selectedOrder = $("#unsentOrders option:selected").val();
        console.log(selectedOrder);
        $.ajax({
            type: "POST",
            url:"api/handlers/orderHandler.php",
            data:{action: "sendOrder", orderId: selectedOrder},
            success: function(data){
                alert('Du har skickat ordern!');
                getUnSentOrders();
            }
        });
    });

    // load list of unsent orders and products
    getUnSentOrders();
    getProducts();
})

function getProducts() {
    $.ajax({
        type: "GET",
        url:"api/handlers/productHandler.php",
        data:{action: "getProductList"},
        success: function(data){
            $(".productList").empty();
            var products = JSON.parse(data);
            $(".orderList").empty();
            for (var i = 0; i < products.length; i++) {
                var option = document.createElement("option");
                option.setAttribute("value", products[i]["ProductId"]);
                option.innerHTML = products[i]["Name"];
                $(".productList").append(option);
            }
        }
    });
}

function getUnSentOrders() {
    $.ajax({
        type: "GET",
        url:"api/handlers/orderHandler.php",
        data:{action: "getUnsentOrders"},
        success: function(data){
            $(".orderList").empty();
            var orders = JSON.parse(data);
            for (var i = 0; i < orders.length; i++) {
                var option = document.createElement("option");
                option.setAttribute("value", orders[i]["OrderId"]);
                option.innerHTML = orders[i]["OrderId"] + ' (Skickas med ' + orders[i]["ShippingAlternative"] + ')';
                $(".orderList").append(option);
            }
        }
    });
}