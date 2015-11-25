<?php

	session_start();
	
	if (isset($_POST["username"]) && !empty($_POST["username"]) && isset($_POST["password"]) && !empty($_POST["password"]) && isset($_POST["confirm_pass"]) && !empty($_POST["confirm_pass"]) && isset($_POST["email"]) && !empty($_POST["email"]) && isset($_POST["zip"]) && !empty($_POST["zip"])) {
		
		include_once 'dbconnect.php';
		
		// sanitize input		
		$username = strip_tags($_POST["username"]);
		$password = strip_tags($_POST["password"]);
		$confirm_pass = strip_tags($_POST["confirm_pass"]);
		$email = strip_tags($_POST["email"]);
		$zip = strip_tags($_POST["zip"]);
		
		$username = mysqli_real_escape_string($mysqli, $username);
		$password = mysqli_real_escape_string($mysqli, $password);
		$confirm_pass = mysqli_real_escape_string($mysqli, $confirm_pass);
		$email = mysqli_real_escape_string($mysqli, $email);
		$zip = mysqli_real_escape_string($mysqli, $zip);
		
		//check passwords
		if ($password != $confirm_pass) {
			die( "<h2>Passwords are not the same, please <a href='signup.php'>try again</a></h2>" );
		}
		
		//hash password
		$hashed_pass = password_hash($password."sputnik11", PASSWORD_DEFAULT);
		$hashed_confirm_pass = password_hash($confirm_pass."sputnik11", PASSWORD_DEFAULT);
		
		//check if username already exists
		$result = mysqli_query($mysqli, "SELECT username FROM users WHERE username='".$username."' LIMIT 1");
		$row = mysqli_fetch_row($result);
		$dbusername = $row[0];
		if ($username == $dbusername) {
			die( "<h2>A user with that username already exists, would you like to <a href='index.php'>login</a>?" );
		}
		
		//check if valid email address
		if (!preg_match("/^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/", $email)) {
			die("<h2>Not a valid email address</h2><br><a href='signup.php'>Try again?</a>");
		}
		
		//check if email already exists
		$result = mysqli_query($mysqli, "SELECT email FROM users WHERE email='$email' LIMIT 1");
		$row = mysqli_fetch_row($result);
		$dbemail = $row[0];
		if ($email == $dbemail) {
			die( "<h2>This email already has an account, would you like to <a href='index.php'>login</a>?</h2>" );
		}
		
		//create hash
		$hash = md5(rand(0, 1000));
		
		//if pass all checks, register new user
// 		$query = "INSERT INTO users (username, password, email, zip, hash) VALUES ('$username', '$hashed_pass', '$email', '$zip', '$hash')";
		$query = "INSERT INTO users (username, password, email, zip, active) VALUES ('$username', '$hashed_pass', '$email', '$zip', '1')";
		if (mysqli_query($mysqli, $query)) {
			
/*
			$passed = 1;
			
			//send verification email
			$to = $email;
			$subject = "Activate Account | Donate Central";
			$message = '
			
			Thanks for signing up!
			You can now track your purchases on Donate Central
			
			Please click this link to activate your account:
			http://web.engr.oregonstate.edu/~winkleer/Sputnik/verify.php?email='.$email.'&hash='.$hash.'
			
			'; //message to new user to activate their account
			$headers = 'From:winkleer@oregonstate.edu'."\r\n";
			if (!mail($to, $subject, $message, $headers)) {
				die( "<div class='alert alert-danger' role='alert'>Failed to send verification email, <a href='mailto:winkleer@oregonstate.edu'>please email us to activate your account</a>.</div>" );
				$passed = 0;
			}
			
			if ($passed) {
				echo "<div class='alert alert-success' role='alert'>Successfully registered! Check your email to verify your account!</div>";
			}
*/

			echo "<div class='alert alert-success' role='alert'>Successfully registered!</div>"; 
			
		} else {
			die( "<div class='alert alert-danger' role='alert'>An unexpected error occurred</div>" );
		}
		
		$mysqli->close();
		
	}

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Donate Central</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
  <link rel="stylesheet" href="style.css">  
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
  
</head>

<!-- Header end -->
<?php include_once "header.php"; ?>
<!-- Header end -->

<body>
	<div class="container" id="donate-container">
    	<h2 style="text-align: center; margin:40px">Create Account</h2>
    	<form role="form" method="post">
	        <!-- user real name START-->
	        <div class="form-group" style="margin-top:20px">
	          <label>Username:</label>
	          <input type="text" class="form-control input-lg" name="username" placeholder="Username">
	        </div>
	        <!-- user real name END-->
	        <div class="form-group" style="width:240px; margin-top:20px">
	          <label>Zip Code:</label>
	          <input type="text" class="form-control input-lg" name="zip" placeholder="Zip Code">
	        </div>
	
	        <div class="form-group" style="margin-top:20px"> 
	          <label>Email:</label>
	          <input type="email" class="form-control input-lg" name="email" placeholder="Email Address">
	        </div>
	
	        <div class="form-group" style="margin-top:20px"> 
	          <label>Password:</label>
	          <input type="password" class="form-control input-lg" name="password" placeholder="Password">
	        </div>
	        
	        <div class="form-group" style="margin-top: 20px">
		        <label>Verify Password:</label>
		        <input type="password" class="form-control input-lg" name="confirm_pass" placeholder="Verify Password">
	        </div>
	
	        <button type="submit" class="btn btn-success input-lg" style="width:100%; margin-top:30px"><span style="font-size: 22px;">Create my Account!</span></button>

    	</form>
	</div>

</body>

</html>
