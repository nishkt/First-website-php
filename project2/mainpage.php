<?php
	date_default_timezone_set('Indian/Mauritius');
	include 'dbh.inc.php';
	include 'comments.inc.php'; 
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    }
    else
    {
        session_destroy();
        session_start(); 
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset ="utf-8" />
	<title>Kobe, Japan</title>
	<!-- If IE use the latest rendering engine -->
	<meta http-equiv="X-UA-Compatible" content="IE=edge">

	<!-- Set the page to the width of the device and set the zoon level -->
	<meta name="viewport" content="width = device-width, initial-scale = 1">

	<!-- Latest compiled and minified CSS -->
	<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous"> -->
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">

	<link rel="stylesheet" type="text/css" href="slider.css">
	<link rel="stylesheet" type="text/css" href="style.css">

	<!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

<style>
    /* Remove the navbar's default margin-bottom and rounded borders */ 
    .navbar {
      margin-bottom: 0;
      border-radius: 0;
    }
    
    /* Set height of the grid so .sidenav can be 100% (adjust as needed) */
    .row.content {height: 450px}
    
    /* Set gray background color and 100% height */
    .sidenav {
      padding-top: 20px;
      background-color: #f1f1f1;
      /*height: 100%;*/
    }
    
    /* Set black background color, white text and some padding */
    footer {
      background-color: #555;
      color: white;
      padding: 15px;
    }

    #aboutMe{
    	border: 2px;
    	padding: 2px;
    	margin: 2px;
    }

    #aboutMe img{
    	width: 50%;

    }

    
    /* On small screens, set height to 'auto' for sidenav and grid */
    @media screen and (max-width: 767px) {
      .sidenav {
        height: auto;
        padding: 15px;
      }
      .row.content {height:auto;}

/*      #aboutMe{
      	height:auto;
      }*/

	   #aboutMe img{
	    	width: 20%;
	    	/*float: right;*/
	   }

/*	   #aboutMe p{
	   	float: left;
	   }*/
 
    }

    .jumbotron {
    	height: auto;
    }

    #beef{
    	width: 30%;
    	float:right;
    }

    .sports{
    	padding-top: 10px;
    }

    #orix{
    	float: left;
    	width: 55%;
    }

    #vissel{
    	float: right;
    	width: 40%;
    }

    #comment{
    	background-color: rgba(10, 10, 10, 0.3)
    }



  </style>

    <script src="js/jquery-1.11.3.min.js" type="text/javascript"></script>
    <script src="js/jssor.slider-22.2.16.mini.js" type="text/javascript"></script>
    <script type="text/javascript">
        jQuery(document).ready(function ($) {

            var jssor_1_options = {
              $AutoPlay: true,
              $SlideDuration: 1500,
              $SlideEasing: $Jease$.$OutQuint,
              $ArrowNavigatorOptions: {
                $Class: $JssorArrowNavigator$
              },
              $BulletNavigatorOptions: {
                $Class: $JssorBulletNavigator$
              }
            };

            var jssor_1_slider = new $JssorSlider$("jssor_1", jssor_1_options);

            /*responsive code begin*/
            /*remove responsive code if you don't want the slider scales while window resizing*/
            function ScaleSlider() {
                var refSize = jssor_1_slider.$Elmt.parentNode.clientWidth;
                if (refSize) {
                    refSize = Math.min(refSize, 1920);
                    jssor_1_slider.$ScaleWidth(refSize);
                }
                else {
                    window.setTimeout(ScaleSlider, 30);
                }
            }
            ScaleSlider();
            $(window).bind("load", ScaleSlider);
            $(window).bind("resize", ScaleSlider);
            $(window).bind("orientationchange", ScaleSlider);
            /*responsive code end*/
        });
    </script>
</head>

<body>

	<nav class="navbar navbar-inverse">
	  <div class="container-fluid">
	    <div class="navbar-header">
	      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>                        
	      </button>
	      <a class="navbar-brand">Kobe, Japan</a>
	    </div>
	    <div class="collapse navbar-collapse" id="myNavbar">
	      <ul class="nav navbar-nav">
	        <li class="active"><a href="mainpage.php">Home</a></li>
	        <li><a href="contactform.php">Contact</a></li>
			<li><a href="hotels.php">Hotels</a></li>
	      </ul>
	      <ul class="nav navbar-nav navbar-right">
	        <li>
<?php 
	if(isset($_SESSION['id'])){
		echo "
		<form method ='POST' class='navbar-form navbar-right' role='logout' action='".userLogout()."'>
			<div class='form-group'>
				<button type='submit' class='btn btn-default' name='logoutSubmit'>Log out</button>
			</div>
		</form>";

	} else {
		echo "
		<form method ='POST' class='navbar-form navbar-right' role='login' action='".getlogin($conn)."'>
			<div class='form-group'>
				<input type='text' class='form-control' name='uid' placeholder = 'Username'>
				<input type='password' class='form-control' name='pwd' placeholder = 'Password'>
				<button type='submit' class='btn btn-default' name='loginSubmit'>Login</button>
			</div>
		</form>
		<li>
			<a href = 'signup.php'><button class='btn btn-default'>Signup!</button></a>
			</li>
		";
	}
?>
	        </li>
	      </ul>
	    </div>
	  </div>
	</nav>

		<div id="jssor_1" style="position:relative;margin:0 auto;top:0px;left:0px;width:1500px;height:600px;overflow:hidden;visibility:hidden;">
	        <!-- Loading Screen -->
	        <div data-u="loading" class="jssorl-oval" style="position:absolute;top:0px;left:0px;text-align:center;background-color:rgba(0,0,0,0.7);">
	            <img style="margin-top:-19.0px;position:relative;top:50%;width:38px;height:38px;" src="img/oval.svg" />
	        </div>
	        <div data-u="slides" style="cursor:default;position:relative;top:0px;left:0px;width:1500px;height:600px;overflow:hidden;">
	            <a data-u="any" href="http://www.jssor.com" style="display:none">Full Width Slider</a>
	            <div>
	                <img data-u="image" src="img/kobe-temple.jpg" />
	                <div style="position:absolute;top:85px;left:100px;width:600px;height:120px;z-index:0;background-color:rgba(0,0,0,0.5);">
	                    <div style="position:absolute;top:15px;left:15px;width:500px;height:40px;z-index:0;font-size:30px;color:#ffffff;line-height:40px;">Ikuta Shrine</div>
	                    <div style="position:absolute;top:60px;left:15px;width:570px;height:40px;z-index:0;font-size:20px;color:#ffffff;line-height:20px;">One of the oldest Shinto Shrines of Japan founded in the 3rd century AD</div>
	                </div>
	                <div style="position:absolute;top:370px;left:100px;width:600px;height:120px;z-index:0;background-color:rgba(0,0,0,0.5);">
	                    <div style="position:absolute;top:15px;left:15px;width:500px;height:40px;z-index:0;font-size:30px;color:#ffffff;line-height:40px;">Most visited shrine of Kobe</div>
	                    <div style="position:absolute;top:60px;left:15px;width:500px;height:40px;z-index:0;font-size:20px;color:#ffffff;line-height:20px;">Phone Number: +81 78-321-3851</div>
	                </div>
	            </div>
	            <div>
	                <img data-u="image" src="img/tetsujin.jpg" />
	                <div style="position:absolute;top:85px;left:100px;width:600px;height:120px;z-index:0;background-color:rgba(0,0,0,0.5);">
	                    <div style="position:absolute;top:15px;left:15px;width:500px;height:40px;z-index:0;font-size:30px;color:#ffffff;line-height:40px;">Tetsujin-28</div>
	                    <div style="position:absolute;top:60px;left:15px;width:570px;height:40px;z-index:0;font-size:20px;color:#ffffff;line-height:20px;">Built to commemorate the 15th anniversary of the Great Hanshin earthquake</div>
	                </div>
	                <div style="position:absolute;top:370px;left:100px;width:600px;height:120px;z-index:0;background-color:rgba(0,0,0,0.5);">
	                    <div style="position:absolute;top:15px;left:15px;width:500px;height:40px;z-index:0;font-size:30px;color:#ffffff;line-height:40px;">Great Hanshin Earthquake</div>
	                    <div style="position:absolute;top:60px;left:15px;width:500px;height:40px;z-index:0;font-size:20px;color:#ffffff;line-height:20px;">6.9 on the moment magnitude scale causing over 6000 people losing their lives on January 17th, 1995</div>
	                </div>
	            </div>
	            <div>
	                <img data-u="image" src="img/kobe-city-japan.jpg" />
	                <div style="position:absolute;top:85px;left:100px;width:600px;height:120px;z-index:0;background-color:rgba(0,0,0,0.5);">
	                    <div style="position:absolute;top:15px;left:15px;width:500px;height:40px;z-index:0;font-size:30px;color:#ffffff;line-height:40px;">Harbour Land</div>
	                    <div style="position:absolute;top:60px;left:15px;width:570px;height:40px;z-index:0;font-size:20px;color:#ffffff;line-height:20px;">A shopping and entertainment district between JR Kobe Station and the waterfront of Kobe's port area</div>
	                </div>
	                <div style="position:absolute;top:370px;left:100px;width:600px;height:120px;z-index:0;background-color:rgba(0,0,0,0.5);">
	                    <div style="position:absolute;top:15px;left:15px;width:500px;height:40px;z-index:0;font-size:30px;color:#ffffff;line-height:40px;">Romantic Environment</div>
	                    <div style="position:absolute;top:60px;left:15px;width:500px;height:40px;z-index:0;font-size:20px;color:#ffffff;line-height:20px;">Large selection of shops, restaurants, amusements, make it a popular spot for couples and tourists</div>
	                </div>
	            </div>
	        </div>
	        <!-- Bullet Navigator -->
	        <div data-u="navigator" class="jssorb05" style="bottom:16px;right:16px;" data-autocenter="1">
	            <!-- bullet navigator item prototype -->
	            <div data-u="prototype" style="width:16px;height:16px;"></div>
	        </div>
	        <!-- Arrow Navigator -->
	        <span data-u="arrowleft" class="jssora22l" style="top:0px;left:8px;width:40px;height:58px;" data-autocenter="2"></span>
	        <span data-u="arrowright" class="jssora22r" style="top:0px;right:8px;width:40px;height:58px;" data-autocenter="2"></span>
	    </div>
	    <!-- #endregion Jssor Slider End -->	  

	<div class="container-fluid text-center">    
	  <div class="row content">
	    <div class="col-sm-3 sidenav">
	    	<div id="aboutMe">
		    	<img src="img/nishant.jpg">
		    	<hr>
		    	<h3>About Me</h3>
		    	<p>My name is Nishant Teckchandani. I am a student studying BSc in Information Technology at Middlesex University. I was born in Kobe, Japan and I consider Kobe, Japan as my hometown.</p>
	    	</div>
	    </div>
	    <div class="col-sm-9 text-left"> 
	    	<div class="container-fluid text-center">
			    <h1>Welcome to Kobe! </h1>
			    <p>Kobe is the capital of the Hyogo prefecture. It is located on the southern side of the island of Honshu  and is thee capital of the Hyogo Prefecture. It is 19km away from Osaka and 520 km from Tokyo. Kobe is the sixth-largest city in Japan. The city is famous for its "Kobe beef" and "Arima Onsen" (hot springs). Kobe is the home to notable sports teams like the Orix Buffaloes (Baseball) and the Kobe Vissel (Football). Kobe has a vast and rich history, being home to many shinto shrines.</p>
		    </div>
		    <hr>
		    <div class="container-fluid text-center">
			    <h3>Kobe Beef</h3>
			    <img id="beef" src="img/kobe-beef.jpg">
				<p>The famous "Kobe Beef" is  commodity which a lot of foreigners come to Kobe for. Cows are hearded in special conditions to prepare this beef. The cows are fed beer and are massaged daily to ensure maximum flavour and tenderness. The meat is a delicacy renowned for its flavor, tenderness, and fatty, well-marbled texture.Kobe beef is generally considered one of the three top brands (known as Sandai Wagyuu, "the three big beefs"), along with Matsusaka beef and Ōmi beef or Yonezawa beef. </p>
				<br>
			</div>
			<hr>
			<div class="container-fluid text-center">
	    		<h3>Kobe Sports Teams</h3>
	    		<p>Below is the Orix baseball team logo (left) and the Vissel Kobe football team logo (right)</p>
	    		<p>
	    			<img  src="img/orix.jpg" id="orix">
					<img src="img/Vissel-Kobe.png" id="vissel">
				</p>
	    	</div>
	    </div>
	   <!--  <div class="col-sm-2 sidenav">
	      <div class="well">
	        <p>ADS</p>
	      </div>
	      <div class="well">
	        <p>ADS</p>
	      </div> -->
	    </div>
	  </div>

	  <div class="container-fluid" id="comment">
	  	<div class="row content">
	  		<div class="col-sm-12 text-left">
	  			<h3>Comments:</h3>
				<?php
					if(isset($_SESSION['id'])){
						echo "
						<form method ='POST' action='".setComments($conn)."'>
							<input type='hidden' name='uid' value='".$_SESSION['id']."'>

							<input type='hidden' name='date' value='".date('Y-m-d H:i:s')."'>
						
							<textarea style='width:80%;border:round;' name='message'></textarea><br>
				
							<button type='submit' name='commentSubmit' >Comment</button>
						</form>";
					} else {
						echo "You need to be logged in to comment!
						<br>";
					}

				getComments($conn);
				?>
	  		</div>
	  	</div>
	  	
	  </div>

		<footer class="container-fluid text-center">
		  <p> If you are interested in visiting Kobe, Click <a href = "flights.php">here</a> and we will email you details on flights and stays!  <br>
		Made by Nishant Teckchandani</p>
		</footer>
</body>
</html>
