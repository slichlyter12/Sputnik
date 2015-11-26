<?php
	
	session_start();
	
	include_once 'dbconnect.php';
	
	if (!isset($_GET["id"])) {
		echo "<div class='alert alert-danger' role='alert'>This is not the charity you're looking for</div>";
	} else {
		$cid = mysqli_real_escape_string($mysqli, strip_tags($_GET["id"]));
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
		
			$query = "SELECT name, total_received, total_spent, description, img_path FROM charity WHERE cid=$cid";
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
		</div>
	</body>
</html>