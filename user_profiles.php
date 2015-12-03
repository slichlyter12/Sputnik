<?php
	
	session_start();
	
	include_once 'dbconnect.php';
	
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
		
		<style>
			table, td, th {
				background-color: #b3b3b3;
				color: #ccccc;
			}
			th {
				background-color: #4d4d4d;
				color: #cccccc;
			}
		</style>
	</head>
	<body>
		<!--TODO: Add "user photo", username, email and zipcode -->	
	
		<?php include_once "header.php"; ?>
	
		<div class="container">
			<h2>Past Donations</h2>       
			<table class="table table-bordered">
				<thead>
					<tr>
						<th>Date</th>
						<th>Tracking # (Mid)</th>
						<th>Amount</th>
						<th>Charity</th>
						<th>Spent</th>
						<th>Status</th>
					</tr>
				</thead>
				<tbody>
			    <?php 
				    
				    if (isset($_SESSION["uid"])) {
					    
					    $uid = $_SESSION["uid"];
					    $query = "SELECT donated_on, mid, amount, cid, spent, status FROM money WHERE uid=$uid";
						
						if ($result = mysqli_query($mysqli, $query)) {
							while ($row = mysqli_fetch_row($result)) {
								
								// get charity name
								$charity_query = "SELECT name FROM charity WHERE cid=".$row[3];
								if ($charity_result = mysqli_query($mysqli, $charity_query)) {
									while ($charity_row = mysqli_fetch_row($charity_result)) {
										$charity_name = $charity_row[0];
									}
								}
								
								// create human readable spent status
								$spent = "No";
								switch ($row[4]) {
									case 0:
										$spent = "No";
										break;
									case 1:
										$spent = "Yes";
										break;
									default: 
										$spent = "No";
										break;
								}
								
								// get status
								if ($row[5] == NULL) {
									$status = "No status available";
								} else {
									$status = $row[5];
								}
								
								// get date
								date_default_timezone_set('America/Los_Angeles');
								$timestamp = strtotime($row[0]);
								$date = date("m/d/Y", $timestamp);
								
								// print results
								echo "
									<tr color='#FFFFFF'>
									<td>".$date."</td>
									<td>".$row[1]."</td>
									<td>$".$row[2]."</td>
									<td>".$charity_name."</td>
									<td>".$spent."</td>
									<td>".$status."</td>
									</tr>
								";
							}
						}
				    }		    
				?>
			    </tbody>
			</table>
		</div>
	</body>
</html>