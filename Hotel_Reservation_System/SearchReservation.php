<?php
// Check if the search button was clicked
if (isset($_GET['search'])) {
  // Get the confirmation number entered by the user
  $confirmation_number = $_GET['confirmation_number'];

  // Connect to your database (replace 'HOSTNAME', 'USERNAME', 'PASSWORD', and 'DATABASE' with your database details)
  $con = mysqli_connect("localhost", "yaminisravanthiasowmya", "yaminisravanthiasowmyapass", "yaminisravanthiasowmyadatabase");

  // Check connection
  if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

  // Prepare a SQL statement to search for the reservation based on confirmation number
 $sql = "SELECT * FROM rooms INNER JOIN users WHERE rooms.id = users.room_id and users.confirmation_number ='$confirmation_number'"; 
//$sql = "SELECT * FROM USERS WHERE confirmation_number = '$confirmation_number'"; 

  // Execute the SQL statement and store the result
  $result = mysqli_query($con, $sql);

  // Check if there are any matching reservations
  if (mysqli_num_rows($result) > 0) {
    // Loop through each matching reservation and display its details
    while ($row = mysqli_fetch_assoc($result)) {
       
        $name = $row['username'];
        $address =$row['address'];
        $street_name = $row['street_name'];
        $city =  $row['city'];
        $state =  $row['state'];
        $number =  $row['phone_number'];
        $email =  $row['email'];
        $type =  $row['room_type'];
        $check_in =  $row['check_in_date'];
        $check_out =  $row['check_out_date'];
        $cost =  $row['price_per_night'];
        $confirmation_num =  $row['confirmation_number'];
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
    <?php
    }
  } else {
    // If there are no matching reservations, display an error message
    echo "No reservations found with confirmation number '$confirmation_number'";
  }

  // Close the database connection
  mysqli_close($con);
}
?>

