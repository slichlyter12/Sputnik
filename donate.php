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
<?php include_once('dbconnect.php'); ?>

<div class="container" id="donate-container">
  <h2 style="text-align: center; margin:40px">Donate Now</h2>

  <form method="POST" id="donate" action="donate_db.php">   <!-- Post here !!!-->
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
          <option>Equipment</option>         <!-- Not Yet Implemented ! -->
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

<!--  check login user or anonymous 
    <div class="form-group" style="margin-top:50px">
        <label><input type="checkbox" value="">Remain Anonymous</label>
    </div>
-->
    <button type="submit" class="btn btn-warning input-lg" style="width:100%; margin-top:40px"><span style="font-size: 22px;">Donate!</span></button>
  </form>
</div>


<script type="text/javascript">

</script>




</body>

</html>
