<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- CSS files -->
    <link rel="stylesheet" type="text/css" href="semantic/semantic.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <!-- FontAwesome Icons -->
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.1.8/components/icon.min.css'>
    <!-- Javascript & jQuery files -->
    <script src="https://code.jquery.com/jquery-3.1.1.min.js" integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8=" crossorigin="anonymous"></script>
    <script src="semantic/semantic.min.js"></script>
    <script src="scripts/product.js"></script>
    <title>Admin page</title>
</head>
<body class="body-container">
    <div class="ui middle aligned center aligned grid">
        <div class="column">
            <h2 class="ui red header">
            <div class="content">
            DALAMAT
            </div>
        
            </h2>
            <form ui large form register-form>
            <div class="ui form" >
                <div class="field">
                <label for="productID"> Produkt ID:</label>
                <input type="text" name="productID" id="productID" maxlength="50"/>
                <label for="sumProducts"> Antal produkter:</label>
                <input type="text" name="sumProducts" id="sumProducts" maxlength="50"/>

                <button class="ui button" id="updateProduct">Uppdatera antal produkter i lager</button>
                </div>

                <div class="field">
                <label for="productName"> Lägg till produktnamn:</label>
                <input type="text" name="productName" id="productName" maxlength="50"/>
                </div>

                <div class="field">
                <label for="addImage"> Bild URL:</label>
                <input type="text" name="addImage" id="addImage" maxlength="50"/>
                </div>

                <div class="field">
                <label for="productPrice"> Produkt pris:</label>
                <input type="text" name="productPrice" id="productPrice" maxlength="50"/>
                </div>

                <div class="field">
                <label for="productCategory"> Produktkategori:</label>
                <input type="text" name="productCategory" id="productCategory" maxlength="50"/>

                <button class="ui button" id="addProduct">Lägg till/Ta bort produkter</button>
                </div>

                <div>
                <button class="ui button" id="seeOrders">Se gjorda beställningar</button>
                </div>

                <div>
                <button class="ui button" id="newsletterList">Lista över nyhetsbrev</button>
                </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>