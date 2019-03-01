<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>DALAMAT</title>
    <!-- CSS files -->
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/animation.css">
    <link rel="stylesheet" type="text/css" href="semantic/semantic.css">
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.1.8/components/icon.min.css'>
    <!-- Javascript & jQuery files -->
    <script src="https://code.jquery.com/jquery-3.1.1.min.js" integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8=" crossorigin="anonymous"></script>
    <script src="semantic/semantic.min.js"></script>
    <script src="scripts/script.js"></script>
    
</head>
    <body>
        <header>
            <div class="ui grid">
                <div class="column">
                    <div class="ui fixed menu">
                    <div class="ui container mobile tablet only grid hamburger-container">
                        <i class="bars icon" onclick="showSidebar()" id="mobile-item"></i>
                    </div>
                        <a class="logo" href="#">DALAMAT</a>
                    <div class="ui computer only grid">
                        <div class="borderless item">
                        <div class="ui icon input">
                            <input class="prompt" type="text" placeholder="Vad letar du efter?">
                            <i class="search icon"></i>
                        </div>
                    </div>
                
                        </div>
                    <div class="borderless align right item">
                    <a class="login-button" href="Register.php"><i class="user icon"></i>Logga in</a>
                    <a class="ui button green"><i class="shopping cart icon"></i>0</a>
                    </div>
                    </div>
                </div>
            </div>
        </header>
        <div class="placeholder-under-menu"></div>

        <div class="ui pushable segment">
            <div class="ui sidebar thin vertical menu">
                <a class="item">Frukt <i class="angle right icon"></i></a>
                <a class="item">Grönsaker <i class="angle right icon"></i></a>
                <a class="item">Kött & fisk <i class="angle right icon"></i></a>
                <a class="item">Mejeri & Ost <i class="angle right icon"></i></a>
                <a class="item">Dryck <i class="angle right icon"></i></a>
            </div>
            
            <div class="pusher">

            </div>
        </div>
        <footer>
            <div class="payment-container">
                <!-- <img class="payment-method" src="assets/klarna.png">
                <img class="payment-method" src="assets/payment-cards.png">
                <img class="payment-method" src="assets/swish.png"> -->
                <img class="trygg-logo" src="assets/trygg-ehandel.png">
                <img src="assets/certifierad-ehandel.png">
                <img class="payment-method" src="assets/payment-method.png">
            </div>
        </footer>
    </body>
</html>