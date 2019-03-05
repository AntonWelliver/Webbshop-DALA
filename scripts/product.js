$(document).ready(function(){
    $(#addProduct).click(function(){
        $.ajax({
            type: "POST",
            url:{},
            data:{},
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