
<!DOCTYPE html>

<html>
<head>
	<title>Admin Dashboard</title>
	<style>
		body {
			background-color: #f2f2f2;
			font-family: Arial, sans-serif;
		}

		header {
			background-color: #333;
			color: #fff;
			padding: 10px 20px;
			text-align: right;
		}
        header .logout{
            float: right;
			color: #fff;
            border: none;
			background-color: #f44336;
			padding: 10px 15px;
			border-radius: 4px;
			cursor: pointer;
        }
        header .logout:hover{
            background-color: #d5392e;
        }
        header h1{
            text-align: center;
        }

		.container {
			margin: 50px auto;
			width: 80%;
			padding: 50px;
			background-color: #fff;
			box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
		}

		h2 {
			color: #333;
			margin-bottom: 30px;
		}

		table {
			border-collapse: collapse;
			width: 100%;
		}

		th, td {
			text-align: left;
			padding: 8px;
		}

		tr:nth-child(even){background-color: #f2f2f2}

		th {
			background-color: #4CAF50;
			color: white;
		}

		.button {
			background-color: #4CAF50;
			color: white;
			padding: 14px 20px;
			margin: 8px 0;
			border: none;
			border-radius: 4px;
			cursor: pointer;
		}
		.button:hover {
			background-color: #45a049;
		}
        #delete{
            background-color: rgb(237, 90, 90);
        }
		#delete:hover{
			background-color: rgb(237, 80, 80);
		}
		

	</style>
</head>
<body>

	<?php
	    ob_start();
		session_start();
		if (!isset($_SESSION['authenticated'])) {
			// User has not passed through the login page, redirect to login page
			header('Location: Login.php');
			
			exit();
		}

	?>

	<form action="admin_dashboard.php" method="post">

		<header>
			<h1>Admin Dashboard</h1>
			<input type="submit" value="Logout" name="logout" class="logout">
		</header>
		<div class="container">
			<h2>Manage Hotel Rooms</h2>
			<table>
				<tr>
					<th>Room Type</th>
					<th>Children Space</th>
					<th>Adult Space</th>
					<th>Price per Night</th>
					<th>Availability</th>
					<th>Edit Room</th>
					<th>Delete Room</th>
				</tr>
				<tr>
				<!-- PHP -->

				<?php
				include 'model.php';

				$database = new Database();

				// Get image data from database 
				$results = $database->display_rooms();
				?>

				<?php foreach($results as $row){ ?> 
					<tr>
						<td><?php echo $row['room_type']; ?></td>
						<td><?php echo $row['children_space']; ?></td>
						<td><?php echo $row['adult_space']; ?></td>
						<td><?php echo $row['price_per_night']."$"; ?></td>
						<td><?php echo $row['availability_status']; ?></td>
						<input type="hidden" name="room_id" value="<?php echo $row['id']; ?>">
						<td><input type="submit" class="button" id="edit" name="edit" value="Edit"></td>
						<td><input type="submit" class="button" id="delete" name="delete" value="Delete"></td>
					</tr> 
				<?php 
				} 
				
				?>
				<!-- PHP -->

					
				
				<tr>
					<td colspan="7"><input type="submit" class="button" name="add_room" value="Add New Room"></td>
				</tr>

			</table>
		</div>
	</form>	


	<?php
		if(isset($_POST['logout']))
		{
			$_SESSION['authenticated'] = false;
			session_destroy();
			header("Location: Login.php");
		}

		if(isset($_POST['add_room']))
		{
			header("Location: add_room.php");
		}
		
		if(isset($_POST['delete']))
		{
			$id = $_POST['room_id'];
			header("Location: delete_room.php?id=$id");
		}
		
		if(isset($_POST['edit']))
		{
			$id = $_POST['room_id'];
			header("Location: edit_room.php?id=$id");
		}
		ob_end_flush();
	?>
</body>
</html>
