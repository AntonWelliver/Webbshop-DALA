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
    <script src="scripts/addCart.js"></script>


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
                    <a class="logo" href="index.php">DALAMAT</a>
                    <div class="ui computer only grid">
                        <div class="borderless item">

                        </div>

                    </div>
                    <div class="borderless align right item">
                        <a class="ui button cart-button"><i class="shopping cart icon"></i>0</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="placeholder-under-menu"></div>
        <div class="pusher">
        <table class="ui single line table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Antal</th>
                    <th>Pris</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th>Name</th>
                    <th>Antal</th>
                    <th>Pris</th>
                </tr>
    
    
            </tbody>
        </table>
<!-- Shipping adress -->
<div class="ui grid shipping-container">

    <form class="ui form" method="POST">

    <form class="ui form">

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
            <div class="ui checkbox">
                <input type="checkbox" name="nyhetsbrev" id="nyhetsbrev">
                <label>Jag vill gärna ha nyhetsbrev!</label>
            </div>     
        

            <div>
                <input type="submit" id="shipping" name="shipping" value="Adress sign" class="ui submit green button">
            </div>

    </form>
</div>
        </div>
    </header>

    <div class="placeholder-under-menu"></div>
<footer class="footerbot">
            <div class="ui list" id="footer-links">
                <a class="item">Vanliga frågor</a>
                <a class="item">Leveransvillkor</a>
                <a class="item">Integritetspolicy</a>

                <a class="login-button" href="index.php" id="logIn"><i></i>Logga in</a>   
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
