
/* Function for check in newsHandler for matching */
$(document).ready(function(){
    $("#newsReg").click(function(){
        var username = $("#username").val();
        var name = $("#emailNews").val();
        $.ajax({   
            type: "POST",
            url: "api/handlers/newsHandler.php",
            data:{action: "registera", email: name, username: username},
            success: function(data){ 
                if(data == 'error'){
                    alert("Error!");
                }else {
                    alert("Du är registerad för nyhetsbrev");
                }
            }
        });

    });

    $("#newsletterList").click(function() {
        $.ajax({   
            type: "POST",
            url: "api/handlers/newsHandler.php",
            data:{action: "showSubscribers"},
            success: function(data){
                $(".resultsDiv").empty();
                $(".resultsDiv").append("Det finns " +  data.length + " Premunanter: <br>");
                var table = document.createElement("table");
                table.classList.add("ui", "celled", "table");
                var userTh = document.createElement("th");
                userTh.innerHTML = "Username";
                var emailTh = document.createElement("th");
                emailTh.innerHTML = "Email";
                table.appendChild(userTh);
                table.appendChild(emailTh);
                for (var i = 0; i < data.length; i++) {
                    var tr = document.createElement("tr");
                    var userTD = document.createElement("td");
                    userTD.innerHTML = data[i]["Username"];
                    tr.appendChild(userTD);
                    var emailTD = document.createElement("td");
                    emailTD.innerHTML = data[i]["Email"];
                    tr.appendChild(emailTD);
                    table.appendChild(tr);
                }
                $(".resultsDiv").append(table);
            }
            
        });
    });


       
});