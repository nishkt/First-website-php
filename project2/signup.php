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
	<title>Contact Form</title>
	<!-- If IE use the latest rendering engine -->
	<meta http-equiv="X-UA-Compatible" content="IE=edge">

	<!-- Set the page to the width of the device and set the zoon level -->
	<meta name="viewport" content="width = device-width, initial-scale = 1">

	<!-- Latest compiled and minified CSS -->
	<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous"> -->
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">

	<link rel="stylesheet" type="text/css" href="slider.css">

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
      height: 100%;
    }
    
    /* Set black background color, white text and some padding */
    footer {
      background-color: #555;
      color: white;
      padding: 15px;
    }
    
    /* On small screens, set height to 'auto' for sidenav and grid */
    @media screen and (max-width: 767px) {
      .sidenav {
        height: auto;
        padding: 15px;
      }
      .row.content {height:auto;} 
    }

    .jumbotron {
    	height: auto;
    }

    #beef{
    	width: 40%;
    	float:right;
    }

    #submit button {
	    width: 100%;
	    background-color: #555;
	    color: white;
	    padding: 14px 20px;
	    margin: 8px 0;
	    border: none;
	    border-radius: 4px;
	    cursor: pointer;
	}

	#submit button:hover {
		background: #555; /* For browsers that do not support gradients */
	    background: -webkit-linear-gradient(#555, black); /* For Safari 5.1 to 6.0 */
	    background: -o-linear-gradient(#555, black); /* For Opera 11.1 to 12.0 */
	    background: -moz-linear-gradient(#555, black); /* For Firefox 3.6 to 15 */
	    background: linear-gradient(#555, black); /* Standard syntax */
	}

  </style>

    <script src="js/jquery-1.11.3.min.js" type="text/javascript"></script>
    <script src="js/jssor.slider-22.2.16.mini.js" type="text/javascript"></script>
    <script type="text/javascript">
        jQuery(document).ready(function ($) {

            var jssor_1_options = {
              $AutoPlay: true,
              $SlideDuration: 800,
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
	          <li><a href="mainpage.php">Home</a></li>
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

<?php

$url = "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
//print out username already exists

/*echo "<div class='container' style='padding-top: 10px; padding-bottom: 10px;'>";*/
if(strpos($url, 'error=username') !== false){
	echo "<p style='text-align:center;padding-top:20px;'>
	<strong>Username already exists! Please choose a different username</strong>
	</p>";
}
/*echo "/div";*/


echo "
<div class='container' style='padding-top: 10px; padding-bottom: 10px;'>
<p><strong>Fill in your details to create an account!!!!</strong></p>
    <form method ='POST' action='".signUp($conn)."'>
	    <div class='form-group'>
		    <label for='fname'>First Name:</label>
		    <input type='text' name='fname' class='form-control' placeholder='First Name' required>
	    </div>
	    <div class='form-group'>
		    <label for='lname'>Last Name:</label>
		    <input type='text' name='lname' class='form-control' placeholder='Last Name' required>
	    </div>
	    <div class='form-group'>
		    <label for='uid'>Username:</label>
		    <input type='text' name='uid' placeholder='Username' class='form-control' required></textarea>
	    </div>
	    <div class='form-group'>
		    <label for='pwd'>Password:</label>
		    <input type='password' name='pwd' placeholder='Password' class='form-control' required></textarea>
	    </div>
	    <div class='form-group'>
		    <label for='email'>Email:</label>
		    <input type='email' name='email' placeholder='Email' class='form-control' required></textarea>
	    </div>
	    <div id='submit'>
	    <button type='submit' name = 'signupSubmit'>SIGN UP</button><br>
	    </div>
    </form>
</div>
	";
?>

	<footer class="container-fluid text-center">
	  <p> If you are interested in visiting Kobe, Click <a href = "flights.php">here</a> and we will email you details on flights and stays!  <br>
	Made by Nishant Teckchandani</p>
	</footer>
</body>
</html>


