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
			<div class="page-header">
				<h1>Charity Profiles</h1>
				<small>Sort By&hellip;</small>
				<div class="btn-group">
					<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" ari-haspopup="true" aria-expanded="false">Charity Type <span class="caret"></span></button>
					<ul class="dropdown-menu" id="type">
						<li><a href="?type=Medical">Medical</a></li>
						<li><a href="?type=Food/Water">Food / Water</a></li>
						<li><a href="?type=Service">Service</a></li>
						<li role="separator" class="divider"></li>
						<li><a href="view_companies.php">All</a></li>
					</ul>
				</div>
				<div class="btn-group">
					<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" ari-haspopup="true" aria-expanded="false">Desired Donation Type <span class="caret"></span></button>
					<ul class="dropdown-menu" id="donation_type">
						<li><a href="?donation_type=Money">Money</a></li>
						<li><a href="?donation_type=Canned Food">Canned Food</a></li>
						<li role="separator" class="divider"></li>
						<li><a href="view_companies.php">All</a></li>
					</ul>
				</div>
			</div>
			<div class="row">
				<?php
					
					if (isset($_GET["type"]) && !empty($_GET["type"])) {
						$type = mysqli_real_escape_string($mysqli, strip_tags($_GET["type"]));
						$query = "SELECT cid, name, total_received, img FROM charity WHERE type='$type'";
					} else if (isset($_GET["donation_type"]) && !empty($_GET["donation_type"])) {
						$donation_type = mysqli_real_escape_string($mysqli, strip_tags($_GET["donation_type"]));
						$query = "SELECT cid, name, total_received, img FROM charity WHERE desired_aid='$donation_type'";
					} else {
						$query = "SELECT cid, name, total_received, img FROM charity";
					}
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