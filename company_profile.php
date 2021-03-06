<?php
	
	session_start();
	
	include_once 'dbconnect.php';
	$money = 0;
	if (!isset($_GET["id"])) {
		echo "<div class='alert alert-danger' role='alert'>This is not the charity you're looking for.</div>";
	} else {
		$cid = mysqli_real_escape_string($mysqli, strip_tags($_GET["id"]));
	}
	if(isset($_GET["zip"])){
		$zip = mysqli_real_escape_string($mysqli, strip_tags($_GET["zip"]));
		$result = mysqli_query($mysqli, "SELECT money.amount FROM charity JOIN users JOIN money WHERE charity.cid=".$cid." AND users.zip=".$zip." AND users.uid = money.uid AND charity.cid=money.cid");
		while ($row = mysqli_fetch_row($result)) {
		//echo "in loop";
		$money += $row[0];
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
		
		
		
		
		
		
		
		<!-- GET DATA FROM DATABASE -->
		<?php
		
			$query = "SELECT name, total_received, total_spent, description, img FROM charity WHERE cid=$cid";
			if ($result = mysqli_query($mysqli, $query)) {
				while ($row = mysqli_fetch_row($result)) {
					$name = $row[0];
					$received = $row[1];
					$spent = $row[2];
					$reserve = $received - $spent;
					$description = $row[3];
					$img_path = $row[4];
				}
			}
			
		?>
		
		<div id="background">
			<img src="img/<?php echo $img_path; ?>" class="stretch" alt="<?php echo $name; ?>">
		</div>
		
		<div class="well" id="textbox">
			<h1><?php echo $name; ?></h1>
			<p><?php echo $description; ?></p>
			
			<form role="form">
				<div class="form-group">
					<div class="col-xs-6">
						<label for="zip"><strong>Enter ZIP code to see amount donated to <?php echo $name; ?> from that area:</strong></label>
						<br><br>
						<input type="text" class="form-control" id="zip" name="zip">
						<input name="id" type="hidden" value="<?php echo $_GET["id"]; ?>">
						<!--Output dollar amount here, Sorry Eric-->
						<button type="submit">Submit</button>
						<div id="div1"><h2>$
							<?php 
								if ($money == 0 && $received != 0) {
									echo $received; 
								} else {
									echo $money; 
								} 
							?>
						</h2></div>
					</div>
				</div>
		</div>
	</body>
</html>