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
      <link rel="stylesheet" type="text/css" href="css/cart.css">
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
      <script src="scripts/formValidation.js"></script>
      <!-- Accept cookies -->
      <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/cookie-bar/cookiebar-latest.min.js?forceLang=se&theme=flying&always=1"></script>
   </head>
   <body>
      <?php
         include "includes/header.php"
         ?>
      <div class="placeholder-under-menu"></div>
      <div class="pusher">
      <!-- Shipping adress -->
      <div class="ui grid shipping-container">
         <form class="ui form" method="POST">
            <h4 class="ui dividing header">Shipping Information</h4>
            <div class="field">
               <label>Name</label>
               <div class="two fields">
                  <div class="field">
                     <input type="text" id="firstname" name="shipping[first-name]" placeholder="First Name">
                  </div>
                  <div class="field">
                     <input type="text" id="lastname" name="shipping[last-name]" placeholder="Last Name">
                  </div>
               </div>
               <div class="field">
                  <label>Billing Address</label>
                  <div class="fields adress">
                     <div class="twelve wide field">
                        <input type="text" id="billing" name="shipping[address]" placeholder="Street Address">
                     </div>
                  </div>
               </div>
               <div class="two fields">
                  <div class="field">
                     <label>State</label>
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
                     <label>PhoneNumber</label>
                     <div class="field">
                        <label></label>
                        <input type="text" id="phoneNr" name="shipping[phoneNr]" placeholder="Number">
                     </div>
                  </div>
               </div>
               <div class="field">
                  <label>Email Address</label>
                  <div class="fields adress">
                     <div class="twelve wide field">
                        <input type="text" id="emailAd" name="shipping[email-address]" placeholder="Email Address">
                     </div>
                  </div>
               </div>
               <label>Fraktalternativ</label>
               <div class="ui radio checkbox">
                  <input id="shippingOptions1" type="radio" name="radio" checked="checked">
                  <label id="text1"></label>
               </div>
               <div class="ui radio checkbox">
                  <input id="shippingOptions2" type="radio" name="radio" checked="checked">
                  <label id="text2"></label>
               </div>
               <div>
                  <input type="submit" id="shipping" name="shipping" value="Adress sign" class="ui submit green button">
               </div>
         </form>
         </div>
         <?php include "includes/loginForm.php"; ?>
      </div>
      <?php include "includes/footer.php"; ?>

</body>

</html>

