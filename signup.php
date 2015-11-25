<!DOCTYPE html>
<html lang="en">
<head>
  <title>CS 361 Group Assignment</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
  <style type="text/css">
    body{
      background-color: #E8E8E8;
    }

    .container{
      /*background-image: linear-gradient(#F8F8F8,transparent);*/
      background-color: #F8F8F8;
      width: 600px;
      height: 600px;
    }
</style>
</head>

<!-- Header end -->
<?php include_once "header.php"; ?>
<!-- Header end -->

<body>
	<div class="container">
    <h2 style="text-align: center; margin:30px">Create Account</h2>
    	<form role="form">
        <!-- user real name START-->
        <div class="form-group" style="margin-top:20px"> 
          <div class="form-group row">
            <div class="col-md-6">
              <label>First Name:</label>
              <input type="text" class="form-control input-lg" id="signup_first" placeholder="First Name">
            </div>
            <div class="col-md-6">
              <label>Last Name:</label>
              <input type="text" class="form-control input-lg" id="signup_last" placeholder="Last Name">
            </div>
          </div> 
        </div>
        <!-- user real name END-->
        <div class="form-group" style="width:270px; margin-top:20px">
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
