<!DOCTYPE html>
<html lang="en">
<head>
  <title>CS 361 Group Assignment</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
  <link rel="stylesheet" href="companyProfile.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</head>
<body>

<style>
	.navbar {
      margin-bottom: 0;
	}

		
</style>



<?php include_once "header.php"; ?>
<?php include_once "dbConnect.php"; ?>
<?php


			if ($mysqli->connect_errno) {
				printf("Connect failed: %s\n", $mysqli->connect_error);
				exit();
			} 
			else {
				printf("Database Connected.\n");
			}
?>

<div id="background">
    <img src="companyProfilePictures/AmericanCancerSociety.png" class="stretch" alt="" />
</div>

<div class="well" id="textbox">
	<h1>American Cancer Society</h1>
	<p>about bio thing.</p>
</div>

</body>

<?php
