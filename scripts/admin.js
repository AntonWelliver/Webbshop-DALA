$(document).ready(function(){

    $('#addProduct').click(function(){
        /* Tar in värderna för att kunna lägg till i database */
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
                var CustomerIDTh = document.createElement("th");
                CustomerIDTh.innerHTML = "CustomerID";
                var orderIDTh = document.createElement("th");
                orderIDTh.innerHTML = "OrderID";
                table.appendChild(CustomerIDTh);
                table.appendChild(orderIDTh);
                for (var i = 0; i < data.length; i++) {
                    var tr = document.createElement("tr");
                    var CustomerIDTD = document.createElement("td");
                    CustomerIDTD.innerHTML = data[i]["CustomerID"];
                    tr.appendChild(CustomerIDTD);
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

        // Update product category
        $('#updateProductCategoryButton').click(function(){

            var updateProductID = $("#updateProductID").val();
            var updateProductCategory = $("#updateProductCategory").val();
            
            $.ajax({
                type: "POST",
                url:"api/handlers/productHandler.php",
                data:{action: "updateProductCategory", updateProductID: updateProductID, productCategory: updateProductCategory},
                success: function(data){
                    alert('Du har ändrat kategori!');
                    window.location.href = "admin.php";
                   
                }
            });
        });

        $("#updateStock").click(function() {
            var productID = $("#productID").val();
            var amount = $("#sumProducts").val();
            $.ajax({
                type: "POST",
                url:"api/handlers/orderHandler.php",
                data:{action: "updateStock", productID: productID, amount: amount},
                success: function(data){
                    alert('Du har uppdaterat lagersaldot!');
                    window.location.href = "admin.php";
                   
                }
            });

        });

        /* Retrieve all list of products from database and display */
        $("#listOfProductsAdmin").click(function(){
            $.ajax({
                type: "POST",
                url: "api/handlers/productHandler.php",
                data: {action: "listOfProductsAdmin"},
                success: function(data){
                    $(".resultsDiv").empty();
                    $(".resultsDiv").append("<h4 class='amountOfText'>Det finns " +  data.length + " produkter: <br></h4>");
                    var table = document.createElement("table");
                    table.classList.add("ui", "unstackable", "single", "line", "table");
                    var productID = document.createElement("th");
                    productID.innerHTML = "Product ID";
                    var productName = document.createElement("th");
                    productName.innerHTML = "Name";
                    var productCategory = document.createElement("th");
                    productCategory.innerHTML = "Category";
                    var productUnitsInStock = document.createElement("th");
                    productUnitsInStock.innerHTML = "Units in stock";
                    table.appendChild(productID);
                    table.appendChild(productName);
                    table.appendChild(productCategory);
                    table.appendChild(productUnitsInStock);
                    for (var i = 0; i < data.length; i++) {
                        var tr = document.createElement("tr");
                        var productIDLoop = document.createElement("td");
                        productIDLoop.innerHTML = data[i]["ProductID"];
                        tr.appendChild(productIDLoop);
                        var productNameLoop = document.createElement("td");
                        productNameLoop.innerHTML = data[i]["Name"];
                        tr.appendChild(productNameLoop);
                        var productCategoryLoop = document.createElement("td");
                        productCategoryLoop.innerHTML = data[i]["Category"];
                        tr.appendChild(productCategoryLoop);
                        var productUnitsInStockLoop = document.createElement("td");
                        productUnitsInStockLoop.innerHTML = data[i]["UnitsInStock"];
                        tr.appendChild(productUnitsInStockLoop);



                        table.appendChild(tr);
                    }
                    $(".resultsDiv").append(table);
                }
            })
        })

    $('#sendOrder').click(function(){
        var selectedOrder = $("#unsentOrders option:selected").val();
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
    $(".orderList").ready(function() {
        getUnSentOrders();
    });
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

