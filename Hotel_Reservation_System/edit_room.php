<!DOCTYPE html>
<html>
<head>
	<title>Edit Room</title>
	<style>
		body {
			background-color: #f2f2f2;
			font-family: Arial, sans-serif;
		}

		.container {
			margin: 50px auto;
			width: 50%;
			padding: 50px;
			background-color: #fff;
			box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
		}

		h2 {
			color: #333;
			margin-bottom: 30px;
		}

		input[type=text], select {
			width: 100%;
			padding: 12px 20px;
			margin: 8px 0;
			display: inline-block;
			border: 1px solid #ccc;
			border-radius: 4px;
			box-sizing: border-box;
		}

		input[type=submit] {
			background-color: #4CAF50;
			color: white;
			padding: 14px 20px;
			margin: 8px 0;
			border: none;
			border-radius: 4px;
			cursor: pointer;
		}

		input[type=submit]:hover {
			background-color: #45a049;
		}

	</style>
</head>
<body>

	<?php
		// Get the room ID from the URL parameter
		$id = $_GET['id'];

		// Load the room data from the database
		include 'model.php';
		$database = new Database();
		$room = $database->get_room_by_id($id);
	?>

	<div class="container">
		<h2>Edit Room</h2>
		<form action="process_edit_room.php" method="post">
			<input type="hidden" name="id" value="<?php echo $room['id']; ?>">
			<label for="room_type">Room Type</label>
            <select id="room_type" name="room_type">
				<option value="Standard Room" <?php if($room['room_type'] == 'Standard Room') echo 'selected'; ?>>Standard Room</option>
				<option value="Deluxe Room" <?php if($room['room_type'] == 'Deluxe Room') echo 'selected'; ?>>Deluxe Room</option>
                <option value="Suite" <?php if($room['room_type'] == 'Suite') echo 'selected'; ?>>Suite</option>
			</select>

			<label for="children_space">Children Space</label>
			<input type="text" id="children_space" name="children_space" value="<?php echo $room['children_space']; ?>">

			<label for="adult_space">Adult Space</label>
			<input type="text" id="adult_space" name="adult_space" value="<?php echo $room['adult_space']; ?>">

			<label for="price_per_night">Price per Night</label>
			<input type="text" id="price_per_night" name="price_per_night" value="<?php echo $room['price_per_night']; ?>">

			<label for="availability_status">Availability</label>
			<select id="availability_status" name="availability_status">
				<option value="Free" <?php if($room['availability_status'] == 'Free') echo 'selected'; ?>>Free</option>
				<option value="Used" <?php if($room['availability_status'] == 'Used') echo 'selected'; ?>>Used</option>
			</select>

			<input type="submit" value="Save Changes" name="save">
		</form>
	</div>

    
</body>
</html>
