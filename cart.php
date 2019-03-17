<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta http-equiv="X-UA-Compatible" content="ie=edge">
      <title>DALAMAT</title>
      <!-- CSS files -->
      <link rel="stylesheet" type="text/css" href="semantic/semantic.css">
      <link rel="stylesheet" type="text/css" href="css/style.css">
      <!-- FontAwesome Icons -->
      <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.1.8/components/icon.min.css'>
      <!-- Javascript & jQuery files -->
      <script src="https://code.jquery.com/jquery-3.1.1.min.js" integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8=" crossorigin="anonymous"></script>
      <script src="semantic/semantic.min.js"></script>
      <script src="scripts/script.js"></script>
      <script src="scripts/order.js"></script>
      <script src="scripts/customer.js"></script>
      <script src="scripts/loginHandler.js"></script>
      <script src="scripts/newsLetter.js"></script>
      <script src="scripts/cart.js"></script>
      <!-- Accept cookies -->
      <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/cookie-bar/cookiebar-latest.min.js?forceLang=se&theme=flying&always=1"></script>
   </head>
   <body>
      <?php
         include "includes/header.php"
      ?>
      <div class="placeholder-under-menu"></div>
      <div class="pusher">
      <?php 
            if (empty($_SESSION["itemID"])) {
               echo "<h1 class='empty-cart-message'>Hoppsan din varukorg är tom!</h1>";
            }
      ?>
      <!-- Shipping adress -->
      <div class="ui grid shipping-container">
         <form class="ui form shippingForm" method="POST">
            <h4 style="color: rgb(0, 142, 33)" class="ui dividing header">Leveransinformation</h4>
            <div class="field">
               <label>Namn</label>
               <div class="two fields">
                  <div class="field">
                     <input type="text" id="firstname" name="shipping[first-name]" placeholder="Förnamn">
                  </div>
                  <div class="field">
                     <input type="text" id="lastname" name="shipping[last-name]" placeholder="Efternamn">
                  </div>
               </div>
               <div class="field">
                  <label>Adress</label>
                  <div class="fields adress">
                     <div class="twelve wide field">
                        <input type="text" id="billing" name="shipping[address]" placeholder="Adress">
                     </div>
                  </div>
               </div>
               <div class="two fields">
                  <div class="field">
                     <label>Stad</label>
                     <select class="ui fluid dropdown" id="city">
                        <option value="">Stad</option>
                        <option value="Göteborg">Göteborg</option>
                        <option value="Lerum">Lerum</option>
                        <option value="Partille">Partille</option>
                        <option value="Mölndal">Mölndal</option>
                        <option value="Alingsås">Alingsås</option>
                     </select>
                  </div>
                  <div class="field">
                     <label>Telefonnummer</label>
                     <div class="field">
                        <label></label>
                        <input type="text" id="phoneNr" name="shipping[phoneNr]" placeholder="Telefonummer">
                     </div>
                  </div>
               </div>
               <div class="field">
                  <label>E-post adress</label>
                  <div class="fields adress">
                     <div class="twelve wide field">
                        <input type="text" id="emailAd" name="shipping[email-address]" placeholder="E-post adress">
                     </div>
                  </div>
               </div>
               <label>Fraktalternativ</label>
               <div id="shippingOptions">
               </div>
         </form>
         </div>
            <div id="tableCart">
            <h4 style="color: rgb(0, 142, 33)" class="ui dividing header">Slutför din beställning</h4>
            <table class="ui unstackable single line table cart-order-table">
                <thead>
                    <tr>
                        <th>Namn</th>
                        <th>Antal</th>
                        <th>Pris</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
            <div class="price-purchase-button-container">
            <h2 class="price">Total summa <span id="totalPrice"></span>:-</h2>
            <input type="submit" id="purchase" name="purchase" value="Slutför köp" class="ui submit green button">
            </div>
        </div>

        
         <?php include "includes/loginForm.php"; ?>
         <?php include "includes/footer.php"; ?>
      </div>
      
       
               

</body>

</html>

