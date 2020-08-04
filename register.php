<?php require_once('header.php'); ?>
<body>

    <main>
    <?php require_once('navigation.php'); ?>
    <p>Please fill this form to create an account.</p>
    <form action="save-registration.php" method="post">
    <!-- User Name -->
    <div class="form-group">
        <label>Username</label>
        <input type="text" name="username" class="form-control" >
    </div>
    <!-- Password -->
    <div class="form-group">
        <label>Password</label>
        <input type="password" name="password" class="form-control">
    </div>
    <!-- Confirm Password -->
    <div class="form-group">
        <label>Confirm Password</label>
        <input type="password" name="confirm_password" class="form-control">
    </div>
    <div class="form-group">
        <input type="submit" class="btn btn-primary" value="Submit">
        <input type="reset" class="btn btn-default" value="Reset">
    </div>
        <p>Already have an Admin account? <a href="login.php">Login here</a>.</p>
        </form>
    </main>
<?php require_once('footer.php'); ?>
