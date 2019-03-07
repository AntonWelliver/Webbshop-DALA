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
    <script src="scripts/logIn.js"></script>
    <script src="scripts/newsLetter.js"></script>
    <script src="scripts/formValidation.js"></script>
    <!-- Accept cookies -->
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/cookie-bar/cookiebar-latest.min.js?forceLang=se&theme=flying&always=1"></script>
    
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
                    <a class="login-button" id="logIn"><i class="user icon"></i>Logga in</a>
                    <!-- <a class="ui button primary""login-button" id="test"> Login </a> -->
                    <a class="ui button cart-button"><i class="shopping cart icon"></i>0</a>
                    </div>
                    </div>
                </div>
            </div>
        </header>


        <div class="placeholder-under-menu"></div>
    
        <div class="ui pushable segment">
            <div class="ui fixed sidebar thin vertical menu">
                <a class="item">Frukt <i class="angle right icon"></i></a>
                <a class="item">Grönsaker <i class="angle right icon"></i></a>
                <a class="item">Kött & fisk <i class="angle right icon"></i></a>
                <a class="item">Mejeri & Ost <i class="angle right icon"></i></a>
                <a class="item">Dryck <i class="angle right icon"></i></a>
            </div>
            
            <div class="pusher">
            
        <!-- Login to your account popup  -->
            <div class="ui modal test">
                <div class="ui middle aligned center aligned grid">
                <div class="column">
                <h2 class="ui red header">
                <div class="content">
                DALAMAT
            </div></h2>
<!--     Form with email and password with placeholder and style for log-in-->
    <form class="ui large form login-form">
        <div class="ui segment">
            <div class="field">
                <div class="ui left icon input">
                <i class="user icon"></i>
                <input type="text" name="email" id="email" placeholder="E-mail address">
            </div>
        </div>
        <div class="field">
            <div class="ui left icon input">
                <i class="lock icon"></i>
                <input type="password" name="password" id="password" placeholder="Password">
            </div>
        </div>
            <div>
                <input type="submit" name="Login" value="Logga in" class="ui fluid large green submit button" id="buttonLog" />
            </div>
            
        </div>
        <div class="ui checkbox">
            <input type="checkbox" name="ja" value="jaNyhetsbrev" id="newsYes">
            <label>Nyhetsbrev</label>
        </div>

        <div class="ui error message"></div>
    </form>
<!-- Redirect too register.php with message -->
    <div class="ui message">
        Ny hos oss? <a href="register.php">Registera dig</a>
    </div>
</div>
</div>
       </div>
            </div>
        </div>
        <footer>
            <div class="ui list" id="footer-links">
                <a class="item">Vanliga frågor</a>
                <a class="item">Leveransvillkor</a>
                <a class="item">Integritetspolicy</a>
               
            <!-- Click input to redirect to newsLetter.js too save email too database -->
<div class="ui form" >
    <a class="item" id="newsLetter">Nyhetsbrev</a>
        <div class="ui modal news">  
            <div class="ui middle aligned center aligned grid">
                <div class="column">
                    <h2 class="ui red header">
                        <div class="content">Nyhetsbrev</div>
                    </h2>
                        <div class="ui segment">
                            <div class="field">
                                <div class="ui left icon input">
                                    <i class="user icon"></i>
                                        <input type="text" name="email" id="emailNews" placeholder="E-mail address">
                                </div>
                                    <div>
                                        <input type="submit" name="registera" value="Registera dig" class="ui fluid large green submit button" id="newsReg" />
                                    </div>
                            </div>
                        </div>
                </div>
            </div>             
        </div>
</div>    
            <div class="footer-images">
                <!-- <img class="payment-method" src="assets/klarna.png">
                <img class="payment-method" src="assets/payment-cards.png">
                <img class="payment-method" src="assets/swish.png"> -->
                <div class="safe-ecommerce">
                    <img class="trygg-logo" src="assets/trygg-ehandel.png">
                    <img class="certifierad-logo" src="assets/certifierad-ehandel.png">
                </div>
                <img class="payment-method" src="assets/payment-method.png">
            </div>
        </footer>
    </body>
</html>