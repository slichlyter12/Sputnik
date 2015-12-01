<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Track Donation</title>
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
			<h2 style="text-align: center; margin:40px">Track Donation</h2>
		
			<form method="post" id="track_donate">   <!-- Post here !!!-->
				
				<div class="form-group row" style="margin-top:30px"> 
					<div class="col-sm-7">					
					<label>Track By:</label>
					<select name="type" class="form-control input-lg">
						<option selected="selected" disabled="disabled">Select...</option>
						<option>Tracking Number</option>        <!-- add payment method -->
						<option>Username/ID</option>	<!-- Not Yet Implemented ! -->
					</select> 	
					</div>		
				</div>

				<div class="form-group" style="margin-top:20px">
	          		<input type="text" class="form-control input-lg" name="track" placeholder="Tracking Number/Username/ID">
	        	</div>

				<button type="submit" class="btn btn-info input-lg" style="width:100%; margin-top:20px"><span style="font-size: 22px;">Search!</span></button>
			</form>
		</div>
	</body>
</html>
