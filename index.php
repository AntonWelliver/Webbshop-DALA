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
			<div class="ui menu">
            <div class="ui container mobile tablet only grid hamburger-container">
                <i class="bars icon" onclick="showSidebar()" id="mobile-item"></i>
            </div>
                <a class="logo" href="#">Matgrossisten</a>
            </div>
          
        </div>
      
	</div>


</header>
		
		

<div class="ui pushable segment">
		<div class="ui sidebar thin vertical menu">
			<a class="item">Frukt</a>
			<a class="item">Grönsaker</a>
			<a class="item">Menu Item C</a>
			<a class="item">Menu Item D</a>
		</div>
		<div class="pusher">
            <div id="content" class="ui segment">
                    Content here
            </div>
        </div>
</div>
    </body>
</html>