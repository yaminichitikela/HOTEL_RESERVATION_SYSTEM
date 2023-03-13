<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmation</title>

    <link rel="stylesheet" href="Confirmation_Page.css">
</head>
<body>
    <?php
        $id = $_GET['id'];
        $type = $_GET['type'];
        $total_cost = $_GET['total_cost'];
        $check_in_date =  $_GET['checkin'];
        $check_out_date = $_GET['checkout'];

        $confirmation_number = random_int(10000, 99999);
    ?>
    <div class="container">

        <h1>Confirmation</h1>

        <p>Thank you for choosing the YaminiSravanthiSowmya Hotel! Please enter your information below to confirm your reservation.</p> 

        <form action="Process_Confirmation_Page.php" method="post">

            <input type="hidden" name="room_id" value="<?php echo $id; ?>">

            <label for="name">Name:</label>
            <input type="text" id="name" name="name" class="tags" required>

            <label for="address">Address:</label>
            <input type="text" id="address" name="address" class="tags" required>

            <label for="street">Street name:</label>
            <input type="text" id="street" name="street" class="tags" required>

            <label for="city">City:</label>
            <input type="text" id="city" name="city" class="tags" required>

            <label for="state">State:</label>
            <input type="text" id="state" name="state" class="tags" required>

            <label for="phone">Phone number:</label>
            <input type="tel" id="phone" name="phone" class="tags" required>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" class="tags" required>

            <label for="confirmation-num">Confirmation number:</label>
            <input type="text" id="confirmation-num" name="confirmation-num" class="tags" value="<?php echo $confirmation_number; ?>" readonly>

            <label for="room-type">Room type:</label>
            <input type="text" id="room-type" name="room-type" class="tags" value="<?php echo $type; ?>" readonly>

            <label for="checkin-date">Check-in date:</label>
            <input type="text" id="checkin-date" name="checkin-date" class="tags" value="<?php echo $check_in_date; ?>" readonly>

            <label for="checkout-date">Check-out date:</label>
            <input type="text" id="checkout-date" name="checkout-date" value="<?php echo $check_out_date; ?>" class="tags" readonly>

            <label for="total-cost">Total cost:</label>
            <input type="text" id="total-cost" name="total-cost" class="tags" value="<?php echo $total_cost; ?>" readonly>

            <input type="submit" value="Confirm" name="confirm" class="button">
        </form>
    </div>

</body>
</html>