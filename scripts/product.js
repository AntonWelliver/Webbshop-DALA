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
})