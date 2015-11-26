<?php
	
	session_start();
	
	include_once 'dbconnect.php';
	
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
		<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
		<link rel="stylesheet" href="style.css">
		<title>Charity Profiles</title>
	</head>
	<body>
		
		<?php include_once 'header.php'; ?>
		<div class="container">
			<div class="page-header"><h1>Charity Profiles</h1></div>
			<div class="row">
				<?php
					
					$query = "SELECT cid, name, total_received, img_path FROM charity";
					if ($result = mysqli_query($mysqli, $query)) {
						while ($row = mysqli_fetch_row($result)) {
							echo "
								<div class='col-xs-6 col-md-3'>
									<a href='company_profile.php?id=".$row[0]."' class='thumbnail'>
										<img src='img/".$row[3]."' alt='".$row[1]."'> 
										<div class='caption'>
											<h4>".$row[1]."</h4>
											<p>Total money received: $".$row[2]."</p>
										</div>
									</a>
								</div>
							";
						}
					}
				?>
			</div>
		</div>
	</body>
</html>
