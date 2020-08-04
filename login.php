<?php
require('header.php');
?>
<main>
<?php require('navigation.php'); ?>
    <h1> User Log In! </h1>
<form action="validate.php" method="post">
  <!-- Admin User Name -->
  <fieldset class="form-group">
		<label for="username" class="col-sm-2">Admin User Name:</label>
			<input name="username" type="text" class="form-control" id="username" required>
	</fieldset>
  <!-- Admin Password -->
	<fieldset class="form-group">
			<label for="password" class="col-sm-2">Admin Password:</label>
			<input name="password" required type="password" class="form-control" >
	</fieldset>
  <!-- Log In Button -->
  <input type="submit" value="Log In!" name="submit" class="btn btn-success">
</form>
<a href="register.php"> Not a Admin Member Yet? Sign Up Now </a>
</main>
<?php require("footer.php") ?>
