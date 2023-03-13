<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
    <link rel="stylesheet" href="home.css">
</head>
<body>               
        <header>
            <nav>
                <ul class="nav-links">
                    <li id="name">YaminiSravanthiSowmyaPHP</li>
                    <li><a href="Home.php">Home</a></li>
                    <li><a href="local_attraction.php">Local Attraction</a></li>
                    <li><a href="Hotel_Dining.php">Hotel Dining Service</a></li>
                    <li><a href="Shopping.php">Shopping</a></li>
                </ul>                             
                <div class="hamburger">
                    <div class="line"></div>
                    <div class="line"></div>
                    <div class="line"></div>
                </div>
            </nav>
        </header>
        <section class="introduction">
            <h1>Welcome to the YaminiSravanthiSowmya Hotel</h1>

            <p>Located at NYC, our hotel offers a comfortable and convenient stay in the heart of the city. Our rooms feature modern amenities and our staff is dedicated to providing exceptional service to ensure your stay is enjoyable.</p>
            <div class="contact">
                <h1>Contact us </h1>
                <p> <span>Address:</span>  123 Main Street, New York, New Jersey 08726</p> 
                <p> <span>Phone:</span>  +1 (555) 123-4567</p> 
                <p> <span>Email:</span>  info@yamsravsow.com</p> 
                <p> <span>Directions:</span>  From the airport, take Highway 101 North and exit at Main Street. Turn right onto Main Street and continue for two blocks. Our hotel will be on the left.</p>
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d48367.69962188643!2d-74.22246558568894!3d40.740438615910534!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c2538cdf40ffff%3A0xdc3c46d2765f6a68!2sPerfect%20Near%20NYC!5e0!3m2!1sen!2sus!4v1678491745110!5m2!1sen!2sus" width="400" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </section>  
        <section class="reservation">
            <p class="headings">Reservation</p>
    
            <p class="instructions">Please select your check-in and check-out dates, number of rooms, and number of adults and children below. We will show you the available rooms for your stay.</p> 
    
            <form action="home.php" method="post">

                <label for="checkin-date">Check-in date:</label>
                <input type="date" id="checkin-date" name="checkin-date" class="tags" required>

                <label for="checkout-date">Check-out date:</label>
                <input type="date" id="checkout-date" name="checkout-date" class="tags" required>
    
                <label for="num-rooms">Number of rooms:</label>
                <input type="number" id="num-rooms" name="num-rooms" class="tags" min="1" max="10" required>
    
                <label for="num-adults">Number of adults:</label>
                <input type="number" id="num-adults" name="num-adults" class="tags" min="1" max="4" required>
    
                <label for="num-children">Number of children:</label>
                <input type="number" id="num-children" name="num-children" class="tags" min="0" max="4" required>
    
                <input type="submit" value="Search" class="button" name="search">
                <!-- <p class="no_room_message">Invalid Inputs</p>     -->
              
            </form>                   
<?php
    include 'model.php';
    $database = new Database();

    // Get image data from database 
    $results = $database->display_available_rooms();
    $results_length = count($results);

    $days = 1;
    if(isset($_POST['search']))
    {
        
        $check_in = new DateTime($_POST['checkin-date']);
        $check_out = new DateTime($_POST['checkout-date']);


        $num_room = $_POST['num-rooms'];
        $num_adults = $_POST['num-adults'];
        $num_children = $_POST['num-children'];
        
        if($check_in > $check_out)
        {
            echo "Invalid Date";
        }
        else
        {
            $duration = $check_out->diff($check_in);
            $days = $duration->format('%d');
            // Print check-in date
            $check_in = $check_in->format('Y-m-d');
            $check_out = $check_out->format('Y-m-d');
        }
?>                                    <!-- HTML code for the search form -->
<li><form method="get" action="SearchReservation.php">
<label for="confirmation_number">Enter confirmation number:</label>
<input type="text" name="confirmation_number" id="confirmation_number">
<button type="submit" name="search">Search</button>
</form>
</li> 
        <pclass="headings">Available rooms</p> 
        <form action="home.php" method="post">
            <div class="available_rooms">
                <?php 
                    if($results_length>0)
                    {
                        
                        foreach($results as $row)
                        { 
                            ?> 
                    <div class="room">
                        <img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row['room_image']); ?>" /> 
                        <div class="content">
                            <input type="hidden" name="room_id" value="<?php echo $row['id']; ?>">
                            <input type="hidden" name="check_in" value="<?php echo $check_in; ?>">
                            <input type="hidden" name="check_out" value="<?php echo $check_out; ?>">
                            <label for="type">Room Type: </label>
                            <input type="text" name="room_type" value="<?php echo $row['room_type']; ?>" readonly>
                            <label for="price">Price Per Night: </label>
                            <input type="text" name="price_per_night" value="<?php echo $row['price_per_night']; ?>" readonly>
                            <label for="total_cost">Total Cost: </label>
                            <input type="text" name="total_cost" value="<?php echo $row['price_per_night']*$days."$"; ?>" readonly>
                            
                        </div>
                        <input type="submit" value="Book now" name="book" class="button">
                    </div>
                    <?php 
                        }
                        ?>
            </div>

            <?php
                    }
                    else
                    {
            ?>
                      <p class="no_room_message">Sorry, no rooms available for your selected dates.</p>    
                <?php
                    }
                ?>
        </form>   
                    
                
    </section>            
<?php
    }
    ob_start(); 
    if(isset($_POST['book']))
    {
        $id = $_POST['room_id'];
        $type = $_POST['room_type'];
        $total_cost = $_POST['total_cost'];
        $check_in_date = $_POST['check_in'];
        $check_out_date = $_POST['check_out'];
        header("Location:Confirmation_Page.php?id=$id&type=$type&total_cost=$total_cost&checkin=$check_in_date&checkout=$check_out_date");
    }
    ob_end_flush();
?>
</body>
</html>