<nav class="navbar navbar-default">
  <div class="container-fluid">
	<div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#menu" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
	  <a class="navbar-brand" href="index.php">Donate Central</a>
    </div>
  
    <div class="collapse navbar-collapse" id="menu">
      <ul class="nav navbar-nav">
        <li><a href="view_companies.php">View Companies</a></li>
        <li><a href="#">Track Donations</a></li>
		<li><a href="donate.php">Donate Now</a></li>
      </ul>
      <?php
	      
	      if (isset($_SESSION["username"])) {
		      echo "<p class='navbar-text navbar-right' id='logged-in'>Signed in as <a href='user_profiles.php' class='navbar-link'>".$_SESSION["username"]."</a> | <a href='logout.php' class='navbar-link'>Logout</a></p>";
	      } else {
		      echo "
				<form class='navbar-form navbar-right' role='form' method='post'>
					<div class='form-group'>
						<input type='username' class='form-control' name='username' placeholder='Username'>
					</div>
					<div class='form-group'>
						<input type='password' class='form-control' name='password' placeholder='Password'>
					</div>
					<button type='submit' class='btn btn-default'>Login</button><!--White button-->
					<a href='signup.php' class='btn btn-primary' role='button'>Sign Up</a>
				</form>
				";
	      }
	      
	    ?>
	  
	</div>
  </div>
</nav>