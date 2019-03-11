$(document).ready(function(){
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
})