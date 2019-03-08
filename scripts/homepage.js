$(document).ready(function(){
    $("#fruit").click(function() {
        $.ajax({
            type: "POST",
            url:"api/handlers/productHandler.php",
            data:{action: "getProductsWithCategory", category: 'Frukt'},
            success: function(data){
                showProducts(data, 'frukt');
            }, error: function(data) {
                console.log('Error');
            }
        });
    });
    $("#vegetables").click(function() {
        $.ajax({
            async: false,
            type: "POST",
            url:"api/handlers/productHandler.php",
            data:{action: "getProductsWithCategory", category: 'Grönsaker'},
            success: function(data){
                showProducts(data, 'grönsaker');
            }
        });
    });
    $("#meat").click(function() {
        $.ajax({
            async: false,
            type: "POST",
            url:"api/handlers/productHandler.php",
            data:{action: "getProductsWithCategory", category: 'Kött'},
            success: function(data){
                showProducts(data, 'kött');
            }
        });
    });
    $("#dairy").click(function() {
        $.ajax({
            async: false,
            type: "POST",
            url:"api/handlers/productHandler.php",
            data:{action: "getProductsWithCategory", category: 'Mejeri'},
            success: function(data){
                showProducts(data, 'mejeri');
            }
        });
    });
    $("#drinks").click(function() {
        $.ajax({
            async: false,
            type: "POST",
            url:"api/handlers/productHandler.php",
            data:{action: "getProductsWithCategory", category: 'Dryck'},
            success: function(data){
                showProducts(data, 'dryck');
            }
        });
    });
});

function showProducts(data, imgFilePath) {
    $(".productOuterDiv").remove();
    var wrapper = document.createElement("div");
    wrapper.classList.add("ui", "stackable", "two", "column", "grid", "productOuterDiv");
    for (var i = 0; i < data.length; i++) {
        var innerdiv = document.createElement("div");
        innerdiv.classList.add("column");
        var name = data[i]["Name"];
        var price = data[i]["Price"];
        var imageSource = data[i]["imageSource"];
        // div card
        var card = document.createElement("div");
        card.classList.add("ui", "card", "singleProduct");
        // bild
        var image = document.createElement("img");
        image.setAttribute("src", "productImages/" + imgFilePath + "/" + imageSource);
        image.classList.add("productImage");
        card.appendChild(image);
        // titel
        var title = document.createElement("h1");
        title.innerHTML = name;
        card.appendChild(title);
        // pris
        var priceSpan = document.createElement("span");
        priceSpan.innerHTML = price + " kr";
        card.appendChild(priceSpan);
        // antal
        var amount = document.createElement("input");
        amount.classList.add("left", "attached");
        amount.setAttribute("type", "number");
        amount.setAttribute("value", "1");
        amount.setAttribute("min", "1");
        amount.setAttribute("max", "100");
        card.appendChild(amount);
        // köpknapp
        var buyBtn = document.createElement("button");
        buyBtn.id = data[i]["ProductID"];
        // här borde dess id vara med
        buyBtn.innerHTML = "Köp";
        buyBtn.classList.add("buyBtn", "positive", "ui", "button", "right", "attached");
        card.appendChild(buyBtn);
        innerdiv.appendChild(card);
        wrapper.appendChild(innerdiv);
    }

    $(".pusher").prepend(wrapper);
}