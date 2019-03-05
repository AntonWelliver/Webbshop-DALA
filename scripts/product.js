$(document).ready(function(){

    $('#addproduct').click(function(){
        var productName = $("#productName").val();
        var productPrice = $("#productPrice").val();
        var addImage = $("#addiImage").val();
        var productCategory = $("#productCategory").val();

        $.ajax({
            type: "POST",
            url:{"api/handlers/productHandler.php"},
            data:{action: "addProduct", name: productName, price: productPrice, image: addImage, category: productCategory},
            success: function(data){
                if(parseInt(data) > 0){
                    alert('Product with ID '+data+' stored!');
                    console.log(data);
                }else{
                    alert('Error:'+data+'')
                }
            }
        });
    })
})