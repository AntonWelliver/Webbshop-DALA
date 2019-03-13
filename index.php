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
      <script src="scripts/loginHandler.js"></script>
      <script src="scripts/newsLetter.js"></script>
      <script src="scripts/cart.js"></script>
      <script src="scripts/homepage.js"></script>
      <!-- Accept cookies -->
      <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/cookie-bar/cookiebar-latest.min.js?forceLang=se&theme=flying&always=1"></script>
   </head>
   <body>
      <?php
         include "includes/header.php";
      ?>
      <div class="placeholder-under-menu"></div>
      <div class="ui pushable segment">
      <div class="ui fixed sidebar thin vertical menu">
         <a class="item" id="allProducts">Alla produkter<i class="angle right icon"></i></a>
         <a class="item" id="fruit">Frukt <i class="angle right icon"></i></a>
         <a class="item" id="vegetables">Grönsaker <i class="angle right icon"></i></a>
         <a class="item" id="meat">Kött & fisk <i class="angle right icon"></i></a>
         <a class="item" id="dairy">Mejeri & Ost <i class="angle right icon"></i></a>
         <a class="item" id="drinks">Dryck <i class="angle right icon"></i></a>
      </div>
     
      <div class="pusher">
      <div id="foodBackgroundImage">
      </div>
      <div id="categoryName">
      </div>
      <div class="print-products-container"></div>
         <!-- NYHETSBREV -->
         <?php      
            if (isset($_SESSION["user"])) {
                echo '
                    <div class="ui grid nyhetsbrev-container">
                    <div class="ui form">
                        <div class="field">
                            <label>Anmäl dig för nyhetsbrev</label>
                            <input type="text" id="username" placeholder="Username">
                            <input type="email" id="emailNews" placeholder="E-mail adress">
                        </div>
                        <input type="submit" id="newsReg" name="registrera" value="Jag vill ha nyhetsbrev" class="ui submit green button">
                    </div>
                    </div> ';
            }

            ?>
         <!--     Form with email and password with placeholder and style for log-in-->
         <?php include "includes/loginForm.php" ?>
         <?php include "includes/footer.php"; ?>
    </div>
    
   </body>
   
</html>