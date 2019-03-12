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
    <script src="scripts/addCart.js"></script>
    <script src="scripts/loginValidation.js"></script>
    <script src="scripts/homepage.js"></script>
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
                        <?php
                            session_start();
                            if (isset($_SESSION["user"])) {
                                echo "Hej", " ", $_SESSION["user"], "!";
                            } 
                            
                        ?>
                        <?php 
                            if (isset($_SESSION['user']) && !empty($_SESSION['user']))
                            {
                        ?>
                            <a class="login-button" id="logOut"><i class="user icon"></i>Logga ut</a>
                        <?php 
                            } else{ 
                        ?>
                            <a class="login-button" id="logIn"><i class="user icon"></i>Logga in</a>
                        <?php 
                            } 
                        ?>
                        <!-- <a class="ui button primary""login-button" id="test"> Login </a> -->
                        <a class="ui button cart-button" href="cart.php"><i class="shopping cart icon"></i><span id="numberCart">0</span></a>
                    </div>
                </div>
            </div>
        </div>

    </header>
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
            
        <div id="foodBackgroundImage">
                
        </div>

        <div id="categoryName">
            
        </div>

        <div class="pusher">
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
            
            
        <!-- Login to your account popup  -->
        <div class="ui modal test">
            <div class="ui middle aligned center aligned grid">
                <div class="column">
                    <h2 class="ui red header">
                        <div class="content">
                        DALAMAT
                        </div>
                    </h2>

                        <!-- Form with email and password with placeholder and style for log-in-->
                        <form class="ui large form login-form" method="POST" data-ajax="false">
                            <div class="ui segment">
                                <div class="field">
                                    <div class="ui left icon input">
                                        <i class="user icon"></i>
                                        <input type="text" name="username" id="username" placeholder="Användarnamn">
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
                                <div class="ui error message"></div>
                                <div class="error-message"></div>
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
            <a href="#vanligafrågor" class="item">Vanliga frågor</a>
            <a href="#leveransvillkor" class="item">Leveransvillkor</a>
            <a href="#policy" class="item">Integritetspolicy</a>
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