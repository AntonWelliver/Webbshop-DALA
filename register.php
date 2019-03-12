<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta http-equiv="X-UA-Compatible" content="ie=edge">
      <title>DALAMAT</title>
      <!-- CSS files -->
      <link rel="stylesheet" type="text/css" href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css" />
      <link rel="stylesheet" type="text/css" href="css/style.css">
      <!-- <link rel="stylesheet" type="text/css" href="css/animation.css"> -->
      <link rel="stylesheet" type="text/css" href="semantic/semantic.css">
      <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.1.8/components/icon.min.css'>
      <!-- Javascript & jQuery files -->
      <script src="https://code.jquery.com/jquery-3.1.1.min.js" integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8=" crossorigin="anonymous"></script>
      <script src="semantic/semantic.min.js"></script>
      <script src="scripts/register.js"></script>
      <script src="scripts/registerValidation.js"></script>
   </head>
   <body>
      <!-- <form id="register" action="register.php" method="post" accept-charset='UTF-8'> -->
      <!-- <fieldset> -->
      <!-- <input type="hidden" name="submitted" id="submitted" value="1"/> -->
      <div class="body-container">
      <div class="ui middle aligned center aligned grid">
         <div class="column">
            <h2 class="ui red header">
               <div class="content">
                  DALAMAT
               </div>
            </h2>
            <form class="ui large form register-form" method="POST">
               <div class="ui stacked segment">
                  <div class="emailExists"></div>
                  <div class="required field">
                     <div class="ui left icon input">
                        <i class="user icon"></i>
                        <input type="text" name="username" placeholder="Username" id="username">
                     </div>
                  </div>
                  <div class="required field">
                     <div class="ui left icon input">
                        <i class="user icon"></i>
                        <input type="text" name="email" placeholder="E-mail address" id="email">
                     </div>
                  </div>
                  <div class="required field">
                     <div class="ui left icon input">
                        <i class="lock icon"></i>
                        <input type="password" name="password" placeholder="Lösenord" id="password">
                     </div>
                     <br>
                     <br>
                     <div class="field">
                        <div class="ui left icon input">
                           <i class="lock icon"></i>
                           <input type="password" name="password" placeholder="Upprepa lösenordet" id="registerPasswordVerify">
                        </div>
                     </div>
                     <div class="field">
                        <div class="ui checkbox">
                           <input type="checkbox" name="nyhetsbrev" id="nyhetsbrev">
                           <label>Jag vill gärna ha nyhetsbrev!</label>
                        </div>
                     </div>
                     <div class="field">
                        <div class="ui checkbox">
                           <input type="checkbox" name="terms">
                           <label>I agree to the terms and conditions</label>
                        </div>
                     </div>
                     <input type="submit" name="Submit" value="Skapa konto" class="ui fluid large green submit button"/>
                  </div>
                  <div class="ui error message"></div>
            </form>
            <div class="ui message">
            Har redan ett konto? <a href="index.php">Logga in</a>
            </div>
            </div>
         </div>
      </div>
      <!-- </fieldset> -->
      <!-- </form> -->
   </body>
</html>