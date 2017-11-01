<!DOCTYPE html>
<html>
<head>
	<title>Run USA-Register</title>
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

<?php
session_start();
//check if email & password have been submitted
if(!empty($_POST['nameFirst']) && !empty($_POST['nameLast']) && !empty($_POST['userName']) && !empty($_POST['Email']) && !empty($_POST['Password']) && !empty($_POST['passwordConfirm']) ){
//prepare query string
	$query = "INSERT INTO users (USERNAME, PASSWORD, CONFIRM_PASSWORD, FIRST_NAME, LAST_NAME, EMAIL) VALUES(:USERNAME, :PASSWORD, :CONFIRM_PASSWORD, :FIRST_NAME, :LAST_NAME, :EMAIL)";
	$stmt = $conn->prepare($query);

//tell query where to find values
	$stmt->bindValue(':USERNAME', $_POST['userName']);
	$stmt->bindValue(':PASSWORD', password_hash($_POST['Password'], PASSWORD_BCRYPT));
	$stmt->bindValue(':CONFIRM_PASSWORD', password_hash($_POST['passwordConfirm'], PASSWORD_BCRYPT));
	$stmt->bindValue(':FIRST_NAME', $_POST['nameFirst']);
	$stmt->bindValue(':LAST_NAME', $_POST['nameLast']);
	$stmt->bindValue(':EMAIL', $_POST['Email']);
	$stmt->bindValue(':FIRST_NAME', $_POST['nameFirst']);

	if($stmt->execute()){
		echo ("<script type='text/javascript'>alert('Success! You have registered for RUN USA!');</script>");
		
	} else{
		echo ("<script type='text/javascript'>alert('Something went wrong');</script>");
	}

} else if(empty($_POST['nameFirst']) && empty($_POST['nameLast']) && empty($_POST['userName']) && empty($_POST['Email']) && empty($_POST['Password']) && empty($_POST['passwordConfirm'])){
	echo ("<script type='text/javascript'>alert('Please fill all fields and be sure the passwords match');</script>");
}



?>

<div class = "col-md-12">
	<div class = "middle">
		<form action="" method="POST">
			<h1>Register</h1>
				<label>
					<input style="padding-top: 5px; padding-left: 8px; margin-left: 10px; margin-bottom: 10px;" id = "firstName" type = "text" name="nameFirst" placeholder="First Name"/>
					<input style="padding-top: 5px; padding-left: 8px; margin-left: 10px; margin-bottom: 10px;" id = "lastName" type = "text" name="nameLast" placeholder="Last Name"/>
					<input style="padding-top: 5px; padding-left: 8px; margin-left: 10px; margin-bottom: 10px;" id = "username" type = "text" name="userName" placeholder="Username"/>
					<input style="padding-top: 5px; padding-left: 8px; margin-left: 10px; margin-bottom: 10px;" id = "email" type = "text" name="Email" placeholder="E-Mail"/>
					<input style="padding-top: 5px; padding-left: 8px; margin-left: 10px; margin-bottom: 10px;" id = "password" type = "password" name="Password" placeholder="Password"/>
					<input style="padding-top: 5px; padding-left: 8px; margin-left: 10px; margin-bottom: 10px;" id = "confirmPassword" type = "password" name="passwordConfirm" placeholder="Confirm Password">
					<input type="submit">
				</label>

		</form>	
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