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

        // Update product category
        $('#updateProductCategoryButton').click(function(){

            var updateProductID = $("#updateProductID").val();
            var updateProductCategory = $("#updateProductCategory").val();
            
            $.ajax({
                type: "POST",
                url:"api/handlers/productHandler.php",
                data:{action: "updateProductCategory", updateProductID: updateProductID, updateProductCategory: updateProductCategory},
                success: function(data){
                    console.log(data);
                    alert('Du har ändrat kategori!');
                    
                    window.location.href = "admin.php"
                   
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

