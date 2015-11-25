<!DOCTYPE html>
<html lang="en">
<head>
  <title>CS 361 Group Assignment</title>
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
	<div id="donate-container">
    	<h2 style="text-align: center; margin:40px">Create Account</h2>
    	<form role="form">
        <!-- user real name START-->
        <div class="form-group" style="margin-top:20px">
          <label>Username:</label>
          <input type="text" class="form-control input-lg" id="username" placeholder="Username">
        </div>
        <!-- user real name END-->
        <div class="form-group" style="width:240px; margin-top:20px">
          <label>Zip Code:</label>
          <input type="number" class="form-control input-lg" id="zipcode" placeholder="Zip Code">
        </div>

        <div class="form-group" style="margin-top:20px"> 
          <label>Email:</label>
          <input type="email" class="form-control input-lg" id="signup_email" placeholder="Email Address">
        </div>

        <div class="form-group" style="margin-top:20px"> 
          <label>Password:</label>
          <input type="password" class="form-control input-lg" id="signup_pass" placeholder="Password">
        </div>

        <button type="submit" class="btn btn-success input-lg" style="width:100%; margin-top:30px"><span style="font-size: 22px;">Create my Account!</span></button>

    	</form>
	</div>

</body>

</html>
