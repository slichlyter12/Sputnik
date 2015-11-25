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


<!--TODO: Add "user photo", username, email and zipcode -->

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
      <tr color="#FFFFFF">
        <td>9/11/2001</td>
        <td>12345</td>
        <td>$100</td>
		<td>Sam Lichlyter Trust Fund</td>
        <td>Yes</td>
        <td>Money given to Sam as he vacations in Hawaii</td>
      </tr>
      <tr>
        <td>4/20/2015</td>
        <td>54321</td>
        <td>$69</td>
		<td>Weed Inc.</td>
        <td>No</td>
        <td>Not blazed yet</td>
      </tr>
     
    </tbody>
  </table>
</div>


</body>
</html>