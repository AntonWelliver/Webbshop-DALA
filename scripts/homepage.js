$(document).ready(function(){
    $("#allProducts").click(function() {
        showProductsHeader("Alla produkter");
        $.ajax({
            type: "POST",
            url:"api/handlers/productHandler.php",
            data:{action: "getAllProducts"},
            success: function(data){
                showProducts(data);
            }, error: function(data) {
                console.log('Error');
            }            
        });
    });
    $("#fruit").click(function() {
        showProductsHeader("Frukt");
        $.ajax({
            type: "POST",
            url:"api/handlers/productHandler.php",
            data:{action: "getProductsWithCategory", category: 'Frukt'},
            success: function(data){
                showProducts(data);
            }, error: function(data) {
                console.log('Error');
            }
        });
    });
    $("#vegetables").click(function() {
        showProductsHeader("Grönsaker");
        $.ajax({
            async: false,
            type: "POST",
            url:"api/handlers/productHandler.php",
            data:{action: "getProductsWithCategory", category: 'Grönsaker'},
            success: function(data){
                showProducts(data);
            }
        });
    });
    $("#meat").click(function() {
        showProductsHeader("Kött & fisk");
        $.ajax({
            async: false,
            type: "POST",
            url:"api/handlers/productHandler.php",
            data:{action: "getProductsWithCategory", category: 'Kött & fisk'},
            success: function(data){
                showProducts(data);
            }
        });
    });
    $("#dairy").click(function() {
        showProductsHeader("Mejeri & Ost");
        $.ajax({
            async: false,
            type: "POST",
            url:"api/handlers/productHandler.php",
            data:{action: "getProductsWithCategory", category: 'Mejeri & Ost'},
            success: function(data){
                showProducts(data);
            }
        });
    });
    $("#drinks").click(function() {
        showProductsHeader("Dryck");
        $.ajax({
            async: false,
            type: "POST",
            url:"api/handlers/productHandler.php",
            data:{action: "getProductsWithCategory", category: 'Dryck'},
            success: function(data){
                showProducts(data);
            }
        });
    });
});

function showProductsHeader(category){
    var categoryName = document.getElementById("categoryName");
    categoryName.innerHTML = "<h1>" + category + "</h1>";
    console.log(category);
}

function showProducts(data) {
    var imgFilePath = "";
    $(".productOuterDiv").remove();
    var wrapper = document.createElement("div");
    wrapper.classList.add("productOuterDiv");
    for (var i = 0; i < data.length; i++) {
        switch(data[i]["Category"]) {
            case "Frukt":
                imgFilePath = "frukt";
                break;
            case "Grönsaker":
                imgFilePath = "grönsaker";
                break;
            case "Mejeri & Ost":
                imgFilePath = "mejeri";
                break;
            case "Kött & fisk":
                imgFilePath = "kött";
                break;
            case "Dryck":
                imgFilePath = "dryck";    
                break;
        }
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
        var title = document.createElement("h4");
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