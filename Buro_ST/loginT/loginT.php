<?php include('serverT.php') ?>
<!DOCTYPE html>
<html>
<head>
	<title>Registration system PHP and MySQL</title>
	<link rel="stylesheet" type="text/css" href="loginStyleT.css">

    <style>
        body{
            background-image: url("../media/heroL.jpg");
            background-size: 100%;

        }

    </style>

</head>
<body>



	
	<form method="post" action="loginT.php">

		<?php include('errorsT.php'); ?>

        <h2 id="wel">Welcome back</h2>

		<div class="input-group">
			<label>Username</label>
			<input type="text" name="username" >
		</div>
		<div class="input-group">
			<label>Password</label>
			<input type="password" name="password">
		</div>
		<div class="input-group">
			<button type="submit" class="btn" name="login_user">Login</button>
		</div>
		<p id="notam">
            Don’t have an account? <a href="registerT.php" id="buttonSS">Sign up</a>
		</p>
	</form>


</body>
</html>