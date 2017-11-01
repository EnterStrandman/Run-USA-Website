<!DOCTYPE html>
<html>
<head>
	<title>Run USA-Log In</title>
	<link rel = "stylesheet" href="BootStrapLearning.css">
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

	<!--DEFAULT NAV BAR FROM BOOTSTRAP-->
	
		<header class = "navbar">
			<div class = "container">
				<nav class="navbar navbar-inverse">
					  <div class="container-fluid">   
					    <div class="navbar-header">	    	
					          <a class="navbar-brand" href="index.html"></a>		
					    </div>

					    <!-- Collect the nav links, forms, and other content for toggling -->
					    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
					      <ul class="nav navbar-nav navbar-right">
					      	<li><a href="aboutUs.html">About Us</a></li>
					        <li><a href="conversionCalc.html">Pace Calculator</a></li>

					        <li class="dropdown">
						        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Profile<span class="caret"></span></a>
						          <ul class="dropdown-menu">
						          	<li><a href="logIn.php">Log In</a></li>
						          	<li role="separator" class="divider"></li>
						          	<li><a href="register.php">Register</a></li>
						          	<li role="separator" class="divider"></li>
						          	<li><a href="profile.php">Profile</a></li>
						          </ul>
						    </li>

					        <li class="dropdown">
						        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Weekly Awards<span class="caret"></span></a>
						          <ul class="dropdown-menu">
						          	<li><a href="index.html">Home</a></li>
						          	<li role="separator" class="divider"></li>
						          	<li><a href="athleteAward.html">Athlete of the Week</a></li>
						            <li><a href="coachAward.html">Coach of the Week</a></li>						            
						            <li role="separator" class="divider"></li>
						            <li><a href="pastAthletes.html">Past Athletes</a></li>
						            <li><a href="pastCoaches.html">Past Coaches</a></li>
						          </ul>
						    </li>
					      </ul>
					    </div><!-- /.navbar-collapse -->
					  </div><!-- /.container-fluid -->
				</nav>
			</div>
		</header>
<body>
<!-- MAIN CONTENT-->

<!--CONNECT TO DATABASE FOR REGISTRATION-->
<?php include_once('dbConnect.php');?>

<?php session_start();

//check username and password has been submitted
if(!empty($_POST['username']) && !empty($_POST['password'])){
	//prepare our query
	$query = "SELECT * FROM users WHERE username = :USERNAME";
	$account = $conn->prepare($query);
	$account->bindValue(':USERNAME', $_POST['username']);
	$account->execute();

	//store results
	$result = $account->fetch(PDO::FETCH_ASSOC);

	if(count($result) > 0 && password_verify($_POST['password'], $result['PASSWORD'])){
		echo "success you logged in";
	} else{
		echo "log in failed";
	}

} else{
	echo("<script type='text/javascript'>alert('Please enter both username and password to log in.');</script>");
}

?>



<div class = "container">
	<div class = "col-md-12">
		<div class = "middle">
			<form action="" method="POST">
				<h1>Log In</h1>
					<input id = "username" style="padding-top: 5px; padding-left: 8px; margin-left: 10px; height: 33px;" name="username" type = "text" placeholder="Username"><br><br>
					<input id = "password" style="padding-top: 5px; padding-left: 8px; margin-left: 10px; height: 33px;" name="password" type = "password" placeholder="Password"><br>
					<label style = "display: block; padding-left: 15px; text-indent: -15px;">Remember me <input type = "checkbox" style = "width: 15px; height: 15px; padding-left: 10px; margin:0; vertical-align: bottom; position: relative; top: -1px; *overflow: hidden;"></label>
					
					<hr style = "width: 80%;">
					<a href="register.php" style = "color: #00ffff;">Not a member? Register now!</a><br>
					<input type="submit" value="Log In">
			</form>
		</div>
	</div>
</div>
</body>


<!-- FOOTER-->
<footer>
	<div class = "container">
		<nav class="navbar navbar-inverse navbar-fixed-bottom">
			<div class="container-fluid">   
			<!-- Collect the nav links, forms, and other content for toggling -->
				
					<ul class="nav navbar-nav navbar-left">
						<div class = "col-sm-12 col-xs-9" style ="color: rgba(0, 153, 255,.6)";">
						    <li>E-Mail Us At: runUSA@runUSA.com</li>
							<li>Or Call: 1-800-555-5555</li>
							<li>&copy RunUSA 2017. All Rights Reserved.</a></li>
						</div>
					</ul>
				
			
		
			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				<ul class="nav navbar-nav navbar-right">
					<div class = "col-sm-12 col-xs-9">
						<div class = "social icons">
							<a href="http://www.facebook.com" class="fa fa-facebook" ></a>
							<a href="http://www.twitter.com" class="fa fa-twitter"></a>
							<a href="http://www.instagram.com" class="fa fa-instagram" ></a>
						</div>
				</ul>
			</div>
		</div>
		</div>
	</nav>
		
	
</footer>



<!-- Latest compiled and minified JavaScript FOR BOOTSTRAP -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

</html>