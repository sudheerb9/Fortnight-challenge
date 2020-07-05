<?php 
session_start();
if(!isset($_SESSION['userid'])){
   header("Location:index.php");
}
?>
<html>
<head lang="en"><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="apple-mobile-web-app-capable" content="yes"/>
    <meta name="full-screen" content="yes"/>
    <meta name="screen-orientation" content="portrait"/>
    <title>Fortnight Challenge | Wissenaire</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" type="text/css" href="preloader/style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <link href='https://fonts.googleapis.com/css?family=Lato:300,400,700' rel='stylesheet' type='text/css'>
    <style type="text/css">
        .one{
            height: 100%;
            background: url("images/background.jpg") no-repeat center;
            background-size: cover;
        }
        .two{
            height: 100%;
            background: url("images/bg2.png") no-repeat center; 
            background-size: cover;
        }
        #play{
            margin-top: 58vh;
        }
        button {
            margin-left: auto;
            margin-right: auto;
            display: block;
            border: none;
            font-size: 15px;
            padding: 10px 30px;
            border-radius: 2em;
            background-color: #f8c901;
            color: #ffffff;
            width: 120px;
        }
        button:hover{
            box-shadow: 0 0 2em rgba(255,255,255,0.3);
        }
        button:active{
            transform: scale(0.9) translateY(10%);
            transition-timing-function: cubic-bezier(0.5, 0, 0.5, 1);
        }
    </style>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
</head>
<body>
    
<div id="preloader">
    <div id="particles-background" class="vertical-centered-box"></div>
    <div id="particles-foreground" class="vertical-centered-box"></div>

    <div class="vertical-centered-box" style="position: absolute; top: 0px;">
      <div class="content">
        <div class="loader-circle"></div>
        <div class="loader-line-mask">
          <div class="loader-line"></div>
        </div>
        <svg height="29px" viewBox="0 0 54 29" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
          <path d="M0 5 L11.31 5 L19.31 13 L27.31 5 L35.31 13 L43.31 5 L54.62 5 L35.31 29 L27.31 21 L19.31 29 Z" fill="#FFFFFF"></path>
        </svg>
      </div>
    </div>
</div>
    <div class="container-fluid hidden" id="container">
		<div class="row" style="height: 100vh;">
			<div class="col-lg-4 d-none d-lg-block" style="background-color: black;">
				
			</div>
			<div class="col-12 col-lg-4 one" id="home" style="min-width:320px; height:100vh;">
                <div id="play">
                    <button class="play" onclick="startGame()" id="playb">Play</button><br>
                    <button class="play" onclick="share()" id="share">Share</button>
             	</div>
            
                <div id="grid" class="hidden">
                    <div id="stars"></div>
                    <div id="stars2"></div>
                    <div id="stars3"></div>
                    <div id="quiz"> 
                        <p id="progress" style="color: #ffffff;">Question x of y</p>
                        <p id="question"></p>
             
                        <div class="buttons" style="">
                            <button id="btn0"><span id="choice0"></span></button>
                            <button id="btn1"><span id="choice1"></span></button>
                            <button id="btn2"><span id="choice2"></span></button>
                            <button id="btn3"><span id="choice3"></span></button>
                        </div>
             
                        
                        <footer style="position: absolute; top: 90vh; margin-left: 0; color: #ffffff;">
                            <p id="footer">Developed by Team WISSENAIRE </p>
                        </footer>
                    </div>
                </div>
            </div>
			<div class="col-12 col-lg-4 d-none d-lg-block" style="background-color: black;">
				
			</div>
		</div>
	</div>

  <!--<section id="leaderboard-section" class="hidden">-->
  <!--  <table>-->
  <!--    <thead>-->
  <!--      <tr>-->
  <!--        <th>Rank</th>-->
  <!--        <th>Player Name</th>-->
  <!--        <th>Score</th>-->
  <!--      </tr>-->
  <!--    </thead>-->
  <!--    <tbody id="leaderboard">-->

  <!--    </tbody>-->
  <!--  </table><br><br>-->
  <!--  <button onclick="share()"> SHARE </button>-->
  <!--</section>-->
 <script>
  window.fbAsyncInit = function() {
    FB.init({
      appId            : '358750151708808',
      autoLogAppEvents : true,
      xfbml            : true,
      version          : 'v6.0'
    });
  };
</script>
<script async defer src="https://connect.facebook.net/en_US/sdk.js"></script>
 <script src="https://connect.facebook.net/en_US/fbinstant.6.3.js"></script>
 <script src="question.js"></script>
 <script type="text/javascript" src="preloader/js.js"></script>
 <script type="text/javascript">
    $(window).on('load', function () {
        document.getElementById("preloader").style.display="none";
        $('#container').removeClass('hidden');
    });
 </script>
 <script type="text/javascript">
     function startGame() {
     $('#home').css("background-image", "url(images/bg2.jpg)");
        console.log('start button clicked');
            $('#play').addClass('hidden');
            $('#grid').removeClass('hidden');
 }
    function share() {
        FB.ui(
          {
            method: 'share',
            href: 'https://wissenaire.org/fc/',
          },
          // callback
          function(response) {
            if (response && !response.error_message) {
              alert('Posted successfully.');
            } else {
              alert('Error while posting.');
            }
          }
        );
    }
    
 </script>

</body>
</html>