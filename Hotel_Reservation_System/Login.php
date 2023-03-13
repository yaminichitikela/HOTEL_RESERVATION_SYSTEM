<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <style>
		body {
			background-color: #f2f2f2;
			font-family: Arial, sans-serif;
		}

		.container {
			margin: auto;
			width: 50%;
			padding: 50px;
			background-color: #fff;
			box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
			text-align: center;
		}

		h2 {
			color: #333;
			margin-bottom: 30px;
		}

		input[type=text], input[type=password] {
			width: 100%;
			padding: 12px 20px;
			margin: 8px 0;
			display: inline-block;
			border: 1px solid #ccc;
			border-radius: 4px;
			box-sizing: border-box;
		}

		button {
			background-color: #4CAF50;
			color: white;
			padding: 14px 20px;
			margin: 8px 0;
			border: none;
			border-radius: 4px;
			cursor: pointer;
		}

		button:hover {
			background-color: #45a049;
		}
		.error{
			color: red;
			display: none;
		}
	</style>
</head>
<body>
	<?php

	?>
    <div class="container">
		<h2>Login to Your Account</h2>
		<form action="login.php" method="post">
			<label for="username">Username</label>
			<input type="text" id="username" name="username" required>

			<label for="password">Password</label>
			<input type="password" id="password" name="password" required>

			<button type="submit" name="login_button">Login</button>
			<p class="error">Invalid UserName or Password.</p>
		</form>
	</div>


    <?php
		if(isset($_POST['login_button']))
		{
			$username = $_POST['username'];
			$password = $_POST['password'];
			
			if($username == "admin" && $password == "admin")
			{
				session_start();
				$_SESSION['authenticated'] = true;
				header("Location: admin_dashboard.php");
				exit;
			}
			else{
				?>
				<style>
					.error{
						display: block;
					}
				</style>
				<?php
			}
		}
    ?>
</body>
</html>