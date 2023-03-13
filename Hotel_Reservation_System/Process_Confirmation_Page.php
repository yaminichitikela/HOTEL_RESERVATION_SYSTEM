<?php
    include "model.php";
        if(isset($_POST['confirm']))
        {
            $username = $_POST['name'];
            $address = $_POST['address'];
            $street_name = $_POST['street'];
            $city = $_POST['city'];
            $state = $_POST['state'];
            $phone_number = $_POST['phone'];
            $email = $_POST['email'];
            $confirmation_number = $_POST['confirmation-num'];
            $check_in_date = $_POST['checkin-date'];
            $check_out_date = $_POST['checkout-date'];
            $room_id = $_POST['room_id'];
            $room_type = $_POST['room-type'];
            $cost = $_POST['total-cost'];

            $database = new Database();

            // Room Booked
            $database->room_status($room_id);


            $database->insertUser($username, $address, $street_name, $city, $state, $phone_number, $email, $confirmation_number, $check_in_date, $check_out_date, $room_id);
            
            

            header("Location: Confirmation_Details.php?name=$username&address=$address&street=$street_name&city=$city&state=$state&num=$phone_number&email=$email&type=$room_type&check-in=$check_in_date&check-out=$check_out_date&cost=$cost&confirmation_num=$confirmation_number");
        }
?>