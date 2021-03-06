<?php 
	
	session_start();
	
	if (isset($_POST["username"])) {
		
		include_once 'dbconnect.php';

		// SANITIZE USERNAME AND PASSWORD		
		$username = strip_tags($_POST["username"]);
		$password = strip_tags($_POST["password"]);
		
		$username = mysqli_real_escape_string($mysqli, $username);
		$password = mysqli_real_escape_string($mysqli, $password);
		
		// QUERY DATABASE
		$sql = "SELECT uid, username, password, active FROM users WHERE username='$username' LIMIT 1";
		$query = mysqli_query($mysqli, $sql);
		$row = mysqli_fetch_row($query);
		$uid = $row[0];
		$dbusername = $row[1];
		$dbpassword = $row[2];
		$active = $row[3];
		
		//validate username/password
		if ($active == 1 && $username == $dbusername && password_verify($password."sputnik11", $dbpassword)) {
			//set session variables
			$_SESSION["username"] = $username;
			$_SESSION["uid"] = $uid;
			
			//redirect user to index
			header("Location: index.php");
		} else {
			echo "<div class='alert alert-danger'>Username/Password doesn't match. Please try again or <a href='signup.php'>sign up</a>.</div>";
		}
		
		$mysqli->close();
	}
	
?>
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
<body>

<?php include_once "header.php"; ?>

<div class="container">
	<div class="jumbotron">
		<div class="center-text">
			<h1>Donate Central</h1>
			<p>Keeping you connected to charities.</p>
			<p><a class="btn btn-primary btn-lg" href="donate.php" role="button">Donate Now</a></p>
		</div>
	</div>
</div>

<div id="myCarousel" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
    </ol>

    <div class="carousel-inner" role="listbox">
      <div class="item active">
        <img src="http://www.collegestartup.org/wp-content/uploads/2013/09/charity-water-photo.jpg" alt="Water" width="100%" height="auto">    
      </div>

      <div class="item">
        <img src="https://redcrossresults.files.wordpress.com/2012/06/dsc_89092.jpg" alt="Red Cross" width="100%" height="auto">   
      </div>

    <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
</div>

<script>
$(document).ready(function(){
    // Activate Carousel
    $("#myCarousel").carousel({interval: 7000}); //7 seconds
    
    // Enable Carousel Indicators
    $(".item1").click(function(){
        $("#myCarousel").carousel(0);
    });
    $(".item2").click(function(){
        $("#myCarousel").carousel(1);
    });
    // Enable Carousel Controls
    $(".left").click(function(){
        $("#myCarousel").carousel("prev");
    });
    $(".right").click(function(){
        $("#myCarousel").carousel("next");
    });
});
</script>




<!-- TO DO: create about info/page -->


</body>
</html>
