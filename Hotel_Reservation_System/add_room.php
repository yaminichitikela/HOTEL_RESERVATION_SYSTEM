<?php
session_start();
if (!isset($_SESSION['authenticated'])) {
    // User has not passed through the login page, redirect to login page
    header('Location: Login.php');
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Add New Room</title>
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

        header h1 {
            text-align: center;
        }
        header .cancel{
            float: right;
			color: #fff;
            border: none;
			background-color: #f44336;
			padding: 10px 15px;
			border-radius: 4px;
			cursor: pointer;
        }
        header .cancel:hover{
            background-color: #d5392e;
        }
        .container {
            margin: 50px auto;
            width: 80%;
            padding: 50px;
            background-color: #fff;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }

        form {
            margin-top: 30px;
        }

        label {
            display: block;
            margin-bottom: 10px;
        }

        input[type="text"], input[type="number"], input[type="file"] ,#room-type{
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            width: 100%;
            margin-bottom: 20px;
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
        select {
			font-size: 16px;
			cursor: pointer;
		}
    </style>
</head>
<body>

<header>
    <h1>Add New Room</h1>
    <form action="add_room.php" method="post">
        <input type="submit" value="Cancel" name="cancel" class="cancel">
    </form>
</header>

<div class="container">

    <form method="post" action="process_add_room.php" enctype="multipart/form-data">
        <label for="room-type">Room Type:</label>
        <select id="room-type" name="room-type">
            <option value="Standard Room">Standard Room</option>
            <option value="Deluxe Room">Deluxe Room</option>
            <option value="Suite">Suite</option>
        </select>

        <label for="children-space">Children Space:</label>
        <input type="number" id="children-space" name="children-space" required>

        <label for="adult-space">Adult Space:</label>
        <input type="number" id="adult-space" name="adult-space" required>

        <label for="price-per-night">Price per Night:</label>
        <input type="number" id="price-per-night" name="price-per-night" required>

        <label for="image">Select an image to upload:</label>
        <input type="file" name="image" id="image">

        <button type="submit" name="add_room_button">Add Room</button>
    </form>

</div>


<?php
if(isset($_POST['cancel']))
{
    header("Location: admin_dashboard.php");
}
?>
</body>
</html>
