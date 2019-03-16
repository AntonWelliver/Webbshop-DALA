<?php
session_start();
   require_once("includes/user.php");
   $user = new User();
   if (isset($_SESSION["user"])) {
      $username = $_SESSION["user"];
      if ($user->checkIfAdmin($username) != true) {
         header("Location: index.php");
         exit();
      } 

   } else {
      echo var_dump($_SESSION);
      header("Location: index.php");
      exit();
   }
?>
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
      <script src="scripts/script.js"></script>
      <script src="scripts/admin.js"></script>
      <script src="scripts/newsLetter.js"></script>
      <title>Admin page</title>
   </head>
   <body class="body-container">
      <div class="ui middle center aligned grid">
         <h2 class="ui red header">
            <div class="content">
               DALAMAT
            </div>
         </h2>
      </div>
      <div class="ui middle center aligned grid">
         <div class="ui breadcrumb">
            <a href="index.php" class="section">Startsida</a>
            <i class="right arrow icon divider"></i>
            <div class="active section">Admin</div>
         </div>
      </div>
      
      <div class="admin-list-container">
         <div class="buttons-center">
            <button class="ui blue button" id="seeOrders">Se gjorda beställningar</button>
            <button class="ui blue button" id="newsletterList">Lista över premunanter</button>
            <button class="ui blue button" id="listOfProductsAdmin">Lista över alla produkter</button>
         </div>
         <div class="resultsDiv">
         
         </div>
      </div>
         
      <div class="ui middle center aligned grid">
         
            <!-- <form ui large form register-form> -->
            <div class="ui small form" >
          <h2>Uppdatera lager</h2>
          <div class="field">
             <label for="productID"> Produkt:</label>
             <select id="productID" class="productList"></select>
             <label for="sumProducts"> Antal produkter:</label>
             <input type="text" name="sumProducts" id="sumProducts" maxlength="50"/>
             <button class="ui blue button" id="updateProduct">Uppdatera antal produkter i lager</button>
          </div>
          <h2>Skicka Order</h2>
          <div class="field">
             <label for="unsentOrders"> Ej skickade ordrar:</label>
             <select id="unsentOrders" class="orderList"></select>
             <button class="ui button" id="sendOrder">Markera som skickad</button>
          </div>
          <h2>Lägg till produkt</h2>
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
             <button class="ui green button" name="addproduct" id="addProduct">Lägg till</button>
          </div>
          <h2>Ändra kategori för produkt</h2>
          <div class="field">
             <label for="updateProductID">Product ID (du hittar detta på listan över alla produkter):</label>
             <input type="text" name="updateProductID" id="updateProductID" maxlength="50"/>
             <label for="updateProductCategory">Ny produktkategori</label>
             <input type="text" name="updateProductCategory" id="updateProductCategory" maxlength="50"/>
            <button class="ui blue button" name="updateCategory" id="updateProductCategoryButton">Uppdatera kategori</button>
          </div>
          <h2>Ta bort produkt</h2>
          <div class="field">
             <label for="removeProductID"> Produkt:</label>
             <select id="removeProductID" class="productList"></select>
             <button class="ui button" id="removeProduct">Ta bort produkt</button>
          </div>
          <h2>Listor</h2>
          <div>
             <button class="ui button" id="seeOrders">Se gjorda beställningar</button>
             <button class="ui button" id="newsletterList">Lista över premunanter</button>
          </div>
          <div class="resultsDiv">
          </div>
          
               <!--  </form> -->
         
            </div>
         </div>
      </div>
      
      
      
   </body>
</html>