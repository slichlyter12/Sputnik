<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Activate Account | Donate Central</title>
		<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
		<link rel="stylesheet" href="style.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
		<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
	</head>
	<body>
		<?php 
			
			include_once 'dbconnect.php';
			if (isset($_GET["email"]) && !empty($_GET["email"]) && isset($_GET["hash"]) && !empty($_GET["hash"])) {
				$email = mysqli_real_escape_string($mysqli, strip_tags($_GET["email"]));
				$hash = mysqli_real_escape_string($mysqli, strip_tags($_GET["hash"]));
				
				$get_user = "SELECT email, hash, active FROM users WHERE (email='$email' AND hash='$hash' AND active=0)";
				$user_result = mysqli_query($mysqli, $get_user);
				$num_match = mysqli_num_rows($user_result);
				
				$update_query = "UPDATE users SET active=1, hash=NULL WHERE (email='$email' AND hash='$hash' AND active=0)";
				if ($num_match > 0 && mysqli_query($mysqli, $update_query)) {
					echo "<div class='alert alert-success' role='alert'>Successfully activated your account. <a href='index.php'>Login</a></div>";
				} else {
					echo "<div class='alert alert-danger' role='alert'>Failed to activate your account.</div>";
				}
				
				mysqli_close($mysqli);
			}
			
		?>
	</body>
</html>
