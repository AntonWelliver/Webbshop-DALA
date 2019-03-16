$(document).ready(function() {
    function onBodyLoad() {
        $.ajax({
            type: "POST",
            url:"api/handlers/orderHandler.php",
            data:{action: "OrderHistoryForUser"},
            success: function(data){
                for (var i = 0; i < data.length; i++) {
                    $("#tableCart table tbody").append(data[i]);
                }
            }
        });
    }

    onBodyLoad();
})