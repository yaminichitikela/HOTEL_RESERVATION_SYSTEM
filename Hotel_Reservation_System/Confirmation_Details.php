<!DOCTYPE html>
<html>
<head>
	<title>Confirmation Details</title>
	<style>
		body {
			font-family: Arial, sans-serif;
			background-color: #f2f2f2;
		}
		.container {
			max-width: 600px;
			margin: 0 auto;
			padding: 20px;
			background-color: #fff;
			box-shadow: 0px 0px 10px rgba(0,0,0,0.3);
			border-radius: 10px;
			text-align: center;
		}
		h1 {
			font-size: 32px;
			margin-top: 0;
		}
		table {
			margin: 20px auto;
			border-collapse: collapse;
			width: 100%;
		}
		th, td {
			padding: 10px;
			text-align: left;
			border-bottom: 1px solid #ddd;
		}
		th {
			background-color: #f2f2f2;
		}
		.confirmation-number {
			margin-top: 20px;
			font-size: 24px;
			font-weight: bold;
			text-align: center;
			color: #1a1a1a;
		}
	</style>
</head>
<body>
    <?php
        $name = $_GET['name'];
        $address = $_GET['address'];
        $street_name = $_GET['street'];
        $city = $_GET['city'];
        $state = $_GET['state'];
        $number = $_GET['num'];
        $email = $_GET['email'];
        $type = $_GET['type'];
        $check_in = $_GET['check-in'];
        $check_out = $_GET['check-out'];
        $cost = $_GET['cost'];
        $confirmation_num = $_GET['confirmation_num'];
    ?>
	<div class="container">
		<h1>Confirmation Details</h1>
		<table>
            <tr>
				<th>User Name</th>
				<td><?php echo $name; ?></td>
			</tr>
            <tr>
				<th>Address</th>
				<td><?php echo $address; ?></td>
			</tr>
            <tr>
				<th>Street Name</th>
				<td><?php echo $street_name; ?></td>
			</tr>
            <tr>
				<th>City</th>
				<td><?php echo $city; ?></td>
			</tr>
            <tr>
				<th>State</th>
				<td><?php echo $state; ?></td>
			</tr>
            <tr>
				<th>Phone Number</th>
				<td><?php echo $number; ?></td>
			</tr>
            <tr>
				<th>Email</th>
				<td><?php echo $email; ?></td>
			</tr>
			<tr>
				<th>Room Type</th>
				<td><?php echo $type; ?></td>
			</tr>
			<tr>
				<th>Stay Period</th>
				<td><?php echo $check_in; ?> to <?php echo $check_out; ?></td>
			</tr>
			<tr>
				<th>Cost of Stay</th>
				<td><?php echo $cost; ?></td>
			</tr>
		</table>
		<div class="confirmation-number">Confirmation Number: <?php echo $confirmation_num; ?></div>
	</div>
</body>
</html>
