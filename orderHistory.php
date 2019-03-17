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
    <script src="scripts/loginHandler.js"></script>
    <script src="scripts/orderHistory.js"></script>

    <!-- Accept cookies -->
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/cookie-bar/cookiebar-latest.min.js?forceLang=se&theme=flying&always=1"></script>

</head>
<body>
    <?php include "includes/header.php"; ?>
    <div class="placeholder-under-menu"></div>
    <div class="order-history-container">
        <div id="tableCart">
            <h2>Kommer snart</h2>
            <h4 class="ui dividing header">Din orderhistorik</h4>
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
        </div>
    </div>
    <?php include "includes/loginForm.php"; ?>

    <?php include "includes/footer.php"; ?>
</body>

</html>
