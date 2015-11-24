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

<div class="container">
  <h1 style="text-align: center; margin-top: 50px">Donate Now</h1>
  <form role="form">
    <div class="form-group" style="margin-top:30px;">
      <label for="text">Donate To:</label>
        <select id="company" class="form-control input-lg">
          <option>Compnay Name</option>        <!-- add payment method -->
        </select> 
    </div>  

    <div class="form-group" style="margin-top:30px"> 
      <label for="text">Donate Type:</label>
      <div class="form-group row">
        <div class="col-sm-7">
        <select id="type" class="form-control input-lg">
          <option>Money</option>        <!-- add payment method -->
          <option>Equipment</option>         <!-- amount? -->
          </select> 
        </div>

        <div class="col-md-5">
          <input type="number" class="form-control input-lg" id="amount" placeholder="Amount">
        </div>
      </div> 
    </div>

    <div class="form-group" style="margin-top:30px">
     <label for="Comment">Comment:</label>
     <textarea class="form-control" rows="3" id="comment"></textarea>
    </div>  

<!--  check login user or anonymous 
    <div class="form-group" style="margin-top:50px">
        <label><input type="checkbox" value="">Remain Anonymous</label>
    </div>
-->
    <button type="submit" class="btn btn-warning input-lg" style="width:100%; margin-top:60px"><span style="font-size: 22px;">Donate!</span></button>
  </form>
</div>


<script type="text/javascript">

</script>




</body>

</html>
