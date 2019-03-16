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
                        
                            <div class="ui icon input">
                                <input class="prompt" type="text" placeholder="Vad letar du efter?">
                                <i class="search icon"></i>
                            </div>
                            
                        </div>
                        
                    </div>
                    
                    <div class="borderless align right item">
                        <?php
                            session_start();
                            require_once("includes/user.php");
                            $user = new User();
                            if (isset($_SESSION["user"])) {
                                $username = $_SESSION["user"];
                                echo "Hej", " ", $_SESSION["user"], " ";
                                if ($user->checkIfAdmin($username) == true) {
                                    echo "<a class='admin-link' href='admin.php'><i class='star icon'></i>Admin</a> ";
                                } 

                            } 
                            
                        ?>
                        <?php 
                            if (isset($_SESSION['user']) && !empty($_SESSION['user']))
                            {
                        ?>
                            <a class="login-button" id="logOut"><i class="user icon"></i>Logga ut</a>
                            <a href="orderHistory.php" class="login-button" id=""><i class="heart icon"></i>Orderhistorik</a>
                        <?php 
                            } else{ 
                        ?>
                            <a class="login-button" id="logIn"><i class="user icon"></i>Logga in</a>
                        <?php 
                            } 
                        ?>
                        <!-- <a class="ui button primary""login-button" id="test"> Login </a> -->
                        <a class="ui button cart-button" href="cart.php"><i class="shopping cart icon"></i>
                        <span id="numberCart">
                        <?php
                            if (isset($_SESSION["itemID"])) {
                                echo json_encode(count($_SESSION["itemID"]));
                            } else {
                                echo "0";
                            }

                            
                        ?>
                        </span>
                        </a>
                    </div>
                </div>
            </div>
        </div>

</header>