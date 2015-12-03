<?php
	
	session_start();
	
	include_once 'dbconnect.php';
	
?>

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
						<option value="mid">Tracking Number</option>        <!-- add payment method -->
						<option value="username">Username</option>	<!-- Not Yet Implemented ! -->
					</select> 	
					</div>		
				</div>

				<div class="form-group" style="margin-top:20px">
	          		<input type="text" class="form-control input-lg" name="track" placeholder="Tracking Number / Username">
	        	</div>

				<button type="submit" class="btn btn-info input-lg" style="width:100%; margin-top:20px"><span style="font-size: 22px;">Search!</span></button>
			</form>
			<?php
				
				
				if (isset($_POST["type"]) && $_POST["type"] != "Select..." && isset($_POST["track"]) && !empty($_POST["track"])) {
					
					echo "
							<table class='table table-bordered'>
								<thead>
									<tr>
										<th>Tracking ID</th>
										<th>Amount</th>
										<th>Charity</th>
										<th>Donated On</th>
										<th>Spent</th>
										<th>Status</th>
									</tr>
								</thead>
								<tbody>
						 ";
					
					$type = mysqli_real_escape_string($mysqli, strip_tags($_POST["type"]));
					$track = mysqli_real_escape_string($mysqli, strip_tags($_POST["track"]));
					if ($type == "mid") {
						$query = "SELECT m.mid, m.amount, m.donated_on, m.spent, m.status, c.name FROM money AS m, charity AS c WHERE (m.mid=$track AND m.cid=c.cid) LIMIT 1";
						if ($result = mysqli_query($mysqli, $query)) {
							while ($row = mysqli_fetch_row($result)) {
								
								$mid = $row[0];
								$amount = $row[1];
								$donated_on = $row[2];
								$spent = $row[3];
								$status = $row[4];
								$cname = $row[5];
								
								echo "
									<tr color='#FFFFFF'>
									<td>$mid</td>
									<td>$$amount</td>
									<td>$cname</td>
									<td>$donated_on</td>
									<td>$spent</td>
									<td>$status</td>
									</tr>
								";
							}
						}
					} else if ($type == "username") {
						$query = "SELECT m.mid, m.amount, m.donated_on, m.spent, m.status, c.name FROM money AS m, users AS u, charity AS c WHERE (u.username='$track' AND u.uid=m.uid AND m.cid=c.cid)";
						if ($result = mysqli_query($mysqli, $query)) {
							while ($row = mysqli_fetch_row($result)) {
								
								$mid = $row[0];
								$amount = $row[1];
								$donated_on = $row[2];
								$spent = $row[3];
								$status = $row[4];
								$cname = $row[5];
								
								echo "
									<tr color='#FFFFFF'>
									<td>$mid</td>
									<td>$$amount</td>
									<td>$cname</td>
									<td>$donated_on</td>
									<td>$spent</td>
									<td>$status</td>
									</tr>
								";
							}
						}
					}
					
					echo "
							</tbody>
							</table>
						 ";
				}
				
			?>
		</div>
	</body>
</html>
