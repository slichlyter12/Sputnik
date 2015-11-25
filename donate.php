<?php 
	
	session_start();	
	
	include_once 'dbconnect.php';
	
	if (isset($_POST["amount"]) && !empty($_POST["amount"])) {
		
		//################## Get User ID ##################
	    if(!isset($_SESSION['username'])) {      //check user id session exist?
	    	$_SESSION['username'] = 'Guest';       //change to NULL(guest)
	    	$_SESSION['uid'] = 1;
    	}
	
		//################## Get Compnay ID ##################
	    $c_name = mysqli_real_escape_string($mysqli, strip_tags($_POST["company"]));       //get company name from post
	    
	    $sql_cid = "SELECT cid FROM charity WHERE name='$c_name'";   //seek mateched cid to compnay name
	    $result = mysqli_query($mysqli, $sql_cid);
	    if (mysqli_num_rows($result) > 0) {
	        while($row = mysqli_fetch_assoc($result)) {
	            $tmp_cid = $row["cid"];
	        }
	    }
	    
		//################## Insert ID ##################
		// prepare statement
	    $uid = $_SESSION['uid'];
	    $cid = $tmp_cid;    
	    $amount = mysqli_real_escape_string($mysqli, strip_tags($_POST["amount"]));
	    $sql_insert = "INSERT INTO money (uid, cid, amount) VALUES ('$uid', '$cid', '$amount')";
	    if (mysqli_query($mysqli, $sql_insert)) {
		    
		    echo "<div class='alert alert-success' role='alert'>Thank you for your contribution!";
		    if ($_SESSION["username"] != "Guest")
		    	echo " You can view your past contributions <a href='user_profiles.php'>here</a>";
		    echo "</div>";
		    
	    } else {
		    echo "<div class='alert alert-danger' role='alert'>Donation Failed! Please try again.</div>";
	    }
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
		
		<div class="container" id="donate-container">
			<h2 style="text-align: center; margin:40px">Donate Now</h2>
		
			<form method="post" id="donate">   <!-- Post here !!!-->
				<div class="form-group" style="margin-top:30px;">
					<label>Donate To:</label>
					<select name="company" class="form-control input-lg">
					<!-- <option>Compnay Name</option>         add payment method -->
					<?php
						$sql = "SELECT name FROM charity";   //seek compnay name
						if ($result = mysqli_query($mysqli, $sql)) {
							while ($row = mysqli_fetch_row($result)) {
								echo "<option>".$row[0]."</option>";
							}
						}
					?>
					</select> 
				</div>  
			
				<div class="form-group" style="margin-top:30px"> 
					<label>Donate Type:</label>
					<div class="form-group row">
						<div class="col-sm-7">
							<select name="type" class="form-control input-lg">
								<option>Money</option>        <!-- add payment method -->
								<option disabled="disabled">Equipment (Coming Soon!)</option>	<!-- Not Yet Implemented ! -->
							</select> 
						</div>
				
						<div class="col-md-5">
							<input type="number" class="form-control input-lg" name="amount" placeholder="Amount">
						</div>
					</div> 
				</div>
				
				<div class="form-group" style="margin-top:30px">
					<label>Comment:</label>
					<textarea class="form-control" rows="3" name="comment"></textarea>
				</div>  
				
				<button type="submit" class="btn btn-warning input-lg" style="width:100%; margin-top:40px"><span style="font-size: 22px;">Donate!</span></button>
			</form>
		</div>
	</body>
</html>
